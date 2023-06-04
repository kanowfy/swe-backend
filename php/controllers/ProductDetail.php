<?php

$viewProduct = $connection->prepare('SELECT p.name, p.description, p.image, c.name AS category_name, v.name AS variation_name, v.price AS variation_price FROM product p INNER JOIN category c ON p.category_id = c.id INNER JOIN variation v ON p.id = v.product_id WHERE p.name LIKE :product_name');
$viewProduct->bindParam(":product_name", $product_name, PDO::PARAM_STR);
$viewProduct->execute();

$columnNames = array_keys($viewProduct->fetch(PDO::FETCH_ASSOC));

$viewProduct->execute();
$productDetails = $viewProduct->fetchAll(PDO::FETCH_ASSOC);

$product_name = urlencode($productDetails[0]['name']);

echo '<table id="productDetailsTable" class="table table-light table-striped table-bordered">';
foreach ($columnNames as $columnName) {
    if ($columnName === 'name') { // If it's the name column
        echo '<tr>';
        echo '<th class="font-weight-bold" scope="row">Name:</th>';
        echo '<td class="productInfo">' . $productDetails[0]['name'] . '</td>';
        echo '</tr>';
    } elseif ($columnName === 'description') { // If it's the description column
        echo '<tr>';
        echo '<th class="font-weight-bold" scope="row">Description:</th>';
        echo '<td class="productInfo">' . $productDetails[0]['description'] . '</td>';
        echo '</tr>';
    } elseif ($columnName === 'image') { // If it's the image column
        echo '<tr>';
        echo '<th class="font-weight-bold" scope="row">Image:</th>';
        echo '<td class="productInfo"><img src="' . $productDetails[0]['image'] . '" alt="Product Image" class="product-image" style="max-width: 200px;"></td>';
        echo '</tr>';
    } elseif ($columnName === 'category_name') { // If it's the category name column
        echo '<tr>';
        echo '<th class="font-weight-bold" scope="row">Category:</th>';
        echo '<td class="productInfo">' . $productDetails[0]['category_name'] . '</td>';
        echo '</tr>';
    } elseif ($columnName === 'variation_name') { // If it's the variation name column
        echo '<tr>';
        echo '<th class="font-weight-bold" scope="row">Variations:</th>';
        echo '<td class="productInfo">';
        foreach ($productDetails as $row) {
            echo '<div>';
            echo '<strong>' . $row['variation_name'] . '</strong> - ' . $row['variation_price'].' VND';
            echo '</div>';
        }
        echo '</td>';
        echo '</tr>';
    }
}
echo '</table>';


  
  
?>