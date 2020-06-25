
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
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModalLong">
          Tambah Data Produk
        </button>
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
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($show as $key){ ?>
                          <tr>
                            <td>0000<?= $key->id ?> </td>
                            <td><?= $key->nama ?></td>
                            <td><div class="badge badge-success"><?= $key->kategori ?></div></td>
                            <td>Rp. <?= number_format($key->harga) ?>,-</td>
                            <td>Rp. <?= number_format($key->hargabeli) ?>,-</td>
                            <td><div class="badge badge-warning"><?= $key->stok ?></div></td>
                            <td>
                              <a href="<?php echo base_url()?>index.php/produk/edit/<?php echo $key->id ?>" class="btn btn-primary">Edit</a>
                              <a href="<?php echo base_url()?>index.php/produk/hapus/<?php echo $key->id ?>" class="btn btn-danger">Delete</a></td>
                          </tr>
                        <?php } ?>
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
      <form action="<?= base_url('index.php/produk/save') ?>" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Produk</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <input type="text" class="form-control" name="kategori">
        </div>
        <div class="form-group">
          <label>Harga Beli</label>
          <input type="number" class="form-control" name="beli">
        </div>
        <div class="form-group">
          <label>Harga Jual</label>
          <input type="number" class="form-control" name="jual">
        </div>
        <div class="form-group">
          <label>Stok</label>
          <input type="number" class="form-control" name="stok">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>