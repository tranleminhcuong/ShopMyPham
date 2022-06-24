
<!DOCTYPE html>
<html>
<head>
  	<title>Đăng nhập</title>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" ></script>
	<style>
		body{
			background-color: #83b9f2;
		}
	</style>
</head>
<body>
		<nav class="navbar navbar-light bg-light sticky-top">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="public/images/logo1.png" width="100" height="40" class="d-inline-block align-top" alt="" />
					<b>Quên mật khẩu</b></a>
			</div>
		</nav>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">

			</div>
			<div class="col-sm-6">
				<div class="card">
					<h4 class="card-header"><i class="bi bi-key"></i> QUÊN MẬT KHẨU</h4>
					<div class="card-body">
					<?php 
						if(isset ($error_message))
						{
							?>
						<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
							<i class="bi bi-check-circle-fill"></i> <?php echo $error_message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php
						}
						elseif(isset ($message))
						{
							?>
						<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
							<i class="bi bi-check-circle-fill"></i> <?php echo $message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php
						}
						
					?>	
					<form method="post" >
						<div class="form-group">
							<label for="email" >Email</label>
							
							<input type="email" value="<?php if(isset($email)==true) echo $email;?>" class="form-control" id="email" name="email" placeholder="Nhập email" value="<?php if(isset($email)) echo $email;?>" required>
							
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label for=""><a href="index.php?action=dangnhap">Đăng nhập</a> |
									<a href="index.php?action=dangky">Đăng ký</a> 
								</label>
							</div>
							<div class="col-sm-6 ">
								<input type="hidden" name="action" value="xulygui">
								<button type="submit" name="nutguiyeucau" value="nutgui" class="btn btn-block btn-primary">Gửi</button>
							</div>
						</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	
</body>
</html>