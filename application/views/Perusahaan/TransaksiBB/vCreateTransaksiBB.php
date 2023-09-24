<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Tambah Data Transaksi</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page"> User </li>
					</ol>
				</nav>
			</div>
			<div class="row">
				<div class="col-4 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form action="<?= base_url('Perusahaan/cTransaksiBB/addtocart') ?>" method="POST" class="forms-sample">
								<input type="hidden" name="id_supplier" value="<?= $id_supplier ?>">
								<div class="form-group">
									<label for="exampleInputCity1">Bahan Baku</label>
									<select name="bb" id="bahan_baku" class="form-control" required>
										<option value="">---Pilih Bahan Baku---</option>
										<?php
										foreach ($bb as $key => $value) {
										?>
											<option data-nama="<?= $value->nama_bb ?>" data-keterangan="<?= $value->keterangan ?>" data-harga="<?= $value->harga ?>" data-stok="<?= $value->stok ?>" data-deskripsi="<?= $value->deskripsi ?>" value="<?= $value->id_bb ?>"><?= $value->nama_bb ?></option>
										<?php
										}
										?>

									</select>
									<?= form_error('level', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputName1">Nama Bahan Baku</label>
									<input type="text" name="nama" class="form-control nama" id="exampleInputName1" readonly />
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Keterangan</label>
									<input type="text" name="keterangan" class="form-control keterangan" id="exampleInputEmail3" readonly />
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Harga</label>
									<input type="number" name="harga" class="form-control harga" id="exampleInputPassword4" readonly />

								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Stok</label>
											<input type="text" name="stok" class="form-control stok" id="exampleInputCity1" readonly />

										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Deskripsi</label>
											<input type="text" name="deskripsi" class="form-control deskripsi" id="exampleInputCity1" readonly />

										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Quantity</label>
									<input type="number" name="qty" class="form-control" id="exampleInputPassword4" required />

								</div>

								<button type="submit" class="btn btn-primary mr-2"> Submit </button>
								<button class="btn btn-light">Cancel</button>
							</form>
						</div>
					</div>
				</div>
				<?php
				$qty = 0;
				foreach ($this->cart->contents() as $key => $value) {
					$qty += $value['qty'];
				}
				if ($qty != '0') {
				?>
					<div class="col-lg-8 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Informasi Keranjang</h4>
								</p>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama</th>
												<th>Harga</th>
												<th>Quantity</th>
												<th>Subtotal</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($this->cart->contents() as $key => $value) {
											?>
												<tr>
													<td><?= $no++ ?>.</td>
													<td><?= $value['name'] ?></td>
													<td>Rp. <?= number_format($value['price'])  ?></td>
													<td><span class="badge bg-success"><?= $value['qty'] ?></span></td>
													<td>Rp. <?= number_format($value['price'] * $value['qty'])  ?></td>
													<td><a href="<?= base_url('Perusahaan/cTransaksiBB/hapus/' . $value['rowid'] . '/' . $id_supplier) ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-close"></i></a></td>

												</tr>

											<?php
											}
											?>
											<form action="<?= base_url('Perusahaan/cTransaksiBB/selesai') ?>" method="POST">
												<input type="hidden" name="id_supplier" value="<?= $id_supplier ?>">

												<tr>
													<td><button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-clipboard-check"></i> Selesai</button></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>Total: </td>
													<td><strong>Rp.<?= number_format($this->cart->total())  ?></strong></td>
												</tr>
											</form>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>


			</div>
		</div>
		<!-- content-wrapper ends -->