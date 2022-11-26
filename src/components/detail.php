<?php

require "../handlers/function.php";


// init page
$table = $_GET["table"];
$name = $names[$table];

$beverages = query("SELECT * FROM {$table}");

if (isset($_POST["search"])) {
  $beverages = search($table, $_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/style/detail.css" />
  <title>Beverages</title>
</head>

<body>
  <header>
    <h1>Beverages</h1>
  </header>

  <main>
    <article class="content card">
      <h2><?= $name ?></h2>
      <section class="filter">
        <form action="" method="POST">
          <input type="text" name="name-search" placeholder="beverage name" />
          <input type="number" name="min-price" placeholder="minimum price" />
          <input type="number" name="max-price" placeholder="maximum price" />
          <button type="submit" name="search" id="search-btn">Search</button>
        </form>
      </section>

      <section class="table-content">
        <table border="0" cellspacing="0">
          <thead>
            <th>No.</th>
            <th>Menu's Name</th>
            <th>Tall</th>
            <th>Grande</th>
            <th>Venti</th>
          </thead>
          <tbody>
            <?php foreach ($beverages as $key => $row) : ?>
              <tr>
                <th><?= $key + 1 ?></th>
                <td><?= $row["name"] ?></td>
                <td><?= $row["tall"] ?></td>
                <td><?= $row["grande"] ?></td>
                <td><?= $row["venti"] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </article>
    <a href="../index.php">kembali</a>
  </main>

  <footer>&copy; Muhammad Fadhil, 2022</footer>
  <script src="./handlers/script/script.js"></script>
</body>

</html>