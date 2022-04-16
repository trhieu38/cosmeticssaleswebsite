<?php 
	$conn = mysqli_connect ("localhost","root","") or die ('Không thể kết nối cơ sở dữ liệu');
	mysqli_select_db($conn,"qlbanhang"); 
	mysqli_set_charset($conn,"utf8");
?>