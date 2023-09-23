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
							<p class="m-0">Admin-Perusahaan</p>
						</a>
					</div>
					<button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i> Add Transaksi </button>
				</div>
			</div>
			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<form action="<?= base_url('Perusahaan/cTransaksiBB/pesan_supplier') ?>" method="POST">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Pilih Supplier</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="exampleInputEmail1">Supplier</label>
										<select class="form-control" name="supplier" required>
											<option value="">---Pilih Supplier---</option>
											<?php
											foreach ($supplier as $key => $value) {
												if ($value->level_user == '2') {
											?>
													<option value="<?= $value->id_user ?>"><?= $value->nama_user ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</form>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
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
							<h4 class="card-title">Informasi Transaksi Supplier</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Supplier</th>
											<th>Tanggal Transaksi</th>
											<th>Total Bayar</th>
											<th>Status Pesanan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($transaksi as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_user ?></td>
												<td><?= $value->tgl_tran ?></td>
												<td>Rp. <?= number_format($value->tot_bayar)  ?></td>
												<td><?php
													if ($value->stat_order == '0') {
													?>
														<span class="badge badge-danger">Belum Melakukan Pembayaran</span>
													<?php
													} else if ($value->stat_order == '1') {
													?>
														<span class="badge badge-warning">Menunggu Konfirmasi</span>
													<?php
													} else if ($value->stat_order == '2') {
													?>
														<span class="badge badge-success">Pesanan Selesai</span>
													<?php
													}
													?>
												</td>

												<td class="text-center"> <a href="<?= base_url('Perusahaan/cTransaksiBB/detail_transaksi/' . $value->id_tran_bb) ?>" class="btn btn-warning">
														<i class="mdi mdi-dots-horizontal"></i> Detail Transaksi
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