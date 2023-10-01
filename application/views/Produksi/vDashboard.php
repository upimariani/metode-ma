<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper pb-0">

			<!-- first row starts here -->
			<div class="row">
				<div class="col-xl-9 stretch-card grid-margin">
					<div class="card">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<canvas id="transaksi" height="150"></canvas>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 stretch-card grid-margin">
					<div class="card card-img">
						<div class="card-body d-flex align-items-center">
							<div class="text-white">
								<h1 class="font-20 font-weight-semibold mb-0"> Selamat Datang </h1>
								<h1 class="font-20 font-weight-semibold">Divisi Produksi Perusahaan!</h1>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Stok Bahan Baku</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Bahan Baku</th>
											<th>Keterangan</th>
											<th>Harga</th>
											<th>Sisa Bahan Baku</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($sisa_qty as $key => $value) {
										?>
											<tr>
												<td class="py-1">
													<?= $no++ ?>.
												</td>
												<td><?= $value->nama_bb ?></td>
												<td><?= $value->keterangan ?></td>
												<td>Rp. <?= number_format($value->harga)  ?></td>
												<td><?= $value->sisa_qty ?></td>
												<td><?php if ($value->sisa_qty <= '10') {
													?>
														<span class="badge badge-warning">Stok bahan baku akan segera habis!!</span>
													<?php
													} else if ($value->sisa_qty == '0') {
													?>
														<span class="badge badge-danger">Stok bahan baku sudah habis!!</span>
													<?php
													} else {
													?>
														<span class="badge badge-success">Stok aman!!</span>

													<?php
													} ?>
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