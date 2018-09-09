<div class="header_bottom">
	<!--<div style="font-size: 20px;" class="header_bottom_left">-->
		<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php 
						$getCat = $cat->getAllCat();
						if ($getCat) {
							while ($result = $getCat->fetch_assoc()) {
						
					 ?> 
					<!-- category gulor name show kore and link e tader id die dea-->
			      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
			      		<?php } } ?>
				</ul>
	
		</div>
		
     <!--</div>-->
		<div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/11.jpg" alt=""/></li>
						<li><img src="images/22.jpg" alt=""/></li>
						<li><img src="images/33.jpg" alt=""/></li>
						<li><img src="images/44.jpg" alt=""/></li>
						<li><img src="images/55.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
 </div>