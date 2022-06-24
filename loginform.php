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
					<b>Đăng nhập</b></a>
			</div>
		</nav>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">

			</div>
			<div class="col-sm-6">
				<div class="card">
					<h4 class="card-header"><i class="bi bi-box-arrow-right"></i> ĐĂNG NHẬP</h4>
					<div class="card-body">
					<?php 
						if(isset ($error_message))
						{
							?>
						<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
							<i class="fa fa-times-circle" aria-hidden="true"></i> <?php echo $error_message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php
						}
						elseif(isset ($success_message))
						{
							?>
						<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
							<i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $success_message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php
						}
						
					?>	
					<form method="post">
						<div class="form-group">
							<label for="email" >Email</label>
							
							<input type="email" class="form-control" id="email" name="txtemail" value="<?php if(isset($email)) echo $email;?>" required>
							
						</div>
						<div class="form-group">
							<label for="inputPassword3">Mật khẩu</label>
							<input type="password" class="form-control" id="matkhau" name="txtmatkhau" required>	
						</div>
						
						<div class="form-group row">
							<div class="col-sm-6">
								<label for="">
									<a href="index.php?action=dangky">Đăng ký</a> | <a href="index.php?action=quenmatkhau">Quên mật khẩu</a> 
								</label>
							</div>
							<div class="col-sm-6 ">
								<input type="hidden" name="action" value="xulydangnhap">
								<button type="submit" class="btn btn-block btn-primary">Đăng nhập</button>
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