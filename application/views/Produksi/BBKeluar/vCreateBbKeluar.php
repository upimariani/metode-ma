<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Tambah Data Bahan Baku Keluar</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page"> Bahan Baku Keluar </li>
					</ol>
				</nav>
			</div>
			<div class="row">

				<div class="col-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form action="<?= base_url('Produksi/cBBKeluar/create') ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">Nama Bahan Baku</label>
									<select id="stok_bb" class="form-control" name="bb">
										<option value="">---Pilih Bahan Baku---</option>
										<?php
										foreach ($stok_bb as $key => $value) {
										?>
											<option data-stok="<?= $value->sisa ?>" value="<?= $value->id_detail_bb ?>"><?= $value->nama_bb ?></option>
										<?php
										}
										?>
									</select>
									<?= form_error('bb', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Stok</label>
									<input type="text" name="stok_bb" class="stok form-control" id="exampleInputEmail3" placeholder="Stok Bahan Baku" readonly />
									<?= form_error('stok_bb', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Quantity yang digunakan...</label>
									<input type="number" name="qty_bb" class="form-control" id="exampleInputEmail3" placeholder="Quantity Bahan Baku yang digunakan" />
									<?= form_error('qty_bb', '<small class="text-danger">', '</small>') ?>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Nama Bahan Jadi</label>
											<select id="bj" class="form-control" name="bahan_jadi">
												<option value="">---Pilih Bahan Jadi---</option>
												<?php
												foreach ($bahan_jadi as $key => $value) {
												?>
													<option data-stok_bj="<?= $value->stok ?>" value="<?= $value->id_bj ?>"><?= $value->nama_bj ?></option>
												<?php
												}
												?>
											</select>
											<?= form_error('bahan_jadi', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<input type="hidden" name="qty_bj_sebelumnya" class="stok_bj" />
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Quantity Bahan Jadi</label>
											<input type="number" name="qty_bj" class="form-control" id="exampleInputEmail3" placeholder="Quantity Bahan Jadi" />

											<?= form_error('qty_bj', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mr-2"> Submit </button>
								<button class="btn btn-light">Cancel</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->