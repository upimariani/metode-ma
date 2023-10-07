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
							<p class="m-0 pr-3">Bahan Jadi Keluar</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Perusahaan</p>
						</a>
					</div>
					<button type="submit" data-toggle="modal" data-target="#tambah" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i> Add Bahan Jadi Keluar </b>
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
			<?php
			if ($this->session->userdata('error')) {
			?>
				<div class="alert alert-danger">
					<h5>Gagal!</h5>
					<p><?= $this->session->userdata('error') ?></p>
				</div>
			<?php
			}
			?>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Bahan Jadi Keluar</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>Nama Bahan Jadi</th>
											<th>Tanggal Keluar</th>
											<th>Quantity</th>
											<th>Time</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($bj_keluar as $key => $value) {
										?>
											<tr>
												<td class="py-1"><?= $value->nama_bj ?>
												</td>
												<td><?= $value->tgl_jual ?></td>
												<td>
													<?= $value->quantity ?>
												</td>
												<td><?= $value->time ?></td>

												<td>
													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update<?= $value->id_bj_keluar ?>">
														Update
													</button>
													<a class="btn btn-danger" href="<?= base_url('Perusahaan/cBahanJadiKeluar/delete/' . $value->id_bj_keluar) ?>">Hapus</a>
												</td>
											</tr>
											<!-- Modal -->
											<div class="modal fade" id="update<?= $value->id_bj_keluar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('Perusahaan/cBahanJadiKeluar/update/' . $value->id_bj) ?>" method="POST" class="forms-sample">
															<div class="modal-body">
																<div class="form-group">
																	<label for="exampleInputCity1">Nama Bahan Jadi</label>
																	<select name="bj" id="bahan_jadi" class="form-control">
																		<option value="">---Pilih Bahan Jadi---</option>
																		<?php
																		foreach ($bj as $key => $item) {
																			if ($item->id_bj == $value->id_bj) {
																				$stok = $value->quantity;
																			} else {
																				$stok = 0;
																			}
																		?>
																			<option data-nama="<?= $item->nama_bj ?>" data-stok="<?= $item->stok + $stok  ?>" value="<?= $item->id_bj ?>" <?php
																																															if ($value->id_bj == $item->id_bj) {
																																																echo 'selected';
																																															}
																																															?>><?= $item->nama_bj ?></option>
																		<?php
																		}
																		?>

																	</select>
																	<?= form_error('bj', '<small class="text-danger">', '</small>') ?>
																</div>
																<div class="row">
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label for="exampleInputEmail3">Nama Bahan Jadi</label>
																			<input type="text" value="<?= $value->nama_bj ?>" class="nama form-control" id="exampleInputEmail3" readonly />

																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label for="exampleInputPassword4">Stok Tersedia</label>
																			<input type="number" name="stok" value="<?= $value->quantity + $value->stok ?>" class="stok form-control" id="exampleInputPassword4" readonly />

																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label for="exampleInputCity1">Quantity Keluar</label>
																			<input type="number" name="qty" value="<?= $value->quantity ?>" class="form-control" id="exampleInputCity1" placeholder="Masukkan Quantity Bahan Jadi Keluar" required />
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Save changes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
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
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Bahan Jadi Keluar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('Perusahaan/cBahanJadiKeluar/create') ?>" method="POST" class="forms-sample">
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputCity1">Nama Bahan Jadi</label>
								<select name="bj" id="bahan_jadi" class="form-control">
									<option value="">---Pilih Bahan Jadi---</option>
									<?php
									foreach ($bj as $key => $value) {
									?>
										<option data-nama="<?= $value->nama_bj ?>" data-stok="<?= $value->stok ?>" value="<?= $value->id_bj ?>"><?= $value->nama_bj ?></option>
									<?php
									}
									?>

								</select>
								<?= form_error('bj', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail3">Nama Bahan Jadi</label>
										<input type="text" class="nama form-control" id="exampleInputEmail3" readonly />

									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputPassword4">Stok Tersedia</label>
										<input type="number" name="stok" class="stok form-control" id="exampleInputPassword4" readonly />

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="exampleInputCity1">Quantity Keluar</label>
										<input type="number" name="qty" class="form-control" id="exampleInputCity1" placeholder="Masukkan Quantity Bahan Jadi Keluar" required />
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>