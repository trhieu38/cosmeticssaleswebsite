<section class="content_ld">
    	
        <aside class="filter" id="filter_cate">

        	<div class="filter_v">

            	<div class="general" id="loaida">

                <ul class="menu_left">

                <?php
					$menu_left_query ="select * from submenu where type_sub =N'chăm sóc da mặt'";
					$menu_left_res =mysqli_query($conn,$menu_left_query);
					echo "<li><a href='cham-soc-da-mat.php' class='tittlea'>CHĂM SÓC DA MẶT</a>
									<ul class='menu_in_left'>";
									while($menu_left_items = mysqli_fetch_array($menu_left_res))
									{
										echo"<li><a href='".$menu_left_items['link_sub']."'>".$menu_left_items['name_sub']." </a></li>";
									}
					echo "
									</ul>
						</li>";
				?>
                </ul>
                </div><!--end general loaida-->
                
                <div class="clear15px"></div>
                <div class="general" id="loaida">
                <ul class="menu_left" >
                <?php
					$menu_left2_query ="select * from submenu where type_sub =N'chăm sóc body'";
					$menu_left2_res =mysqli_query($conn,$menu_left2_query);
					echo "<li><a href='cham-soc-body.php' class='tittlea'>CHĂM SÓC BODY</a>
									<ul class='menu_in_left'>";
									while($menu_left2_items = mysqli_fetch_array($menu_left2_res))
									{
										echo"<li><a href='".$menu_left2_items['link_sub']."'>".$menu_left2_items['name_sub']." </a></li>";
									}
					echo "
									</ul>
						</li>";
				?>
                </ul>
                </div><!--end general loaida-->
                
               
                
                
                
            </div><!--end filter_v-->
        </aside><!--end filter -->