<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'beverages';

$conn = mysqli_connect($server, $username, $password, $db);


function query($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


$names = [
  'frappuccino' => 'Frappuccino Blended Beverages',
  'chocolate_teavana' => 'Chocolate & Teavana',
  'expresso_brewedCoffee' => 'Expresso & Brewed Coffee'
];


function search($table, $data)
{
  $name_search = $data["name-search"];
  $min_price = $data["min-price"];
  $max_price = $data["max-price"];

  if (!$min_price) {
    $min_price = 0;
  }

  if (!$max_price) {
    $max_price = 1000000;
  }

  $query = "SELECT * FROM {$table}
              WHERE
            name LIKE '%$name_search%' AND
            (tall >= $min_price OR grande >= $min_price OR venti >= $min_price) AND
            (tall <= $max_price OR grande <= $max_price OR venti <= $max_price)
          ";
  return query($query);
}
