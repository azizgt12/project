
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




       </div>
       <div class="card-body">
       	<div class="table" style="color: black;">
       		<h5 style="color: black"><center><b>Nota Penjualan Produk</b></center></h5><hr style="height: 2px; background-color: black">
       		<div class="row mt-4" style="line-height: 0px;">
       			<div class="col-md-4 mb-4 mt-4">
       				<p style="font-size: 28px;"><b>I n v o i c e #</b></p>
       			</div>
       		</div>
            <?php foreach ($datas as $key) { ?>
       		<div class="row mt-3" style="line-height: 0px;">
       			<div class="col-md-2">
       				<p><b>No Invoice</b></p>
       			</div>
       			<div class="col-md-4">
       				<p><b> : <?php echo $key->id ?></b></p>

       			</div>

       		</div>

       		<div class="row mt-3" style="line-height: 0px;">
       			<div class="col-md-2">
       				<p><b>Tanggal</b></p>
       			</div>
       			<div class="col-md-4">

              <p><b> : <?php echo date('d F Y', strtotime($key->tgl)) ?></b></p>

       			</div>

       		</div>




       		<hr style="height: 2px; background-color: black">
       		<div class="row">
       			<div class="col-md-6 mt-2">
       				<h3>Invoice Total</h3>
       			</div>
       			
       			<div class="col-md-6 mt-2">
                                   <h3>Rp. <?= number_format($key->total) ?>,-</h3></h3>

       			</div>
       		</div>
            
           <?php } ?>

       		<hr style="height: 2px; background-color: black">
       		<table width="100%" class="table" style="color: black">
       			<tr style="font-size: 18px; font-weight: bold; color: black">
       				<th style="width: 160px;">Kode Produk</th>
       				<th>Nama Produk</th>
       				<th>Qty</th>
       				<th>Harga</th>
       				<th>Subtotal</th>
            <?php foreach ($detail as $key) { ?>
       			</tr>
              <td><?= $key->produk ?></td>
              <td><?= $key->namas ?></td>
              <td><?= $key->qty ?></td>
              <td>Rp. <?= number_format($key->harga) ?>,-</td>
              <td>Rp. <?= number_format($key->subtotal) ?>,-</td>
            <tr>
            <?php } ?>
              
            </tr>

       		</table>
       		<a href="<?php echo base_url() ?>index.php/penjualan" class="btn btn-danger"><span class="fa fa-hand-o-left"> Kembali</span></a>
       		
       		
       			

       	</div>
       </div>
   </div>