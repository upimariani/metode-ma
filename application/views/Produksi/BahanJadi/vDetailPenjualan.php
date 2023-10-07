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
							<p class="m-0 pr-3">Detail Penjulan Bahan Jadi</p>
						</a>

					</div>
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
							<h4 class="card-title">Informasi Detal Penjualan Bahan Jadi</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Bahan Jadi</th>
											<th>Tanggal Jual</th>
											<th>Quantity</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($detail_penjualan as $key => $value) {
										?>
											<tr>
												<td class="py-1">
													<?= $no++ ?>.
												</td>
												<td><?= $value->nama_bj ?></td>
												<td><?= $value->tgl_jual ?></td>
												<td><?= $value->quantity ?></td>
												<td><?= $value->time ?></td>

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