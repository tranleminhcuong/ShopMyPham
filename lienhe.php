<?php 
require("model/database.php");
require("model/danhmuc.php");
require("model/mathang.php");

$dm = new DANHMUC();
$mh = new MATHANG();
$danhmuc = $dm->laydanhmuc();

$mathang = $mh->laymathang();


include("inc/top.php");
?>
<!-- ================================== -->
<div class="container">
	<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<form>
				<div class="form-group">
					<label for="hoten">Name</label>
					<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					
			    </div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					
				</div>
				<div class="form-group">
					<label for="sodienthoai">Phone number</label>
					<input type="text" class="form-control" id="sodienthoai">
				</div>
				<div class="form-group">
					<label for="noidung">Content</label>
					<input type="text" class="form-control" id="noidung">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<hr/>
		</div>
		<div class="col-sm-3">
			
		</div>
	</div>
</div>
<!-- ================================== -->
<?php
	include("inc/bottom.php");
?>