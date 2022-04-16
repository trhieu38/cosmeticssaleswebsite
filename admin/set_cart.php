<?php
	session_start();
	ini_set("display_errors","0");
?>
<?php

 // so san pham da add vao cart
	$prd = 0;
	if(isset($_SESSION['cart']))
	{
		$prd = count($_SESSION['cart']);
	}
?>

<html>

<head>

    <?php 
	    include("header.php");
    ?>

</head>
<br>
<body>

<div class="navigation">
</div>

<?php //cap nhat lai gia khi nhap vao so luong
	if(isset($_POST['update_cart']))
	{
		foreach($_POST['num'] as $id => $prd)//prd la gia tri nhap vao.moi id tuong ung voi so luong nhap vao
		{
			if(($prd == 0) and (is_numeric($prd)))//nhap vao =0 thi xoa san pham do di
			{
				unset($_SESSION['cart'][$id]);
			}
			elseif(($prd > 0) and (is_numeric($prd)))//nhap vao so luong >0  thi tiep tuc tinh
			{
				$_SESSION['cart'][$id] = $prd;
			}
		}
	}
?>
<form method="post" action="success.php">
	<div class="main-shopping">
<p class="cart_info"><?php if($_SESSION['cart'] != NULL) {echo "Thông tin chi tiết giỏ hàng!";} else{echo"Hiện tại bạn chưa có sản phẩm nào!";} ?></p>
		<?php
        	$khachhang = mysqli_query($conn,"SELECT * FROM account WHERE user_name ='".$_SESSION['username']."'");
			$items = mysqli_fetch_array($khachhang);
		?>
		
        		<div class="ttkh">
					<span class="ttkh">THÔNG TIN KHÁCH HÀNG:</span>
           		 	<br/>Họ và tên: <?php echo $items['ho_ten']; ?>
                    <br/>Điện thoại:<?php echo $items['dien_thoai']; ?>
                    <br/>Địa chỉ giao hàng: <?php echo $items['dia_chi']; ?>
				</div><!--end ttkh-->
      
			
		
		<span class="ttkh">THÔNG TIN CHI TIẾT CÁC SẢN PHẨM TRONG ĐƠN HÀNG:</span>
        <div class="clear10px"></div>
	<div class="cart_oder">
    	<ul class="top_cart">
        	<li class="sp">SẢN PHẨM </li>
            <li class="dg">ĐƠN GIÁ</li>
            <li class="sl">SỐ LƯỢNG</li>
            <li class="tt">THÀNH TIỀN</li>
        </ul>
		
<?php
	$sum_all = 0;
	$sum_sp = 0;
	if($_SESSION['cart'] != NULL)
	{
		foreach($_SESSION['cart'] as $id =>$prd)
		{
			$arr_id[] = $id;
		}
		$str_id = implode(',',$arr_id);
		$item_query = "SELECT * FROM  product WHERE id_product IN ($str_id) ORDER BY id_product ASC";
		$item_result = mysqli_query($conn,$item_query) or die ('Cannot select table!');
		while ($rows = mysqli_fetch_array($item_result))
		{
?>
		<!--SHOW CART-->
	
        <ul class="bottom_cart">
        	<li class="sp">
            	<a><img src="../images/<?php echo $rows['image_product']; ?>" class="cartImg"></a>
                <a class="Cart_title_pro"><?php echo $rows['name_product']; ?></a>
                <div class="delete_Cart"><a href="../san-pham/delcart.php?id=<?php echo $rows['id_product']; ?>">Bỏ sản phẩm</a></div>
            </li>
            <li class="dg"><?php echo number_format($rows['price_product']);?> VNĐ</li>
            <li class="sl"> <input type="text" name ="num[<?php echo $rows['id_product']; ?>]" value="<?php echo $_SESSION['cart'][$rows['id_product']]; ?>" size="3" class="capnhatCartTxt"/></li>
            <li class="tt"><?php echo number_format($rows['price_product']*$_SESSION['cart'][$rows['id_product']]); ?> VNĐ</li>
        </ul>	
<?php
$sum_all += $rows['price_product']*$_SESSION['cart'][$rows['id_product']];
$sum_sp += $_SESSION['cart'][$rows['id_product']];
		}
	}
?>
    </div><!--end cart_oder-->

<p class="update_cart">
	<input type="submit" name="update_cart" value="Cập nhật giỏ hàng" class="cap_nhat_cart"/>
    <input type="submit" name="btDathang" value="ĐẶT HÀNG" class="dat_hangsr"/>
    
   
</p><!---end update-cart--->

<p class="sum_money">Tổng sản phẩm:<strong class="sum_sp"><?php echo $sum_sp; ?></strong><br/>Tổng tiền:<strong class="sum_sp"><?php echo number_format($sum_all); ?> VNĐ</strong></p>
</form>
</div><!--end main shopping--> 
<div class="clear10px"></div>
    	
    	
    <?php 
	    include("footer.php");

    ?>




</div><!--End Wrapper---> 
</body>
</html>