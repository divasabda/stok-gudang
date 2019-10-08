
<!DOCTYPE html>
<html>

<?php $this->load->view('template/head')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php $this->load->view('template/navbar')?>

<?php $this->load->view('template/sidebar')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bahan-Masuk</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row">
            
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tambah Bahan Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formfield" action="<?php echo base_url('admin/bahan-masuk/tambah-bahan-masuk')?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                  <label>Nama Bahan :</label>
                      <select class="form-control select2" name="id-bahan" id="idbahan">
                        <option value=""> -- Pilih Bahan --</option>
                        <?php foreach($bahan->result() as $pilih):?>
                        <option value="<?php echo $pilih->id_bahan?>"><?php echo $pilih->id_bahan?>. <?php echo $pilih->nama_bahan?></option>
                      <?php endforeach; ?>
                      </select>
                    <small class="form text text-danger"><?php echo form_error('id-bahan');?></small>
                </div>
                  <div class="form-group">
                    <label>Jumlah Bahan Masuk :</label>
                    <input type="number" class="form-control" placeholder="Masukkan Jumlah" name="jumlah-masuk" id="jmasuk">
                    <small class="form text text-danger"><?php echo form_error('jumlah-masuk');?></small>
                  </div>
                  <div class="form-group">
                  <label>Tanggal Masuk :</label>

                  <div class="input-group">
                    <input type="text" class="form-control float-right" id="datepicker" name="tanggal-masuk" placeholder="Masukkan Tanggal">
                  </div>
                   <small class="form text text-danger"><?php echo form_error('tanggal-masuk');?></small>
                  <!-- /.input group -->
                </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary" />
                </div>
              </form>
            </div>
          </div>
        
<!-- data tabale -->

    <div class="col-md-9">
      <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">DataTable Bahan Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Masuk</th>
                  <th>Nama Bahan</th>
                  <th>Jumlah Masuk</th>
                  <th>Tanggal Masuk</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $count = 0;
                  foreach($masuk->result() as $masuk):
                  $count++
                ?>
                <tr>
                  <td><?php echo $count?></td>
                  <td><?php echo $masuk->id_laporan_masuk?></td>
                  <td><?php echo $masuk->nama_bahan?></td>
                  <td> <?php echo $masuk->jumlah_masuk?></td>
                  <td> <?php echo date('d-m-Y',strtotime($masuk->tanggal_masuk))?></td>
                </tr>
                <?php endforeach?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
          <!-- /.card -->

<!-- akhir data table -->

      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('template/footer')?>

<!-- modal -->

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Data yang di inputkan tidak bisa di hapus maupun di edit
            </div>
            <div class="modal-body">
                Apakah data sudah benar?
                <table class="table">
                    <tr>
                        <th>Id Bahan :</th>
                        <td id="bhn"></td>
                    </tr>
                    <tr>
                        <th>Jumlah Masuk :</th>
                        <td id="jmk"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk :</th>
                        <td id="tmk"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-success success">Submit</a>
            </div>
        </div>
    </div>
</div>

<!-- end modal -->

<script>
  $(function () {
    $("#example1").DataTable();


          //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  });

  $('#submitBtn').click(function() {
     $('#bhn').text($('#idbahan').val());
     $('#jmk').text($('#jmasuk').val());
     $('#tmk').text($('#datepicker').val());
});

$('#submit').click(function(){
    $('#formfield').submit();
});


  <?php if( $this->session->flashdata('crud') ): ?> 

    toastr["success"]("<?php echo $this->session->flashdata('crud');?>", "Bahan Masuk")
                    
  <?php endif; ?>

</script>

</body>
</html>
