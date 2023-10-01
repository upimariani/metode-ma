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
									</tbody>
									<tfoot>
										<tr>
											<td>
												<?php
												if ($detail_transaksi['transaksi']->stat_order == '2') {
												?>
													<a href="<?= base_url('Perusahaan/cTransaksiBB/pesanan_diterima/' . $detail_transaksi['transaksi']->id_tran_bb) ?>" class="btn btn-info">Pesanan Diterima</a>
												<?php
												}
												?>
											</td>
											<td></td>
											<td></td>
											<td><strong>Total</strong></td>
											<td>Rp. <?= number_format($detail_transaksi['transaksi']->tot_bayar) ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if ($detail_transaksi['transaksi']->bukti_payment == '0') {
			?>
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header">
								<h2>Upload Bukti Pembayaran</h2>
							</div>
							<div class="card body">
								<?php echo form_open_multipart('Perusahaan/cTransaksiBB/pembayaran/' . $detail_transaksi['transaksi']->id_tran_bb); ?>
								<input type="file" class="form-control" name="bayar" required>
								<button type="submit" class="btn btn-success">Upload</button>
								</form>
							</div>

						</div>

					</div>
				</div>
			<?php
			} else {
			?>
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header">
								<h2>Bukti Pembayaran</h2>
							</div>
							<div class="card body">
								<img style="width: 250px;" src="<?= base_url('asset/bukti-pembayaran/' . $detail_transaksi['transaksi']->bukti_payment) ?>">
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<!-- content-wrapper ends -->