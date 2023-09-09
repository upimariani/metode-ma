<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Tambah Data Bahan Baku</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page"> Bahan Baku </li>
					</ol>
				</nav>
			</div>
			<div class="row">

				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form action="<?= base_url('Supplier/cBahanBaku/create') ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">Nama Bahan Baku</label>
									<input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama Bahan Baku" />
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Keterangan</label>
									<input type="text" name="keterangan" class="form-control" id="exampleInputEmail3" placeholder="Masukkan Keterangan" />
									<?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Harga</label>
									<input type="number" name="harga" class="form-control" id="exampleInputPassword4" placeholder="Masukkan Harga" />
									<?= form_error('harga', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Stok</label>
											<input type="text" name="stok" class="form-control" id="exampleInputCity1" placeholder="Masukkan Stok Bahan Baku" />
											<?= form_error('stok', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Deskripsi</label>
											<input type="text" name="deskripsi" class="form-control" id="exampleInputCity1" placeholder="Masukkan Deskripsi" />
											<?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
								</div>


								<button type="submit" class="btn btn-primary mr-2"> Submit </button>
								<button class="btn btn-light">Cancel</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->