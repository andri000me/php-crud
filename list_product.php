<?php 
require_once('entities/product.class.php');
?>

<?php 
include_once('header.php');
$prods = Product::list_product();
?>
<div class="container text-center">
	<h3>All Products</h3><br>
	<div class="rows">
		<?php 
			foreach ($prods as $item) {
				?>
				
				<div class="col-2-of-4" >
          <div class="card">
            <div class="card__side card__side--front">

			<div class="bg-video">
        <video class="bg-video__content" autoplay muted loop>
		  <!--Chú ý-->
		  <!-- <div class="card__picture card__picture" >
                &nbsp;
              </div> -->
		  <img src="<?php echo $item['Picture'];?>" class="img-responsive"  alt="Image">
          <source
            src="https://res.cloudinary.com/dyogxjwr7/video/upload/v1572943371/imgsass/canh.mp4"
            type="video/mp4"
          />
          <source
            src="https://res.cloudinary.com/dyogxjwr7/video/upload/v1572943371/imgsass/canh.webm"
            type="video/webm"
          />
          Không load được video!
        </video>
      </div>
              
              <div class="card__details ">
                <ul>
				<p class="text-danger" style="box-sizing: initial !important;"><?php echo $item['ProductName'];?></p>
                </ul>
              </div>
            </div>
            <div class="card__side card__side--back card__side--back-1">
              <div class="card__cta">
                <div class="card__picture-box">
                  <p class="card__price-only">
                    Only
                  </p>
                  <p class="text-info"><?php echo $item['Price'];?></p>
                  <button class="btn btn-success" type="button">Buy</button>
                </div>
              </div>
            </div>
          </div>
		</div>
		
				<?php } ?>
	</div>
</div>

<?php 
include_once('footer.php');
?>
