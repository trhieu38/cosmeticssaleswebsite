<html>

<head>

    <?php 
	    include("header.php");
    ?>

</head>

<body>

    <div id ="wrapper">
	    <div class="navigation">
    	    <div class="blackRum">
        	    <span class="home">

            	    <a href="../index.php">Trang chủ</a>  › 

                </span>

                <span class="tittleRum">
            	    Chăm Sóc Body
                </span>

            </div>
        </div>


    <?php 
	    include("menu.php");
    ?>
        <aside class="product_l">
        	<div class="product_boder">
            	<?php 
								// tong so records
								$result =mysqli_query($conn,"select count(id_product) as total from product where type_product=N'chăm sóc body'");
								$row = mysqli_fetch_assoc($result);
								$total_records = $row['total'];
								// tim limit va current 
								$current_page = isset($_GET['page']) ? $_GET['page']:1;
								$litmit =12;
								$total_page =  ceil($total_records / $litmit);
								if($current_page > $total_page )
								{
									$current_page = $total_page;
								}
								else if($current_page < 1 )
								{
									$current_page = 1;
								}
								$start = ($current_page - 1) * $litmit;
								$result = mysqli_query($conn,"SELECT * FROM product where type_product=N'chăm sóc body' ORDER BY id_product DESC LIMIT $start, $litmit");
								
				?>
                <?php
					while ($row = mysqli_fetch_assoc($result))
					{
						echo"<div class='product_item'>";
						echo"
							<a href='#' class='images'>
							<img alt='".$row['name_product']."' src='../images/".$row['image_product']."'>
							</a>
							<h2 style='margin-top:0px;margin-bottom:0px;'>
							<a title='".$row['name_product']."' href='#'>".$row['name_product']."</a>
							</h2>
							<div class='price'>".number_format($row['price_product'])." VNĐ</div><!--end price-->
							<div class='ratings'>
								<div class='rating-box'>
									<div style='width:100%;' class='rating'></div><!--end rating-->
								</div><!--end ratingbox-->
							</div><!--end ratings-->
							<div class='add_cart' onclick='clickme()'><i></i><a href='add-cart.php?id=".$row['id_product']."'>MUA NGAY</a></div>
							";
							echo "</div><!--end product_items-->";
					}
				?>
                
            </div><!--end product_boder-->
            <div class="phan_trang">
            	<?php
                	if($current_page > 1 && $total_page > 1)
					{
						echo "<a href='cham-soc-body.php?page=".($current_page - 1)."'>
								<b class='prev'></b>
							</a>";
					}
					echo"<ul class='ul_phan_page'>";
					for($i = 1;$i <= $total_page;$i++)
					{
						
						if($i == $current_page)
						{
							echo "<li><span class='color_current'>".$i."</span></li>";
						}
						else
						echo "<li><a href='cham-soc-body.php?page=".$i."'>".$i."</a></li>";
						
					}
					echo"</ul>";
					if($current_page < $total_page  && $total_page > 1)
					{
						echo "<a href='cham-soc-body.php?page=".($current_page + 1)."'>
							<b class='next'></b>
						</a>";
					}
					
				?>
            </div><!--end phan_page-->
        </aside><!--end product_l-->
    </section><!--end content ld-->
    <?php 
	    include("footer.php");

    ?>

</div><!--End Wrapper---> 
</body>
</html>