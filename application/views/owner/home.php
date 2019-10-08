
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
            <h1 class="m-0 text-dark">Laporan</h1>
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

             <div class="col-md-12">
                  <div class="card card-info">
                        <div class="card-header">
                          <h3 class="card-title">Laporan Keseluruhan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                              
                              <div class="col-lg-3 col-3">
                              <!-- small box -->
                              <div class="small-box bg-gray">
                                <div class="inner">
                                  <h3><i class="fas fa-print"></i></h3>

                                  <p>Laporan Bahan</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-scroll"></i>
                                </div>
                                <a href="<?php echo base_url('owner/laporan-bahan')?>" class="small-box-footer" name="btn" target="_blank">Print</a>
                              </div>
                            </div>

                            <div class="col-lg-3 col-3">
                              <!-- small box -->
                              <div class="small-box bg-gray">
                                <div class="inner">
                                  <h3><i class="fas fa-print"></i></h3>

                                  <p>Laporan Bahan masuk</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-scroll"></i>
                                </div>
                                <a href="#" class="small-box-footer" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-bahan-masuk">Print</a>
                              </div>
                            </div>

                            <div class="col-lg-3 col-3">
                              <!-- small box -->
                              <div class="small-box bg-gray">
                                <div class="inner">
                                  <h3><i class="fas fa-print"></i></h3>

                                  <p>Laporan Bahan keluar</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-scroll"></i>
                                </div>
                                <a href="#" class="small-box-footer" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-bahan-keluar">Print</a>
                              </div>
                            </div>

                            <div class="col-lg-3 col-3">
                              <!-- small box -->
                              <div class="small-box bg-gray">
                                <div class="inner">
                                  <h3><i class="fas fa-print"></i></h3>

                                  <p>Laporan History Mutasi</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-scroll"></i>
                                </div>
                                <a href="#" class="small-box-footer" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-mutasi">Print</a>
                              </div>
                            </div>

                            </div>

                        </div>
                        <!-- /.card-body -->
                  </div>
              </div>  

          </div>
      </div>
      <!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('template/footer')?>

<!--                       modal                           -->


<!-- modal bahan masuk -->
<div class="modal fade" id="confirm-bahan-masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Cetak Bahan Masuk
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('owner/laporan-periode-masuk')?>" method="post" accept-charset="utf-8" target="_blank">
                  <table class="table">
                    <tr>
                        <td>
                          <div class="form-group">
                            <label>Dari Tanggal :</label>

                            <div class="input-group">
                              <input type="date" class="form-control float-right" name="tanggal-a" placeholder="Masukkan Tanggal" required>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <label>Sampai Tanggal :</label>

                            <div class="input-group">
                              <input type="date" class="form-control float-right" name="tanggal-b" placeholder="Masukkan Tanggal" required>
                            </div>
                          </div> 
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <button type="input" class="btn btn-primary">Print data</button>
                      </td>
                    </tr>
                  </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('owner/laporan-bahan-masuk')?>" id="submit" class="btn btn-success success" target="_blank">Cetak Semua Data</a>
            </div>
        </div>
    </div>
</div>

<!-- modal bahan keluar -->
<div class="modal fade" id="confirm-bahan-keluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Cetak Bahan Keluar
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('owner/laporan-periode-keluar')?>" method="post" accept-charset="utf-8" target="_blank">
                  <table class="table">
                    <tr>
                        <td>
                          <div class="form-group">
                            <label>Dari Tanggal :</label>

                            <div class="input-group">
                              <input type="date" class="form-control float-right" name="tanggal-a" placeholder="Masukkan Tanggal" required>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <label>Sampai Tanggal :</label>

                            <div class="input-group">
                              <input type="date" class="form-control float-right" name="tanggal-b" placeholder="Masukkan Tanggal" required>
                            </div>
                          </div> 
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- <input type="button" name="cetak-bahan" value="Submit" class="btn btn-primary"> -->
                        <input type="submit" id="c-bahan" name="cetak-masuk" class="btn btn-primary"></input>
                      </td>
                    </tr>
                  </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('owner/laporan-bahan-keluar')?>" id="submit" class="btn btn-success success" target="_blank">Cetak Semua Data</a>
            </div>
        </div>
    </div>
</div>

<!-- modal mutasi -->
<div class="modal fade" id="confirm-mutasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Cetak History Mutasi
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('owner/laporan-periode-mutasi')?>" method="post" accept-charset="utf-8" target="_blank">
                  <table class="table">
                    <tr>
                        <td>
                          <div class="form-group">
                            <label>Dari Tanggal :</label>

                            <div class="input-group">
                              <input type="date" class="form-control float-right" name="tanggal-a" placeholder="Masukkan Tanggal" required>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <label>Sampai Tanggal :</label>

                            <div class="input-group">
                              <input type="date" class="form-control float-right" name="tanggal-b" placeholder="Masukkan Tanggal" required>
                            </div>
                          </div> 
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- <input type="button" name="cetak-bahan" value="Submit" class="btn btn-primary"> -->
                        <input type="submit" id="c-bahan" name="cetak-masuk" class="btn btn-primary"></input>
                      </td>
                    </tr>
                  </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('owner/laporan-mutasi')?>" id="submit" class="btn btn-success success" target="_blank">Cetak Semua Data</a>
            </div>
        </div>
    </div>
</div>

<!--                      end modal                         -->
</body>
</html>
