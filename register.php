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

  <?php
  include_once 'navBar.php';
  ?>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_SESSION['postdata'] = $_POST;
      unset($_POST);
      header("Location: register");
      exit;
    }
  }
  ?>

  <?php
  if (array_key_exists('postdata', $_SESSION)) {

    $email = $_SESSION['postdata']['email'];
    $pass = $_SESSION['postdata']['password'];
    unset($_SESSION['postdata']);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) $e = "";
    else $e = "E-mail nie prawidłowy";

    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number = preg_match('@[0-9]@', $pass);
    $specialChars = preg_match('@[^\w]@', $pass);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
      $p = 'Długość powyżej 8 znaków. Wymagana duże i małe litery, liczba oraz znak specjalny';
    } else {
      $p =  '';
    }

    if (strlen($p) + strlen($e) == 0) {
      include_once 'db_credentials.php';

      $conn = new mysqli($servername, $username, $password, $database);

      if (!$conn->connect_error) {
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);

        $sql = "SELECT * FROM `users` WHERE `users`.`email` = '" . $email . "'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
          $sql = "INSERT INTO `users` (`id`, `email`, `password`, `confirm`) VALUES (NULL, '" . $email . "', '" .
            password_hash($pass, PASSWORD_DEFAULT) . "', '" . $token . "');";

          $conn->query($sql);
          $conn->close();

          $subject = 'Test';
          $message = 'Proszę potwierdzić rejestrację: https://betadomain.site/confirm_registration?t=' . $token;
          $headers = 'From: rejestracja@betadomain.site' . "\r\n" .
            'Reply-To: rejestracja@betadomain.site' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

          mail($email, $subject, $message, $headers);
          $success = true;
        } else $e = "E-mail zajęty";
      }
    }
  }
  ?>

  <?php
  if (!$success) echo '<div class="bg-neutral-500 shadow-md shadow-neutral-500 p-8 flex-wrap opacity-90">
    <form action="register" method="post">
      <div class="mt-4">

        <div>
          <label class="block text-6xl " for="email">E-mail<label>
              <input type="text" placeholder="' . $e . '" name="email" class="text-5xl w-full px-4 py-2 mt-2 bg-neutral-600">
        </div>

        <div class="mt-4">
          <label class="block text-6xl " for="password">Hasło<label>
              <input type="password" placeholder="' . $p . '" name="password" class="text-5xl w-full px-4 py-2 mt-2 bg-neutral-600">
        </div>

        <div class="flex items-baseline justify-between text-4xl">
          <button class="px-6 py-6 mt-10 text-white rounded-lg bg-neutral-600 hover:bg-neutral-700">Rejestracja</button>
        </div>

      </div>
    </form>
  </div>'
  ?>

  <?php
  if ($success) echo '<div class="bg-neutral-500 shadow-md shadow-neutral-500 p-20 opacity-90 text-center">
    <p class="text-9xl"> Rejestracja zakończona sukcesem</p>
    <p class="text-6xl pt-10"> Proszę sprawdzić skrzynkę pocztową</p>
  </div>'
  ?>
  <script src="com_script.js"></script>
</body>

</html>