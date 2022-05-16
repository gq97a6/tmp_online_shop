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

  <div class="bg-neutral-500 shadow-md shadow-neutral-500 p-8 flex-wrap opacity-90">
    <form action="">
      <div class="mt-4">
        
        <div>
          <label class="block text-6xl " for="email">E-mail<label>
              <input type="text" placeholder="" class="text-5xl w-full px-4 py-2 mt-2 bg-neutral-600">
        </div>

        <div class="mt-4">
          <label class="block text-6xl " for="email">Hasło<label>
              <input type="password" placeholder="" class="text-5xl w-full px-4 py-2 mt-2 bg-neutral-600">
        </div>
        
        <div class="flex items-baseline justify-between text-4xl">
          <button class="px-6 py-6 mt-10 text-white rounded-lg bg-neutral-600 hover:bg-neutral-700">Login</button>
        </div>

      </div>
    </form>
  </div>

  <script src="com_script.js"></script>
</body>

</html>