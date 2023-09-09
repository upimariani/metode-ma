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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<canvas id="permintaan" height="150"></canvas>
						</div>

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
											<th>Periode/Bulan</th>
											<th>Total Permintaan</th>
											<th>Forecast</th>

											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($periode as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?>.</td>
												<td><?php
													if ($value->bulan == '1') {
														echo 'Januari ' . $value->tahun;
													} else if ($value->bulan == '2') {
														echo 'Februari ' . $value->tahun;
													} else if ($value->bulan == '3') {
														echo 'Maret ' . $value->tahun;
													} else if ($value->bulan == '4') {
														echo 'April ' . $value->tahun;
													} else if ($value->bulan == '5') {
														echo 'Mei ' . $value->tahun;
													} else if ($value->bulan == '6') {
														echo 'Juni ' . $value->tahun;
													} else if ($value->bulan == '7') {
														echo 'Juli ' . $value->tahun;
													} else if ($value->bulan == '8') {
														echo 'Agustus ' . $value->tahun;
													} else if ($value->bulan == '9') {
														echo 'September ' . $value->tahun;
													} else if ($value->bulan == '10') {
														echo 'Oktober ' . $value->tahun;
													} else if ($value->bulan == '11') {
														echo 'November ' . $value->tahun;
													} else if ($value->bulan == '12') {
														echo 'Desember ' . $value->tahun;
													}
													?>
												</td>
												<td><?= $value->total  ?></td>
												<td>
													<?php
													$forecast = $this->db->query("SELECT * FROM `analisis_ma` WHERE periode='" . $value->bulan . "' AND id_bb='" . $value->id_bb . "'")->row();
													if ($forecast) {
														echo $forecast->forecast;
													} else {
													?>
														<span class="badge badge-danger">Belum Dianalisis</span>
													<?php
													}

													?>
												</td>

												<td class="text-center"> <button type="button" data-toggle="modal" data-target="#modal-default<?= $value->bulan ?>" class="btn btn-success">
														<i class="mdi mdi-dots-horizontal"></i> Detail Analisis
													</button> </td>
												<div class="modal fade" id="modal-default<?= $value->bulan ?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Analisis Metode Moving Average</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="col-lg-12">
																	<div class="form-group">
																		<p>Periode/Bulan ke - <?= $value->bulan ?> Tahun <?= $value->tahun ?> dengan total permintaan <?= $value->total ?></p>
																		<p>Apakah akan dilakukan analisis?</p>

																	</div>
																</div>
															</div>
															<div class="modal-footer justify-content-between">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<a href="<?= base_url('Perusahaan/cAnalisis/hitung/' . $value->bulan . '/' . $value->tahun . '/' . $value->id_bb) ?>" class="btn btn-primary">Analisis</a>
															</div>
														</div>
														</form>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
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