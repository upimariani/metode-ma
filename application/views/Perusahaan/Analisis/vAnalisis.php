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
							<p class="m-0 pr-3">Analisis</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Admin-Perusahaan</p>
						</a>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Bahan Baku</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Bahan Baku</th>
											<th>Keterangan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($bahan_baku as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_bb ?></td>
												<td><?= $value->keterangan ?></td>
												<td class="text-center"> <a href="<?= base_url('Perusahaan/cAnalisis/periode/' . $value->id_bb) ?>" class="btn btn-warning">
														<i class="mdi mdi-dots-horizontal"></i> Detail Periode
													</a> </td>
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