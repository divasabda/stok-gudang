
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
            <h1 class="m-0 text-dark">Bahan</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Bahan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('admin/bahan/tambah-bahan')?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Bahan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Bahan" name="nama-bahan">
                    <small class="form text text-danger"><?php echo form_error('nama-bahan');?></small>
                  </div>
                  <div class="form-group">
                    <label>Stock Bahan</label>
                    <input type="number" class="form-control"  placeholder="Masukkan Stock Bahan" name="stok-bahan">
                    <small class="form text text-danger"><?php echo form_error('stok-bahan');?></small>
                  </div>
                  <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Satuan" name="satuan-bahan">
                    <small class="form text text-danger"><?php echo form_error('satuan-bahan');?></small>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        
<!-- data tabale -->

    <div class="col-md-9">
      <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">DataTable Bahan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bahan</th>
                  <th>Stock</th>
                  <th>Satuan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $count = 0;
                  foreach($bahan->result() as $bahan):
                  $count++
                ?>
                <tr>
                  <td><?php echo $count?></td>
                  <td><?php echo $bahan->nama_bahan?></td>
                  <td><?php echo $bahan->stok_bahan?></td>
                  <td> <?php echo $bahan->satuan?></td>
                  <td width="100">
                     <a href="<?php echo base_url('admin/bahan/edit-bahan/'.$bahan->id_bahan)?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a  class="btn btn-danger tombol-hapus" data-toggle="modal" data-target="#konfirmasi_hapus" data-href='<?php echo base_url('admin/bahan/hapus-bahan/'.$bahan->id_bahan)?>'><i class="fa fa-trash"></i></a>
                  </td>
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

    <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">

                    <b>Anda yakin menghapus data ini ?</b>
                    
                </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                <a class="btn btn-danger btn-ok"> Hapus</a>
            </div>
            </div>
        </div>
    </div>

<script>
  $(function () {
    $("#example1").DataTable();

  });

  //Hapus Data
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });

  <?php if( $this->session->flashdata('crud') ): ?> 

    toastr["success"]("<?php echo $this->session->flashdata('crud');?>", "Bahan")
                    
  <?php endif; ?>

</script>

</body>
</html>
