<?php
class Newbill
{

    function freeId()
    {
        global $pdo;
        $sql = $pdo->query("SELECT MAX(id) as max FROM orders");
        $result = $sql->fetch();
        $freeId = $result["max"] + 1;
        return $freeId;
    }

    function createBill($billId, $storeId, $dateTime)
    {
        global $pdo;
        $sql = "INSERT INTO orders (id, store_id, created_at, entry_time) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$billId, $storeId, $dateTime, date('Y-m-d H:i:s')]);
    }

    function entryTotal($total, $billId)
    {
        global $pdo;
        $sql = "UPDATE orders SET total=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$total, $billId]);
    }

    function enterItem($billNumber, $prodId, $price, $quantity)
    {
        global $pdo;
        $sql = "INSERT INTO order_item (order_id, item_id, price, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$billNumber, $prodId, $price, $quantity]);
    }
}