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
    <span class="grow" id="title">Betabooks</span>
    <div class="flex flex-row max-h-full mr-4 md:mr-10">
      <img src="/res/send.svg" class="w-12 mr-1" />
      <span class="hidden md:block">Koszyk</span>
    </div>
    <div class="flex flex-row max-h-full mr-4 md:mr-10">
      <img src="/res/login.svg" class="w-12 mr-1" />
      <span class="hidden md:block">Logowanie</span>
    </div>
    <div class="flex flex-row max-h-full mr-4 md:mr-10">
      <img src="/res/register.svg" class="w-12 mr-1" />
      <span class="hidden md:block">Rejestracja</span>
    </div>
  </div>

  <div class="min-h-full grow flex flex-row w-full opacity-90">
</body>

</html>