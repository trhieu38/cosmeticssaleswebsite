 <?php 
	    include("header.php");
    ?>
<div class="navigation">
</div>
<div class="re-gis">
	<center>Đăng kí thành viên</center>
    <form action="register.php" method="post" name="formdk">
    	Họ và tên:    <input type="text" name="ht" class="ht" /> <br/>
    	<br/>Tên đăng nhập:<input type="text" name="tendn" class="tdn"/><br/>
        <br/>Mật khẩu:<input type="password" name="pw" class="pw"/> <br/>
        <br/>Xác nhận mật khẩu:<input type="password" name="xnpw" class="xnpw"/><br/>
        <br/>Điện thoại:<input type="text" name="sdt" class="sdt"/><br/>
        <br/>Địa chỉ giao hàng:<input type="text" name="dcgh" class="dcgh"/><br/>
        <br/>Giới tính:<input type="radio" name="gt" value="Nam" class="gt"/>Nam <input type="radio" name="gt" value="Nữ" class="gt"/>Nữ<br/>
        <input type="submit" name="sbmit" value="Đăng ký">
        <input type="reset" name="rs" value="Reset">
    </form>
    <?php
    	if(isset($_POST['sbmit']))
		{	
			$dk_query = mysqli_query($conn,"SELECT * FROM account ");
			$dk_items  = mysqli_fetch_array($dk_query);
			$hoten=$_POST['ht'];
			$tendn=$_POST['tendn'];
			$pw=md5($_POST['pw']);
			$xnpw=md5($_POST['xnpw']);
			$sdt=$_POST['sdt'];
			$gt=$_POST['gt'];
			$dcgh =$_POST['dcgh'];
			if(!$hoten || !$tendn || !$pw || !$xnpw || !$sdt || !$gt || !$dcgh)
			{
				
				echo 'Vui lòng nhập thông tin đầy đủ!<a href="javascript: history.go(-1)">Trở lại</a>';
				exit;
			}
			else
			{
				if ($dk_items['user_name'] == "$tendn")
				{
        			echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        			exit;
   				}
				else
				{
					if("is_integer($sdt)" == false)
					{
						echo 'Số điện thoại nhập không đúng!<a href="javascript: history.go(-1)">Trở lại</a>';
						exit;
					}
					else
					{
						if($pw == $xnpw)
						{
						$insert =mysqli_query($conn,"INSERT INTO account (ho_ten,gioi_tinh,dien_thoai,user_name,password,level,dia_chi) VALUE ('".$hoten."','".$gt."','".$sdt."','".$tendn."','".$pw."','3',N'".$dcgh."')");
						echo "Đăng ký thành công!";
						}
						else
						{
							echo 'Xác nhận mật khẩu không trùng khớp!';
						}
					}
				}
			}
			
			
		}
	?>
</div><!--end re-gis-->

<?php 
        include("footer.php");
    ?>
</body>
</html>