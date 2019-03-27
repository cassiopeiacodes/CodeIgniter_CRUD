<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRUD | CodeIgniter</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/material-icons.css');?>" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.bundle.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
	<div id="sidenav" class="sidenav">
		<div class="nav flex-column">
			<div class="nav-item">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			</div>
			<div class="nav-item">
				<a class="nav-link nav-link-item" href="Create">Buat Data (Create)</a>
			</div>
			<div class="nav-item">
				<a class="nav-link nav-link-item" href="Read">Lihat Data (Read)</a>
			</div>
			<div class="nav-item">
				<a class="nav-link nav-link-item" href="Update">Perbarui Data (Update)</a>
			</div>
			<div class="nav-item">
				<a class="nav-link nav-link-item" href="Delete">Hapus Data (Delete)</a>
			</div>
		</div>
	</div>

	<div class="header bg-dark text-light">
		<div class="col">
			<div class="row justify-content-between align-items-center">
				<div class="col-auto">
					<P class="display-4 ml-3">CRUD CODEIGNITER</p>
				</div>
				<div class="col-auto">
					<div class="nav">
						<div class="nav-item">
							<a class="nav-link text-light" href="<?php echo base_url(); ?>" title="Kembali Ke Beranda">
								<i class="material-icons">home</i>
							</a>
						</div>
						<div class="nav-item">
							<span style="font-size:30px;cursor:pointer" onclick="openNav()" title="Menu">
								<i class="material-icons" label="Menu">menu</i>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade msgconfirm" tabindex="-1" role="dialog" aria-labelledby="Pemberitahuan" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="Pemberitahuan">Pemberitahuan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php if(!empty($this->session->flashdata('msg_data'))) echo $this->session->flashdata('msg_data'); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<script>
	<?php if(!empty($this->session->flashdata('msg_data'))) { ?>
		$(window).on('load',function(){
			$('.msgconfirm').modal('show');
		});
	<?php } ?>

	function openNav() {
		$("#sidenav").css("width","20%");
	}

	function closeNav() {
		$("#sidenav").css("width","0");
	}
	</script>
</body>
</html>
