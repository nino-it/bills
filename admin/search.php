<?php
include('../config.php');

global $pdo;
$search = $_POST['query'];

if (isset($search) && $search != "") {
  $search = "%$search%";

  $stmt = $pdo->prepare("SELECT * FROM items WHERE name LIKE ? LIMIT 5");
  $stmt->execute([$search]);
  $data = $stmt->fetchAll();

  echo "<ul>";
  foreach ($data as $row) {
    echo "<li data-value=" . $row['id'] . ">" . $row['name'] . "</li>";
  }
  echo "</ul>";
} else exit;