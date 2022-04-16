<?php 
	    include("header.php");
    ?>

<div class="navigation">
    	<div class="blackRum">
        	<span class="home">
            	<a href="../index.php">Trang chủ</a>
                 › 
            </span><!--end home-->
            <span class="home">
            	<?php
					$id = $_GET['id'];
					$mypham_query ="SELECT * FROM product where id_product=".$id;
					$mypham_res = mysqli_query($conn,$mypham_query) or die("Cannot select table!");
					while ($mypham_items = mysqli_fetch_array($mypham_res))
					{
						echo'
								'.$mypham_items["parent_product"].'
							';
					
				echo '›';
				?>
            </span><!--home-->
            <span class="home">
            	<?php 
					echo ''.$mypham_items["type_product"].'';
					echo ' ›';
					
				?>
            </span><!--home-->
            <span class="tittleRum">
            	<?php 
					echo ''.$mypham_items["name_product"].'';
					}
				?>
            </span><!--tittle rum-->
        </div><!--end blackRum-->
    </div> <!--end navigation-->
    <section class="product_d content_ld">
    	<div class="detailP">
        	<aside class="images_d">
            	<div class="images_d_list owl-carousel owl-theme" style="opacity: 1; display: block;">
                	<div class="owl-wrapper-outer">
                    	<div class="owl-wrapper" style="width: 712px; left: 0px; display: block; transition: all 1000ms ease; transform: translate3d(0px, 0px, 0px);">
                        	<div class="owl-item" style="width: 356px;">
                            	<?php
                                	$id = $_GET['id'];
									$mypham_query ="SELECT * FROM product where id_product=".$id;
									$mypham_res = mysqli_query($conn,$mypham_query) or die("Cannot select table!");
									while ($mypham_items = mysqli_fetch_array($mypham_res))
									{
										echo'<img src="../images/'.$mypham_items["image_product"].'">';
									
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </aside><!--end images_d-->
            <aside class="desProduct">
            	<h1 class="detailPT">
                	<?php
                    	echo $mypham_items["name_product"];
						
					?>
                </h1>
                <div class="des">
                	<?php
									echo $mypham_items['describe_product'];
									
					?>
                </div><!--des-->
                <div class="proFtiter">
                	<?php
									echo 'Xuất xứ:';
									echo "<span>".$mypham_items['xuatxu']."</span>";
									echo '&nbsp;&nbsp;Quy cách:';
									echo "<span>".$mypham_items['quy_cach']."</span>";
									echo '&nbsp;&nbsp;Tình trạng:';
									echo "<span>".$mypham_items['tinh_trang']."</span>";
									
					?>
                </div><!--proFtiter-->
                <div class="pr_det_price ">
                	<span class="tittle">Giá bán:</span><!--tittle-->
                    <div class="price">
                	<?php
									echo "".number_format($mypham_items['price_product'])." VNĐ";
									}
					?>
                    </div><!--end price-->
                </div><!--pr_det_price -->
                <div class="pro_dg">
                	<div class="pro_dg_tt">
                    	<div class="pro_dg_tt">
                        	<div class='ratings'>
								<div class='rating-box'>
									<div style='width:100%;' class='rating'></div><!--end rating-->
								</div><!--end ratingbox-->
							</div><!--end ratings-->
                        </div><!--end pro_dg_tt-->
                    </div><!--end pro_dg_tt-->
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://localhost:3030/webmypham/san-pham/page-chitiet.php?id=<?php echo $id; ?>" class="fb shareFa"></a>
                    <a target="_blank" href="http://twitter.com/share?url=http://myphammtlpro.16mb.com/san-pham/page-chitiet.php?id=<?php echo $id; ?>" class="tw shareFa"></a>
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://myphammtlpro.16mb.com/san-pham/page-chitiet.php?id=<?php echo $id; ?>" class="gg shareFa"></a>
                </div><!--end pro_dg-->
                <div class="proDha">
                	<div class="btDah">
                    	<span class="bttOp">ĐẶT HÀNG NHANH GIAO HÀNG NGAY</span>
                        <span class="btBt">Xem hàng tại nhà không mua không sao</span>
                    </div><!--end btDah-->
                    	
                    <div class="btYctuv"> YÊU CẦU TƯ VẤN </div><!--end btYctuv-->
                </div><!--end proDha-->
                <div class="goiTongDa">
                	<i class="icon"></i>GỌI TƯ VẤN
                    <span>0984 114 827 - 0973 367 087</span>
                </div><!--goiTongDa-->
                <div class="hotroMnd">
                	<span>Để chuyên viên nhiều kinh nghiệm hỗ trợ bạn cách chăm sóc da cũng như chọn mua sản phẩm phù hợp với tình trạng da của bạn.</span>
                </div><!--end hotroMnd-->
            </aside><!--desProduct-->
            <aside class="ckProduct">
            	<div class="titile">
                	CAM KẾT KHI MUA HÀNG TẠI <span>SKV.VN</span>
                    
                </div><!--titile-->
                <div class="deCk deCkTtct">
                	<span class="icon"></span><!--end icon-->
                    <span class="ttCK">Nhận hàng trong <b class="30p">30 phút</b> tại TP.Vinh(Thanh toán Tiền mặt hoặc cà thẻ)</span><!--end ttCK-->
                </div><!--deCk deCkTtct-->
                <div class="deCk deCkGhMpTq">
                	<span class="icon"></span><!--end icon-->
                    <span class="ttCK">Giao hàng miễn phí toàn Quốc</span><!--end ttCK-->
                </div><!--Endd eCk deCkGhMpTq-->
                
                <div class="deCk deCkHln">
                	<span class="icon"></span><!--end icon-->
                    <span class="ttCK">Xem hàng tại nhà hài lòng mới thanh toán</span><!--end ttCK-->
                </div><!--end deCk deCkHln-->
                <div class="deCk deCkHlndt">
                	<span class="icon"></span><!--end icon-->
                    <span class="ttCK">Được đổi trả trong vòng 7 ngày với chính sách đặc biệt thuận lợi</span><!--end ttCK-->
                </div><!--end deCk deCkHlndt-->
                
                <div class="deCk deCkTlnq">
                	<span class="icon"></span><!--end icon-->
                    <span class="ttCK">Nhận ngay mẫu thử miễn phí - Tích lũy nhận quà</span><!--end ttCK-->
                </div><!--end deCk deCkTlnq-->
            </aside><!--end ckProduct-->
        </div><!--end detailP-->
        <div class="clear10px"></div><!--end clear10px-->
          
    </section>
    	
    


<!------------------------------------------FOOTER------------------------------------------------------>

<?php 
	    include("footer.php");
    ?>
    

</div><!--End Wrapper---> 
</body>
</html>