<?php
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-full w-full">

<head>
  <title>Betabooks</title>
  <link rel="icon" href="/res/favi.svg">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    html,
    body {
      background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.3'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      font-size: 10px;
    }

    .test {
      fill: aqua;
    }
  </style>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-full flex flex-col p-2 bg-neutral-200 text-neutral-100">

  <div class="flex h-20 w-full bg-neutral-700 shadow-md shadow-neutral-500 mb-2 opacity-90 items-center pl-4 text-4xl">
    <div class="flex flex-row max-h-full mr-2 block md:hidden">
      <img src="/res/sidebar.svg" class="w-12" onclick="openSidebar()" />
    </div>
    <span class="grow" id="title" onclick='g("/")' ><?php echo (isset($_SESSION['email'])) ? 'Witaj '.$_SESSION['email'] : 'Betabooks' ?></span>
    <div class="flex flex-row max-h-full mr-4 md:mr-10" onclick='g("purchase")'>
      <img src="/res/send.svg" class="w-12 mr-1" />
      <span class="hidden md:block">Przejdź do dostawy</span>
    </div>
  </div>

  <div class="min-h-full grow flex flex-row w-full opacity-90">
    <div class="w-full grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 auto-rows-min gap-3 p-3 bg-neutral-400 shadow-md shadow-neutral-500 text-neutral-600 ">
      <?php
      require 'db_credentials.php';

      $conn = new mysqli($servername, $username, $password, $database);

      if (!$conn->connect_error) {
        //$sql = "SELECT title, first_name, last_name FROM books 
        //INNER JOIN book_authors ON author_id = book_authors.id";

        $sql = 'SELECT carts.id AS cartId, books.id as shelfId, title, first_name, last_name, sub_cat, cat FROM books 
          INNER JOIN book_authors ON author_id = book_authors.id
          INNER JOIN book_sub_categories ON sub_cat_id = book_sub_categories.id
          INNER JOIN book_categories ON cat_id = book_categories.id
          INNER JOIN carts ON books.id = carts.book_id
          WHERE user_id = "' . $_SESSION['user_id'] . '"';

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $cat = "";
          while ($row = $result->fetch_assoc()) {
            echo '<div class="bg-neutral-200 aspect-video p-3 flex flex-row">
              <div class="aspect-square border-2 border-neutral-600" onclick="openBook(' . $row["shelfId"] . ')">
                <img src="/res/placeholder.svg" class="w-full mr-1" />
              </div>
              <div class="grow pl-2 flex flex-col">
                <div class="grow text-2xl p-2">
                  <h1 class="font-bold"> ' . $row["title"] . ' </h1> <br />
                  ' . $row["first_name"] . ' ' . $row["last_name"] . '
                </div>
                <div class="h-14 w-full border-2 border-neutral-600 text-lg items-center flex items-center justify-center truncate" onclick="removeCart(' . $row["cartId"] . ')">
                  USUŃ Z KOSZYKA
                </div>
              </div>
            </div>';
          }
        } else {
          echo "0 results";
        }

        $conn->close();
      }
      ?>

    </div>
    
    <script src="com_script.js"></script>
</body>

</html>