<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <div class="main">   
    <div class="content">
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['search']))
            {
            $key=$_POST['key'];
            $search_product=$product->search_product($key);
            }
        ?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Từ Khóa TÌm Kiếm: <?php echo $key ; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>

		
	    <div class="section group">
	      	<?php 
	      	if ($search_product) {
	      		while ($result = $search_product->fetch_assoc()) {
	      			# code...
	      		
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
					 <p><span class="price"><?php echo $result['price'].' VND' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php 
				}
	      	}else {
	      		echo "Không có kết quả";
	      	}
			?>
		</div>

	
	
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>