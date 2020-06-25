
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Transaksi Penjualan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">home</a></div>
              <div class="breadcrumb-item"><a href="#">penjualan</a></div>
              <!-- <div class="breadcrumb-item">produk</di -->
            </div>
          </div>

        <!-- Button trigger modal -->
        <a href="<?= base_url() ?>index.php/penjualan/cart" class="btn btn-primary mb-4"><span class="fas fa-plus"></span>Transaksi Baru</a>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Produk</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>Kode Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            <th>Tunai</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($show as $key): ?>
                            <tr>
                              <td><?= $key->ids ?></td>
                              <td><?= $key->tgl ?></td>
                              <td>Rp. <?= number_format($key->total) ?>,-</td>
                              <td>Rp. <?= number_format($key->cash) ?>,-</td>
                              <td><a href="<?= base_url() ?>index.php/penjualan/nota/<?= $key->ids ?>" class="btn btn-warning">Detail</a></td>

                            </tr>                            
                          <?php endforeach ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

