<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper pb-0">
			<div class="page-header flex-wrap">
				<div class="header-left">
				</div>
				<div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
					<div class="d-flex align-items-center">
						<a href="#">
							<p class="m-0 pr-3">Bahan Jadi</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Produksi</p>
						</a>
					</div>
					<a href="<?= base_url('Produksi/cBahanJadi/create') ?>" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i> Add Bahan Jadi </a>
				</div>
			</div>
			<?php
			if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success">
					<h5>Sukses!</h5>
					<p><?= $this->session->userdata('success') ?></p>
				</div>
			<?php
			}
			?>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Bahan Jadi</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Bahan Jadi</th>
											<th>Keterangan</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($bj as $key => $value) {
										?>
											<tr>
												<td class="py-1">
													<?= $no++ ?>.
												</td>
												<td><?= $value->nama_bj ?></td>
												<td><?= $value->keterangan ?></td>
												<td>Rp. <?= number_format($value->harga)  ?></td>
												<td><?= $value->stok ?></td>
												<td>
													<a href="<?= base_url('Produksi/cBahanJadi/update/' . $value->id_bj) ?>" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="mdi mdi-file-check btn-icon-append"></i></a>
													<a href="<?= base_url('Produksi/cBahanJadi/delete/' . $value->id_bj) ?>" class="btn btn-outline-warning btn-icon-text"><i class="mdi mdi-reload btn-icon-prepend"></i> Hapus </a>
													<a href="<?= base_url('Produksi/cBahanJadi/detail_penjualan/' . $value->id_bj) ?>" class="btn btn-outline-info btn-icon-text"><i class="mdi mdi-book btn-icon-prepend"></i> Detail Penjualan </a>
												</td>
											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->