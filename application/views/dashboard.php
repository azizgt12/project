
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashbor</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">home</a></div>
              <div class="breadcrumb-item"><a href="#">dashboard</a></div>
              <!-- <div class="breadcrumb-item">produk</di -->
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List Penjualan</h4>
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
                              <td><a href="#" class="btn btn-warning">Cetak</a></td>

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

