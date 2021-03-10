<?php
class Item
{

    function getCategories()
    {
        global $pdo;
        $sql = $pdo->query("SELECT * FROM category ORDER BY type ASC");
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function enterItem($values)
    {
        global $pdo;
        $name = $values['item-name'];
        $catId = $values['category-id'];
        $sql = "INSERT INTO items (name, category_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $catId]);
    }
}