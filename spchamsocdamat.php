    <div class="sliderows">

    	<div class="navicate">
        	
            <h2 class="parent">
                <a href="#" tittle="CHĂM SÓC DA MẶT">CHĂM SÓC DA MẶT </a>
            </h2>

        </div>

   		<div class="row_product owl-carousel owl-theme" style="opacity:1; display:block; ">
    		
            <div class="owl-wrapper-outer">
            	
                <div class="owl-wrapper" style="width: 4680px; left: 0px; display: block; transition: all 300ms ease; transform: translate3d(0px, 0px, 0px);">
            	
                    <?php
				
                	     $csdamat_query="SELECT * FROM product where type_product=N'chăm sóc da mặt' ORDER BY id_product DESC limit 5";
					     $csdamat_res = mysqli_query($conn,$csdamat_query) or die('Cannot select table!');
					     while ($csdamat_items = mysqli_fetch_array($csdamat_res))
					{
				    ?>
                        <div class="owl-item" style="width: 233px;">
                	    <div class="row_product_h">
                    <?php
					    echo"
					    <a href='san-pham/page-chitiet.php?id=".$csdamat_items['id_product']."' class='images'>
						<img alt='".$csdamat_items['name_product']."' src='images/".$csdamat_items['image_product']."'>
					    </a>
					    <h2 style='margin-top:0px;margin-bottom:0px;'>
					   <a title='".$csdamat_items['name_product']."' href='san-pham/page-chitiet.php?id=".$csdamat_items['id_product']."'>".$csdamat_items['name_product']."</a>
					     </h2>
					     <div class='price'>".number_format($csdamat_items['price_product'])." VNĐ</div><!--end price-->
					<div class='ratings'>
                        ".$csdamat_items['tinh_trang']."
                    </div>
                    <!--end ratings-->
					<a href='san-pham/add-cart.php?id=".$csdamat_items['id_product']."'><div class='add_cart' style='display:none;'><i></i>MUA NGAY</div></a>
					";
				?>
                	</div>
                </div>
                <?php
					}
				?>
                
                </div>
            </div>
    	</div>
    </div>