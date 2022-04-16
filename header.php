<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <?php
	    session_start();
	    ini_set("display_errors","0"); 
    ?>


    <?php

    // Số sản phẩm được thêm vào giỏ hàng.

	    $prd = 0;
 	        if(isset($_SESSION['cart']))
	    {
		    $prd = count($_SESSION['cart']);
	    }
    ?>

<head>
       
    <meta charset="UTF-8">
    
    <?php 
	    include("stylecss.php");
    ?>    

    <title> Shop mỹ phẩm </title>

    <!--Kết nối SQL-->
    <?php 
	    include("index/connect.php");
    ?>

</head>

    <div id ="wrapper">

        <div id ="header">

	        <div class ="topbar">

                <div class ="container">

    <!-- Phần Logo -->

    	            <div class="logo">
        	            <a href="/index.php">
                            <?php
            	                $logo_query = mysqli_query($conn,"SELECT * FROM logo_website ORDER BY  id_logo DESC limit 1");
				                while($logo_items = mysqli_fetch_array($logo_query))
				                    {
					                    echo '<img src="images/'.$logo_items['image_logo'].'" alt="'.$logo_items['name_logo'].'" tittle="'.$logo_items['name_logo'].'"/>';
				                    }
			                ?>
                        </a>
                    </div>

    <!--Kết thúc phần Logo-->

        
    <!--Phần đăng nhập-->  

    <?php
	    if(isset($_POST["btSubmit"]))
	        {
		        $username= $_POST["username"];
		        $password = md5($_POST["password"]);

		        //Làm sạch thông tin

		        $username = strip_tags($username);
		        $username = addslashes($username);
		        $password = strip_tags($password);
		        $password = addslashes($password);
		        if ($username == "" || $password =="")
		            {
			            echo '<div id="#login-box" class="login-popup" style="display:block;left: 563px;top: 315px;">
				
				            <a href="" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
				                Không được để trống!
				            </div>
				            <div id="mask" style="display:block;opacity: 0.7 !important;background: #000 !important;"></div>';
		            }

		        else
		            {
			            $sql = "select * from account where user_name = '$username' and password = '$password' ";
			            $query = mysqli_query($conn,$sql);
			            $items__ = mysqli_fetch_array($query);
			            $num_rows = mysqli_num_rows($query);
			            if ($num_rows==0) 
			                {
				                echo '<div id="login-box" class="login-popup" style="display:block;left: 495px;top: 315px;">
						                <a href="" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
						                Tên đăng nhập hoặc mật khẩu không đúng !
					                </div>
				                    <div id="mask" style="display:block;opacity: 0.7 !important;background: #000 !important;"></div>';
			                }
			            else
			                {
				                //Tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				                $_SESSION['username'] = $username;

                                // Thực thi hành động sau khi lưu thông tin vào session

                                // Ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                                header('Location: ');
			                }
		            }
 	        }
            else
            {
                
            }
    ?>


                <div class="login">
                    <?php
			            $sql_query =mysqli_query($conn, "select * from account where user_name=".$_SESSION['user_name']);
        	            if (isset($_SESSION['username']))
			                {
				                if ($_SESSION['username']=='admin')
				                    {
					                     echo '<a href="admin/admin.php" style="display:block; !important;" class="xinchao">Xin chào: '.$_SESSION['username'].'
				                                    <div class="hv_member">
          		                                        <span class="exit"><a href="admin/logout.php">Đăng xuất</a></span>
         		                                    </div>
				                                </a>';
				                    }
				                else
				                    {
					                    echo '<a href="#" style="display:block; !important;" class="xinchao">Xin chào: '.$_SESSION['username'].'
				                                <div class="hv_member">
          		                                    <span class="exit"><a href="admin/logout.php">Đăng xuất</a></span>
         		                                </div>
				                            </a>';
				                    }

				                        echo '<a href="#login-box" class="login-window" style="display:none !important;">Đăng nhập</a><a href="#" style="display:none !important;"> / Đăng ký</a>';
			                }
			            else
			                {
				                echo '<a href="admin/admin.php" style="display:none; !important;" class="xinchao">Xin chào:'.$_SESSION['username'].'</a>';
				                echo '<a href="#login-box" class="login-window" style="display:block !important;">Đăng nhập/Đăng ký</a>';
				            }
		           
		            ?>
                </div>
    <!--Kết thúc đăng nhập -->

    <!-- From đăng nhâp -->

                <div id="login-box" class="login-popup">
        	        <a href="" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                    <form method="post" class="signin" action="index.php">
                        <fieldset class="textbox">
            	            <label class="username">
                                <span>Tài khoản</span>
                                <input type="text" name="username" id="username" value=""/>
                            </label>
                
                            <label class="password">
                                <span>Mật khẩu</span>
                                <input type="password" name="password" id="password" value="" />
                            </label>
                
                            <button class="submit button" type="submit" name="btSubmit">Đăng nhập</button>
                 
                            <p>
                                <a class="forgot" href="#">Quên mật khẩu?</a> <a href="admin/register.php" class="register">Đăng ký</a>
                            </p>
                                
                        </fieldset>
                    </form>
		        </div>
    <!-- Kết thúc From đăng nhập -->

    <!--Kết thúc đăng nhập-->


    <!--Phần thồng tin liên hệ -->
       	        <div class="hotline">
                        <div class="pdetail"> Liên Hệ: 01234567890 - shopmypham@gmail.com</div>
                </div>
    <!-- Kết thúc phần thông tin liên hệ -->

            </div> <!--Kết thúc container-->
        </div>
    <!-- Kết thúc phần topbar -->
    

    <!-- Phần menu -->
            <div class="menu">
    	        <div class="container">
        	        <div class="nav">

        	            <div class='menu_leve_1'><a href ="index.php">Trang Chủ</a></div>
        	            <div class='menu_leve_1'><a href ="san-pham/cham-soc-da-mat.php">Chăm Sóc Da Mặt</a></div>
                        <div class='menu_leve_1'><a href ="san-pham/cham-soc-body.php">Chăm Sóc Body</a></div>

    <!-- Kết thúc phần menu -->

    <!-- Phần dỏ hàng -->

            <div class="cart_div">
                <a href="san-pham/shopping-cart.php" class="cart_top">
            	<span class="count"><?php echo $prd; ?></span><!--end count-->
    			<span class="tit">Giỏ hàng</span><!--end tit-->
                    
    		</a>
            <div class="quick_cart">

    <!-- Cập nhật lại khi nhập số lượng -->

            <?php
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


        <form method="post">
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

            <ul class="bottom_cart">
                <li class="sp">
                    <img src="images/<?php echo $rows['image_product']; ?>" class="cartImg">
                    <b class="Cart_title_pro"><?php echo $rows['name_product']; ?></b>
                    <div class="delete_Cart"><a href="san-pham/delcart.php?id=<?php echo $rows['id_product']; ?>" class="del_sp">Bỏ sản phẩm</a></div>
                    
                </li>
             <li class="dg"><?php echo number_format($rows['price_product']);?> VNĐ</li>
            <li class="sl"> <input type="text" name ="num[<?php echo $rows['id_product']; ?>]" value="<?php echo $_SESSION['cart'][$rows['id_product']]; ?>" size="3" class="capnhatCartTxt"/></li>
            <li class="tt"><?php echo number_format($rows['price_product']*$_SESSION['cart'][$rows['id_product']]); ?> VNĐ</li>
            </ul>
            
    <?php			
            }
        }
    ?>
    
    <div class="go_shopping">
    	<input type="submit" name="update_cart" value="Cập nhật giỏ hàng" class="cap_nhat_cart"/>
    	<a href="san-pham/shopping-cart.php" class="goa_shopping">Chuyển tới trang đặt hàng</a></div>
    </div><!--end cart_order-->
	</form>
                    </div><!--End Quick-->
            </div><!--end cart_div-->
            
            </div><!--end nav-->
            
        </div><!--end container-->
    </div><!---menu-->  

     <!-- Javascript -->
    <?php 
	    include("javascript.php");
    ?>
  
</div><!--End Header--->
</div>
</html>