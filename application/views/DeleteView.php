<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<body>
	<div class="container-fluid d-flex p-3 justify-content-center">
		<div class="col-10">
			<div class="jumbotron">
				<div class="col d-flex flex-column text-center">
					<p class="display-4 m-0">Hapus Data</p>
					<small class="lead m-0">
						Penghapusan data dilakukan dengan batch
					</small>
				</div>
				<hr class="my-4">

				<div>
					<?php if (isset($cek)): ?>
						<div class="row justify-content-center">
							<p class="text-secondary h4"><strong><?php echo $cek; ?></strong></p>
						</div>
					<?php else: ?>
						<?php echo form_open('hapus-data',array('id'=>'hapus-data')); ?>
						<table class="table table-hover table-secondary">
							<thead class="thead-dark">
								<tr class="text-center">
									<th scope="col"></th>
									<th scope="col">Nama</th>
									<th scope="col">Deskripsi</th>
									<th scope="col">Tanggal Dibuat</th>
									<?php
									$bulk = array(
										'name'          => 'idbulk',
										'id'            => 'idbulk',
										'class'					=> 'form_control',
										'title'					=> 'Pilih Semua'
									);
									?>
									<th scope="col-3"><?php echo form_checkbox($bulk); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								foreach ($baca as $value):
								$pilih = array(
									'name'          => 'id[]',
									'id'            => 'id',
									'class'					=> 'form_control',
									'value'					=> $value['id'],
									'multiple'			=> 'multiple'
								);
								?>
									<tr>
										<th class="text-center"><?php $no++; echo $no; ?></th>
										<td><?php echo $value['nama'] ?></td>
										<td><?php echo $value['deskripsi'] ?></td>
										<td class="text-center"><?php echo $value['tgl'] ?></td>
										<td class="text-center">
											<?php echo form_checkbox($pilih)?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr class="text-center bg-dark">
									<th scope="col" colspan="4"></th>
									<th scope="col">
										<?php
										$att = array(
											'name'				=> 'hapusdata',
											'id'					=> 'hapusdata',
											'content'			=> 'Hapus',
											'title'				=> 'Hapus semua data yang di pilih',
											'class'				=> 'btn btn-dark btn-lg btn-block',
											'type'				=> 'button',
											'data-toggle'	=> 'modal',
											'data-target'	=> '.confirmdel'
										);
										echo form_button($att);
										?>
									</th>
								</tr>
							</tfoot>
						</table>
						<div class="modal fade confirmdel" tabindex="-1" role="dialog" aria-labelledby="Pemberitahuan" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="Pemberitahuan">Peringatan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										Hapus data tersebut?
									</div>
									<div class="modal-footer">
										<div class="col-3 m-0">
											<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Tidak</button>
										</div>
										<div class="col-3 m-0">
											<button type="submit" class="btn btn-primary btn-block">Ya</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$("#idbulk").click(function(){
			if($(this).is(':checked',true))
			{
				$("tr td #id").prop('checked', true);
			}
			else
			{
				$("tr td #id").prop('checked',false);
			}
		});
	});
	</script>
</body>
</html>
