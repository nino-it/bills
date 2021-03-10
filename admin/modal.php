<?php
include('../config.php');
include('../admin/display.php');

// get full bill for given id
if (isset($_POST['billId'])) {
    $total = 0;
    $json = $_POST['billId'];
    $abill = json_decode($json, true); // a bill 
    $billo = new Bill; //bill object

    $bills = $billo->getBill($abill);

    echo "<div class='modal-store'>" . $bills[0]['store_name'] . "</div>";
    echo "<div class='modal-date'>" . date("H:i - d. m. Y.", strtotime($bills[0]['date_time'])) . "</div>";

    //item list
    foreach ($bills as $key => $bill) {
        $fullprice = $bill['quantity'] * $bill['price'];
        $total += $fullprice;
        $price = number_format($bill['price'], 2, ',', '.');
        $fullprice = number_format($fullprice, 2, ',', '.');

        echo "<div class='modal-item'><div class='modal-name'>" . $bill['item_name'] . "</div>";
        echo "<span class='modal-quantity'>" . $bill['quantity'] . " x </span>";
        echo "<span class='modal-price'>" . $price . "</span>";
        echo "<span class='modal-full-price'>" . $fullprice . "</span></div>";
    }

    $total = number_format($total, 2, ',', '.');
    echo "<div class='modal-footer'>";
    echo "<span>TOTAL: </span>";
    echo "<span class='modal-total'>" . $total . "</span> ";
    echo "</div>";
}