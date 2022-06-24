<!DOCTYPE html>
<html>
<head>
  	<title>Đăng ký</title>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<style>
		body{
			background-color: #83b9f2;
		}
	</style>
	<script src="../public/js/shopquantri.js"></script>
</head>
<body>
		<nav class="navbar navbar-light bg-light sticky-top">
			<div class="container">
				<a class="navbar-brand" href="../../index.php">
					<img src="../public/images/logo1.png" width="100" height="40" class="d-inline-block align-top" alt="" />
					<b>Đăng ký</b></a>
			</div>
		</nav>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">

			</div>
			<div class="col-sm-6">
				<div class="card">
					<h4 class="card-header"><i class="bi bi-plus-square"></i> ĐĂNG KÝ</h4>
					<div class="card-body">
					<form method="post" onsubmit="return ktxacnhanmatkhau()">
						<div class="form-group">
							<label for="email" >Email</label>	
							<input type="email" class="form-control" name="txtemail" required>
						</div>
                        <div class="form-group">
							<label for="hoten" >Họ tên</label>	
							<input type="text" class="form-control" name="txthoten" required>
						</div>
                        <div class="form-group">
							<label for="txtdienthoai" >Số điện thoại</label>	
							<input type="number" class="form-control" name="txtdienthoai" required>
						</div>
						<div class="form-group">
							<label for="inputPassword3">Mật khẩu</label>
							<input type="password" class="form-control" id="matkhau" name="txtmatkhau" required>	
						</div>
						<div class="form-group">
							<label for="inputPassword3">Xác nhận mật khẩu</label>
							<input type="password" class="form-control" id="xacnhanmatkhau" name="txtmatkhau" required>	
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
							<label for="">Bạn có tài khoản? | <a href="index.php?action=dangnhap">Đăng nhập</a></label>
							</div>
							<div class="col-sm-6 ">
								<input type="hidden" name="action" value="xulydangky">
								<button type="submit" class="btn btn-block btn-primary">Đăng ký</button>
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