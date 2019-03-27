<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<body>
	<div class="container-fluid d-flex p-3 justify-content-center">
		<div class="col-10">
			<div class="jumbotron">
				<div class="col d-flex flex-column text-center">
					<p class="display-4 m-0">Perbarui Data</p>
					<small class="lead m-0">
						Lakukan pembaruan data di sini
					</small>
				</div>
				<hr class="my-4">

				<div>
					<?php if (isset($cek)): ?>
						<div class="row justify-content-center">
							<p class="text-secondary h4"><strong><?php echo $cek; ?></strong></p>
						</div>
					<?php else: ?>
						<table class="table">
							<thead class="thead-dark">
								<tr class="text-center">
									<th scope="col"></th>
									<th scope="col">Nama</th>
									<th scope="col">Deskripsi</th>
									<th scope="col">Tanggal Dibuat</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								foreach ($baca as $value):
								?>
								<?php echo form_open("ubah-data") ?>
									<tr>
										<th class="text-center align-middle"><?php $no++; echo $no; ?></th>
										<td class="align-middle"><?php echo $value['nama'] ?></td>
										<td class="align-middle"><?php echo $value['deskripsi'] ?></td>
										<td class="text-center align-middle"><?php echo $value['tgl'] ?></td>
										<td class="align-middle">
											<input type="hidden" value="<?php echo $value['id'];?>" name="id">
											<?php echo form_button($_form['update']) ?>
										</td>
									</tr>
									<?php echo form_close() ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
