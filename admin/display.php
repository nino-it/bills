<?php
class Bill
{

    function getUser($data)
    {
        global $pdo;

        if (isset($_SESSION['name'])) {

            $stmt = $pdo->query("SELECT * FROM users WHERE id=$data");
            $result = $stmt->fetch();
            return $result['name'];
        }
    }

    function getStore($data)
    {
        global $pdo;

        if ($data == '0') {

            $stmt = $pdo->query("SELECT * FROM stores");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } else

        if (isset($_SESSION['name'])) {
            $stmt = $pdo->query("SELECT * FROM stores WHERE id=$data");

            $result = $stmt->fetch();
            return $result['name'];
        }
    }

    function getItems($data)
    {

        global $pdo;

        if ($data == '0') {
            $stmt = $pdo->query("SELECT * FROM items");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } else

        if (isset($_SESSION['name'])) {
            $stmt = $pdo->query("SELECT * FROM items WHERE id=$data");

            $result = $stmt->fetch();
            return $result['name'];
        }
    }

    function getMonth()
    {
        global $pdo;

        $chartData = array(
            "povrće" => 0,
            "meso" => 0,
            "smrznuto" => 0,
            "suhomesnato" => 0,
            "alkohol" => 0,
        );


        $stmt = $pdo->query("SELECT oi.price price, oi.quantity quantity, c.id, c.type cat  
                             FROM orders o
                             LEFT JOIN order_item oi ON o.id = oi.order_id
                             LEFT JOIN items it ON oi.item_id = it.id
                             LEFT JOIN category c ON it.category_id = c.id
                             WHERE created_at BETWEEN '2021-02-01' and '2021-03-01';");

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = count($rows);
        for ($i = 0; $i < $count; $i++) {
            foreach ($rows[$i] as $key => $val) {
                if ($key == 'cat') {
                    $price = $rows[$i]['price'];
                    switch ($val) {
                        case 'povrće':
                            $chartData[$val] += $price;
                            break;
                        case 'meso':
                            $chartData[$val] += $price;
                            break;
                        case 'smrznuto':
                            $chartData[$val] += $price;
                            break;
                        case 'suhomesnato':
                            $chartData[$val] += $price;
                            break;
                        case 'alkohol':
                            $chartData[$val] += $price;
                            break;
                    }
                }
            }
        }

        return $chartData;
    }

    function getBill($id = 1)
    {
        global $pdo;

        $stmt = $pdo->query("SELECT s.name store_name, o.created_at date_time, o.total total, i.name item_name, oi.price, oi.quantity
                             FROM order_item oi
                             LEFT JOIN orders o ON oi.order_id = o.id
                             LEFT JOIN items i ON oi.item_id = i.id
                             LEFT JOIN stores s ON o.store_id = s.id
                             WHERE o.id=$id;");

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    function getBills()
    {
        global $pdo;

        $stm = $pdo->query("SELECT s.name sname, o.created_at time, u.name uname, o.id
                            FROM orders o
                            INNER JOIN stores s ON s.id = o.store_id
                            INNER JOIN users u ON u.id = o.user_id
                            LIMIT 5;");

        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    function getBillPrice($data)
    {
        global $pdo;

        $stmt = $pdo->query("SELECT total
                             FROM orders
                             WHERE id=$data");

        $result = $stmt->fetch();
        return $result['total'];
    }

    function getCount()
    {

        global $pdo;

        if (isset($_SESSION['name'])) {
            $stmt = $pdo->query("SELECT SUM(quantity) 
                                 FROM order_item
                                 WHERE order_id=1");

            $result = $stmt->fetch();
            echo $result[0];
        }
    }
}


        /*
        foreach ($rows as $row) {

            printf("$row[0] $row[1] $row[2]\n");
        }
    */

        /*
        foreach ($rows as $row) {

            echo $row['name'];
        }
        exit;*/