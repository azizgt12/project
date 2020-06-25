
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Master Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">home</a></div>
              <div class="breadcrumb-item"><a href="#">produk</a></div>
              <!-- <div class="breadcrumb-item">produk</di -->
            </div>
          </div>

        <!-- Button trigger modal -->

        <?php if($this->session->flashdata('success')){ ?>  
         <div class="alert alert-success">  
           <a href="#" class="close" data-dismiss="alert">&times;</a>  
           <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
         </div>
         <?php } ?>  
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Produk</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body p-1">
                    <form method="POST" action="<?= base_url() ?>index.php/laporan">
                      <p class="pl-4" style="font-size: 22px; font-weight: bold">Filter Priode : </p>
                      <div class="form-row pl-4 pr-4">
                        <div class="form-group col-md-5">
                          <label for="inputEmail4">Dari Tanggal</label>
                          <input type="date" class="form-control" name="mulai">
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputPassword4">Ke Tanggal</label>
                          <input type="date" class="form-control" name="selesai">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputPassword4">Action</label><br>
                          <input type="submit" class="btn btn-danger btn-lg" name="act">
                        </div>
                      </div>
                    </form>

                    <?php if (isset($_POST['act'])) { 
                      $mulai = $_POST['mulai'];
                      $selesai = $_POST['selesai'];
                    ?>
                      <hr>
                      <p class="pl-4 pr-4" style="font-size: 22px; font-family: times; font-weight: bold; text-align: center;">
                        Laporan Penjualan Priode
                      </p>
                      <p class="pl-4 pr-4" style="font-size: 18px; font-family: times; text-align: center;">
                        <?= date('d F Y', strtotime($mulai)) ?> - <?= date('d F Y', strtotime($selesai)) ?>  
                      </p>
                      <div class="p-3">
                      <div class="container">
                        <canvas id="myChart"></canvas>
                      </div><hr>
                      
                      <h5 class="mt-5">Detail Laporan Transaksi Penjualan</h5>
                      <table class="table table-striped table-bordered" id="sortable-table" style="padding:">
                        <thead>
                          <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Penjualan</th>
                            <th style="text-align: center;">Total Transaksi</th>
                            <th style="text-align: center;">Jumlah Terjual</th>
                            <th>Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $total = 0;
                          $totalT = 0;
                          $totalJ = 0;

                          foreach ($data as $key): 
                          $total += $key->sub;
                          $totalT += $key->transaksi;
                          $totalJ += $key->totalterjual;
                          ?>
                            <tr>
                              <td>000<?= $key->id ?></td>
                              <td><?= $key->nama ?></td>
                              <td>Rp. <?= number_format($key->harga) ?>,-</td>
                              <td style="text-align: center;"><?= number_format($key->transaksi) ?></td>
                              <td style="text-align: center;"><?= number_format($key->totalterjual) ?></td>
                              <td>Rp. <?= number_format($key->sub) ?>,-</td>
                            </tr>
                          <?php endforeach ?>
                            <tr>
                              <td colspan="3" style="text-align: center;font-weight: bold; font-size: 16px;">Total Penjualan Priode Ini</td>
                              <td style="text-align: center;"><?= number_format($totalT) ?></td>
                              <td style="text-align: center;"><?= number_format($totalJ) ?></td>
                              <td>Rp. <?= number_format($total) ?>,-</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="p-3">
                      <a href="<?= base_url() ?>index.php/laporan/export/<?= $mulai ?>/<?= $selesai ?>" target="_blank" class="btn btn-warning"><span class="fas fa-file-pdf"></span> Download PDF</a>
                    </div>

                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

