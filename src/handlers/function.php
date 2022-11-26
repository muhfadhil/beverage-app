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
