
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
                  <div class="card-body p-6 m-4">
                    <?php foreach ($data_produk as $key): ?>
                    <form action="<?= base_url('index.php/produk/update_produk') ?>" method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input type="text" class="form-control col-8" name="nama" value="<?= $key->nama ?>">
                        <input type="hidden" class="form-control col-8" name="id" value="<?= $key->id ?>">
                      </div>
                      <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control col-8" name="kategori" value="<?= $key->kategori ?>">
                      </div>
                      <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control col-6" name="beli" value="<?= $key->hargabeli ?>">
                      </div>
                      <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control col-6" name="jual" value="<?= $key->harga ?>">
                      </div>
                      <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control col-3" name="stok" value="<?= $key->stok ?>">
                      </div>
                      <button type="submit" class="btn btn-primary">Update Data</button>
                      <a href="<?= base_url() ?>index.php/Produk" class="btn btn-success">Kembali</a>
                    </form>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

