<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<body>
	<div class="container-fluid d-flex p-3 justify-content-center">
		<div class="col-10">
			<div class="jumbotron">
				<div class="col d-flex flex-column text-center">
					<p class="display-4 m-0">Penambahan Data</p>
					<small class="lead m-0">
						Lakukan penambahan data yang ada dengan mengisi semua kolom yang tersedia
					</small>
				</div>
				<hr class="my-4">

				<div class="col-7 m-auto">
					<?php
					if (!isset($asalurl)) {
						echo form_open('verifikasi');
					}
					else {
						echo form_open('Update/verifikasi');
						echo form_hidden('id',set_value('id'));
					}
					?>
					<p class="h5">
						Nama
						<small class="text-muted">Masukan nama data yang akan di masukan</small>
						<?php echo form_input($_form['nama']); ?>
						<?php echo form_error("nama") ?>
					</p>
					<p class="h5">
						Deskripsi
						<small class="text-muted">Tambahkan keterangan untuk memperjelas nama</small>
						<?php echo form_textarea($_form['deskripsi']); ?>
						<?php echo form_error("deskripsi") ?>
					</p>
					<?php echo form_button($_form['tambah']) ?>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
