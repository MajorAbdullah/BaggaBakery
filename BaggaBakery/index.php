<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByid = $db_handle->runQuery("SELECT * FROM tblproduct WHERE id='" . $_GET["id"] . "'");
				$itemArray = array($productByid[0]["id"] => array(
					'name' => $productByid[0]["name"], 'id' => $productByid[0]["id"],
					'quantity' => $_POST["quantity"], 'price' => $productByid[0]["price"], 'image' => $productByid[0]["image"]
				));

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
	<TITLE>Pro Cart</TITLE>
	<link href="ok.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="style.css">


</HEAD>

<BODY>
	<div class="container">
		<?php @include 'header.php'; ?>
		<section class="home">
			<div id="shopping-cart">
				<div class="txt-heading">Shopping Cart</div>

				<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
				<?php
				if (isset($_SESSION["cart_item"])) {
					$total_quantity = 0;
					$total_price = 0;
				?>
					<table class="tbl-cart" cellpadding="10" cellspacing="1">
						<tbody>
							<tr>
								<th style="text-align:left;">Name</th>
								<th style="text-align:left;"></th>
								<th style="text-align:right;" width="5%">Quantity</th>
								<th style="text-align:right;" width="15%">Unit Price</th>
								<th style="text-align:right;" width="20%">Price</th>
								<th style="text-align:center;" width="5%">Remove</th>
							</tr>
							<?php
							foreach ($_SESSION["cart_item"] as $item) {
								$item_price = $item["quantity"] * $item["price"];
							?>
								<tr>
									<td>
										<?php $imageData = base64_encode($item["image"]);?>
										<img src="data:image/jpeg;base64,<?php echo $imageData; ?>" class="cart-item-image" />
										<?php echo $item["name"]; ?>
									</td>
									<td><?php echo ""; ?></td>
									<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
									<td style="text-align:right;"><?php echo $item["price"] . " PKR"; ?></td>
									<td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
									<td style="text-align:center;"><a href="index.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
								</tr>
							<?php
								$total_quantity += $item["quantity"];
								$total_price += ($item["price"] * $item["quantity"]);
							}
							?>

							<tr>
								<td colspan="2" align="right">Total:</td>
								<td align="right"><?php echo $total_quantity; ?></td>
								<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				<?php
				} else {
				?>
					<div class="no-records">Your Cart is Empty</div>
				<?php
				}
				?>
				<br>
				<hr>

				<a id="btnEmpty" href="home.php">Back to home </a>
				<a id="btnEmpty" href="registration.php">Register User </a>
				<a id="btnEmpty" href="checkout.php"> checkout </a>

			</div>

</BODY>

</HTML>