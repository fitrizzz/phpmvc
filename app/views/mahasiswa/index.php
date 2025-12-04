<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
				Tambah
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form action="<?= BASEURL;?>/mahasiswa/cari" method = "post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
					<button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">



			<h3>Daftar mahasiswa</h3>
			<ul class="list-group">
				<?php foreach($data["mhs"] as $mhs){ ?>
					<li class="list-group-item flex-row-reverse" ><?= $mhs["nama"] ?>
						<a onclick="return confirm();" class="badge rounded-pill text-bg-danger float-end m-p-2" href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs["id"];?>">Buang</a>
						<a data-bs-toggle="modal" data-bs-target="#formModal" class="badge rounded-pill text-bg-warning float-end mp-2 tampilModalUbah" href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs["id"];?>" data-id=<?= $mhs["id"]; ?>>Edit</a>
						<a class="badge rounded-pill text-bg-primary float-end mp-2" href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs["id"];?>">Detail</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
       	 		<h1 class="modal-title fs-5" id="formModalLabel">Tambah Mahasiswa</h1>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
					<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST">
						<input type="hidden" name="id" id="id">

						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama">
						</div>	
						<div class="mb-3">
							<label for="matrik_number" class="form-label">matrik number</label>
							<input type="text" class="form-control" id="matrik_number" name="matrik_number">
						</div>	
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email">
						</div>	
						<label for="jurusan" class="form-label">Jurusan</label>
						<select name="jurusan" class="form-select" id="jurusan" aria-label="Default select example">
							<option value="Media">Media</option>
							<option value="Software">Software</option>
							<option value="Security">Security</option>
							<option value="AI">AI</option>
						</select>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Tambah!</button>
						</div>
					</form>
				</div>
      		</div>
    	</div>
  	</div>
</div>