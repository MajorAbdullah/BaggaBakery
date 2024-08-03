<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) 
{
	switch ($_GET["action"]) 
	{
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByid = $db_handle->runQuery("SELECT * FROM tblproduct WHERE id='" . $_GET["id"] . "'");
				$itemArray = array($productByid[0]["id"] => array('name' => $productByid[0]["name"], 'id' => $productByid[0]["id"],
				 'quantity' => $_POST["quantity"], 'price' => $productByid[0]["price"], 'image' => $productByid[0]["image"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByid[0]["id"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByid[0]["id"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
				
				// echo "<script>alert('Product has been added to cart !');</script>";
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>

<HTML>

<HEAD>
	<TITLE>Product page</TITLE>
	<link href="ok.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="style.css">

	<!-- <script type="text/javascript">
		function showMessage() {
			alert("Product has been added to cart !");
		} -->
	</script>
</HEAD>

<BODY>

<div class="container">
<?php @include 'header.php'; ?>

	<div id="product-grid">
		<div class="txt-heading">
			<h1>PRODUCTS</h1>
		</div>
		

		<?php
		$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
		// SELECT * FROM `tblproduct` WHERE `id` BETWEEN 6 AND 8 ORDER BY `id` ASC
		if (!empty($product_array)) {
			foreach ($product_array as $key => $value) {
		?>
				<div class="product-item">
					<form method="post" action="new.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
					<div class="product-image">
								<?php
								$image_data = $product_array[$key]["image"];
								$base64_image_data = base64_encode($image_data);
								?>
								<img src="data:image/jpg;charset=utf8;base64,<?php echo $base64_image_data; ?>" />
							</div>
						<div class="product-tile-footer">
							<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
							<div class="product-price"><?php echo "$" . $product_array[$key]["price"]; ?></div>
							<div class="cart-action">
								<input type="text" class="product-quantity" name="quantity" value="1" size="2" />
								<input type="submit" id="submitForm" value="Add to Cart" class="btnAddAction" onClick="showMessage()" />
							</div>
						</div>
					</form>
				</div>

		<?php
			}
		}
		?>

	</div>
</BODY>

</HTML>