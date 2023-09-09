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
							<p class="m-0 pr-3">Transaksi</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Supplier-Perusahaan</p>
						</a>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Detail Transaksi Supplier</h4>
							</p>
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Bahan Baku</th>
											<th>Harga</th>
											<th>Quantity</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($detail_transaksi['detail'] as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_bb ?></td>
												<td>Rp. <?= number_format($value->harga)  ?></td>
												<td><?= $value->jml ?></td>
												<td>Rp. <?= number_format($value->harga * $value->jml)  ?></td>
											</tr>
										<?php
										}
										?>
										<?php
										if ($detail_transaksi['transaksi']->stat_order == '0') {
										?>
											<tr>
												<td></td>
												<td><a href="<?= base_url('Supplier/cTransaksi/konfirmasi_pesanan/' . $detail_transaksi['transaksi']->id_tran_bb) ?>" class="btn btn-warning">Konfirmasi Pemesanan</a></td>
												<td></td>
												<td></td>
												<td></td>
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