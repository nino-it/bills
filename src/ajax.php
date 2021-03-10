<?php
include('../config.php');
include('../admin/newbill.php');

// send bill data to create bill
if (isset($_POST['myData'])) {
    $entry = new Newbill;
    $total = 0;

    // full bill data
    $json = $_POST['myData'];
    $allProd = json_decode($json, true);
    $allProdLength = count($allProd);

    // store ID key and datetime
    $storeId = $allProd['0']['storeId'];
    $dateTime = $allProd['0']['time'];

    // getting bill and store ids so  
    // we can create a new bill in the db
    // without the nesesary foreign keys
    $billNumber = $entry->freeId();
    $enterBill = $entry->createBill($billNumber, $storeId, $dateTime);

    for ($i = 0; $i < $allProdLength; $i++) {
        foreach ($allProd[$i] as $key => $val) {
            switch ($key) {
                case 'storeId':
                    $storeId = $val;
                    break;
                case 'productId':
                    $prodId = $val;
                    break;
                case 'quantity':
                    $quantity = $val;
                    break;
                case 'price':
                    $price = $val;
                    break;
            }
        }
        $entry->enterItem($billNumber, $prodId, $price, $quantity);
    }

    echo $total;
}
exit;
// entry total bill
// $entry->entryTotal($total, $billNumber);