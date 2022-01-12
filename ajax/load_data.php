<?php 
include("../configs/db.php");
//include("../header.php");

if (isset($_POST['page'])) {
	$page = $_POST['page'];
}else{
	$page = 1;
}

$pagination = "";
$limit = 4;
$start = ($page - 1)* $page;

$pages = mysqli_query($db,"SELECT count(Product_ID) AS Product_ID FROM products");

while ($row = mysqli_fetch_array($pages)) {
	$total = $row['Product_ID'];
	$count = ceil($total / $limit);

   for ($i=1; $i <=$count ; $i++) { 
   	
$pagination .= "


	 <nav aria-label='Page navigation example'>
		<ul class='pagination pagination-circle pg-blue'>
			<li class='page-item disabled'>
			<a class='page-link'>First</a></li>
			<li class='page-item disabled'>
			<a class='page-link' aria-label='Previous'>
				<span aria-hidden='true'>&laquo;</span>
				<span class='sr-only'>Previous</span>
			</a>
			</li>

			
			
			<li class='page-item active'>
				<a id='".$i."' href='' class='page-link '>".$i."</a>
			</li>

			<li class='page-item'>
				<a class='page-link' aria-label='Next'>
					<span aria-hidden='true'>&raquo;</span>
					<span class='sr-only'>Next</span>
				</a>
			</li>
			<li class='page-item'><a class='page-link'>Last</a></li>
	</nav>

    
";}
}

$query = "SELECT * FROM products LIMIT $start, $limit";
$res = mysqli_query($db,$query);

$output = "";
if (mysqli_num_rows($res) < 1) 
{
	$output .= "<h1 class='text-center'>NO DATA IN THE DB</h1>";
}
else
{
	while ($row = mysqli_fetch_array($res)) {
	$output .= "
		<div class='col-6'>
			<form method='post'>
				<div class='product-box mb-40'>
					<div class='product-box-wrapper'>
						<div class='product-img'>
							<img src='img/product_images/".$row['Product_Image_Name']."'  class='w-100' alt='' >

							<a href='single-product-4.php' class='d-block'>
								<div class='second-img'>
									<img src='img/uploadImages/".$row['Product_Image_Name']."'  class='w-100' alt='' >
									<input type='hidden' name='image' value='".$row['Product_Image_Name']."' id='image".$row['Product_ID']."'>
								</div>
							</a>
							<a href='javascript:void(0)' class='product-img-link quick-view-1 text-capitalize'>Quick view</a>
						</div>

						<div class='product-desc pb-20'>
							<div class='product-desc-top'>
								<div class='categories'>
									<a href='shop.php' class='product-category'>
										<span>categories</span>
									</a>
								</div>
								<a href='wishlist.php' class='wishlist float-right'>
									<span>
										<i class='fal fa-heart'></i>
									</span>
								</a>
							</div>
							<a href='single-product-4.php' class='product-title'>".$row['Product_Name']."</a>
							<div class='price-switcher'>
								
							<span class='price switcher-item'>".$row['Product_Description']."</span>
							
							<input type='hidden' name='id' value='".$row['Product_ID']."' id='".$row['Product_ID']."'>
							<input type='hidden' name='name' value='".$row['Product_Name']."' id='name".$row['Product_ID']."'>
							<input type='hidden' name='price' value='".$row['Product_Description']."' id='price".$row['Product_ID']."'>
							 <a href='ajax/add-cart.php?id=" . $row['Product_ID'] . "' class='add-cart text-capitalize switcher-item'>+add
                                                                        to cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	";}
}

$data['output'] = $output;
$data['pagination'] = $pagination;

echo json_encode($data);
?>