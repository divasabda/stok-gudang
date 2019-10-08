
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
            <h1 class="m-0 text-dark">Bahan-Keluar</h1>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Tambah Bahan Keluar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('admin/bahan-keluar/tambah-bahan-keluar')?>" method="post" id="formfield">
                <div class="card-body">
                  <div class="form-group">
                  <label>Nama Bahan :</label>
                      <select class="form-control select2" name="id-bahan" id="idbahan">
                        <option value=""> -- Pilih Bahan --</option>
                        <?php foreach($bahan->result() as $pilih):?>
                        <option value="<?php echo $pilih->id_bahan?>"><?php echo $pilih->id_bahan?> . <?php echo $pilih->nama_bahan?></option>
                      <?php endforeach; ?>
                      </select>
                    <small class="form text text-danger"><?php echo form_error('id-bahan');?></small>
                </div>
                  <div class="form-group">
                    <label>Jumlah Bahan Keluar :</label>
                    <input type="number" class="form-control" placeholder="Masukkan Jumlah" name="jumlah-keluar" id="jkeluar">
                    <small class="form text text-danger"><?php echo form_error('jumlah-keluar');?></small>
                  </div>
                  <div class="form-group">
                  <label>Tanggal Masuk Keluar :</label>

                  <div class="input-group">
                    <input type="text" class="form-control float-right" id="datepicker" name="tanggal-keluar" placeholder="Masukkan Tanggal">
                  </div>
                   <small class="form text text-danger"><?php echo form_error('tanggal-keluar');?></small>
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
      <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">DataTable Bahan Keluar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Masuk</th>
                  <th>Nama Bahan</th>
                  <th>Jumlah Keluar</th>
                  <th>Tanggal Keluar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $count = 0;
                  foreach($keluar->result() as $keluar):
                  $count++
                ?>
                <tr>
                  <td><?php echo $count?></td>
                  <td><?php echo $keluar->id_keluar?></td>
                  <td><?php echo $keluar->nama_bahan?></td>
                  <td> <?php echo $keluar->jumlah_keluar?></td>
                  <td> <?php echo date('d-m-Y',strtotime($keluar->tanggal_keluar))?></td>
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
    <!-- /.content -->
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
                        <td id="id"></td>
                    </tr>
                    <tr>
                        <th>Jumlah Keluar :</th>
                        <td id="jkl"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Keluar :</th>
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
     $('#id').text($('#idbahan').val());
     $('#jkl').text($('#jkeluar').val());
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
