
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Cart Penjualan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">home</a></div>
              <div class="breadcrumb-item"><a href="#">penjualan</a></div>
              <!-- <div class="breadcrumb-item">produk</di -->
            </div>
          </div>

        <!-- Button trigger modal -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Produk</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body p-0">
                  <form action="<?php echo base_url() ?>index.php/penjualan/addcart" method="POST">
                    <div class="form-row m-4">
                      <div class="form-group col-md-2 ">
                        <label>No. Transaksi</label>
                        <input class="form-control" name="no" value="<?php echo date('mdyHis') ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Pilih Produk</label>
                        <select class="custom-select" name="produk">
                          <?php foreach ($data_produk as $key): ?>
                            <option value="<?= $key->id ?>"><?= $key->nama ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Qty</label>
                        <input type="number" class="form-control" name="qty">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Action</label><br>
                        <input type="submit" class="btn btn-danger btn-lg" value="Tambah">
                      </div>

                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Cart</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $total = 0;
                            foreach ($data_cart as $key): 
                            $total+= $key->sub;
                          ?>
                            <tr>
                              <td>000<?= $key->id ?></td>
                              <td><?= $key->nama ?></td>
                              <td><?= $key->qty ?></td>
                              <td>Rp. <?= number_format($key->harga) ?>,-</td>
                              <td>Rp. <?= number_format($key->sub) ?>,-</td>
                              <td>
                                <a href="<?php echo base_url() ?>index.php/penjualan/delete_temp_beli/<?= $key->id ?>" class="btn btn-danger"><span class="fas fa-trash"></span></a>
                              </td>
                            </tr>

                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="alert alert-success" role="alert" style="height: 100px;">
                  <div class="row">
                    <div class="col-md-6">
                        <p class="mt-4" style="font-size: 20px; font-weight: bold">Total Harga Penjualan : Rp. <?= number_format($total) ?>,-</p>            
                    </div>
                    <div class="col-md-6">
                    <button type="button" class="btn btn-danger btn-lg mt-3" data-toggle="modal" data-target="#exampleModalLong">
                      Simpan Transaksi
                    </button>                     
                    </div>

                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url() ?>index.php/penjualan/save_cart">
        <div class="form-group">
          <label for="exampleInputEmail1">No. Transaksi</label>
          <input type="" class="form-control" name="no" value="<?php echo date('mdyHis') ?>" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Transaksi</label>
          <input type="date" class="form-control" name="tgl" value="<?php echo date('Y-m-d') ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Total Harga</label>
          <input  class="form-control" name="total" value="<?= $total ?>" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Cash</label>
          <input type="number" class="form-control" name="cash" required="">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Proses Transaksi</button>
      </div>
      </form>
    </div>
  </div>
</div>