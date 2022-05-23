<?php
echo '<div class="flex h-20 w-full bg-neutral-700 shadow-md shadow-neutral-500 mb-2 opacity-90 items-center pl-4 text-4xl">
    <div class="flex flex-row max-h-full mr-2 block md:hidden">
      <img src="/res/sidebar.svg" class="w-12" onclick="openSidebar()" />
    </div>
    <span class="grow" id="title" onclick=\'g("/")\' >'.((isset($_SESSION['email'])) ? 'Witaj '.$_SESSION['email'] : 'Betabooks').'</span>
';

if(isset($_SESSION['email'])) {
  echo '<div class="flex flex-row max-h-full mr-4 md:mr-10" onclick=\'g("shopcart")\'>
    <img src="/res/send.svg" class="w-12 mr-1" />
    <span class="hidden md:block">Koszyk</span>
  </div>';
}

echo '<div class="flex flex-row max-h-full mr-4 md:mr-10" onclick=\'g("'.((isset($_SESSION['email'])) ? 'logout' : 'login').'")\'>
      <img src="/res/login.svg" class="w-12 mr-1" />
      <span class="hidden md:block">'.((isset($_SESSION['email'])) ? 'Wyloguj' : 'Logowanie').'</span>
    </div>
    <div class="flex flex-row max-h-full mr-4 md:mr-10" onclick=\'g("register")\'>
      <img src="/res/register.svg" class="w-12 mr-1" />
      <span class="hidden md:block">Rejestracja</span>
    </div>
  </div>';
