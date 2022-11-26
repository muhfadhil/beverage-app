<?php

require "./handlers/function.php";


// init page
$table = 'frappuccino';
$name = $names[$table];

if (isset($_POST["apply"])) {
  $table = $_POST["table"];
  $name = $names[$table];
}
$beverages = query("SELECT * FROM {$table}");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/style/style.css" />
  <title>Beverages</title>
</head>

<body>
  <header>
    <h1>Beverages</h1>
  </header>

  <main>
    <article class="content card">

      <section class="table-content">
        <h2><?= $name ?></h2>
        <a href="./components/detail.php?table=<?= $table ?>">detail</a>
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

    <aside class="select card">
      <form action="" method="POST">
        <label for="table">Jenis Minuman :</label>
        <select name="table" id="tables">
          <?php
          // $options = ['expresso_brewedCoffee', 'frappuccino', 'chocolate_teavana'];
          // $selected = isset($_POST['table']) ? $_POST['table'] : '';
          // foreach ($options as $option) {
          //   echo '<option value="' . $option . '"' . ($selected == $option ? ' selected' : '') . '>' . $option . '</option>';
          // }
          // 
          ?>
          <em>
            <option value="pilih_minuman" selected> --- pilih jenis minuman ---</option>
          </em>
          <option value="expresso_brewedCoffee">
            Expresso & Brewed Coffee
          </option>
          <option value="frappuccino">Frappuccino Blended Beverages</option>
          <option value="chocolate_teavana">Chocolate & Teavana</option>
        </select>
        <button disabled type="submit" name="apply" id="apply-btn">Apply</button>
      </form>
    </aside>
  </main>

  <footer>&copy; Muhammad Fadhil, 2022</footer>
  <script src="./handlers/script/script.js"></script>
</body>

</html>