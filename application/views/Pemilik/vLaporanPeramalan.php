<div class="main-panel">
	<div class="content-wrapper pb-0">
		<div class="page-header flex-wrap">
			<h3 class="mb-0"> Hi, welcome back Pemilik Toko!
			</h3>

		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Peramalan</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cLaporanPeramalan/cetak') ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Bahan Baku</label>
									<select name="bb" class="form-control">
										<option>---Pilih Bahan Baku---</option>
										<?php
										foreach ($bahan_baku as $key => $value) {
										?>
											<option value="<?= $value->id_bb ?>"><?= $value->nama_bb ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> View Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>