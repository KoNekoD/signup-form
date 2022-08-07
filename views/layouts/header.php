<!DOCTYPE html>
<html class="bg-green-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if (isset($pageName)) echo $pageName;?></title>
        <!-- CSS Styles -->
        <link href="/template/css/tailwind.css" rel="stylesheet">
<!--         <link href="/template/css/font-awesome.min.css" rel="stylesheet"> -->
        <link href="/template/css/OpenSans.css" rel="stylesheet">
        <!-- версия для разработки, отображает полезные предупреждения в консоли -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
    <div class="sticky top-1 flex md:items-center justify-between bg-green-700 rounded-sm bg-opacity-80 my-3 mx-6 p-4">
        <a id="header-logo" href="/" class="bg-gray-900 p-1 rounded">
            <!-- <img id="header-logo" class="max-h-9 md:max-h-12" src="/upload/images/header/logo_w.png"> -->
            <span class="text-white">Logo</span>
        </a>
            <div id="header-menu" class="hidden lg:flex">
                <ul class="md:space-x-1.5 uppercase text-gray-100">
<?php if (User::isLogged()): ?>
<?php // Если этот пользователь админ то добавим пункт для админ панели
    $userId = User::checkLogged();
    $user = User::getUser($userId);

?>
                    <a href="/profile/" class="md:float-left hover:text-blue-100 hover:scale-90 transition duration-200">
                        <li class="p-2 my-2 md:px-4 md:py-3 md:m-0 border-2 border-blue-100 rounded-md">Профиль</li>
                    </a>
                    <a href="/logout/" class="md:float-left hover:text-blue-100 hover:scale-90 transition duration-200">
                        <li class="p-2 my-2 md:px-4 md:py-3 md:m-0 border-2 border-blue-100 rounded-md">Выйти</li>
                    </a>
<?php endif; ?>
<?php if (!User::isLogged()): ?>
                    <a href="/auth/" class="md:float-left hover:text-blue-100 hover:scale-90 transition duration-200">
                        <li class="p-2 my-2 md:px-4 md:py-3 md:m-0 border-2 border-blue-100 rounded-md">Авторизоватся</li>
                    </a>
<?php endif; ?> 
                </ul>
            </div>
            <!-- Burger Btn -->
            <div class="flex space-x-2 lg:hidden">
                <a onclick="menuOpen();">
                    <div id="header-menu-open" class="flex lg:hidden">
                        <div class="space-y-2 text-gray-100">
                            <i class="block text-3xl animate-pulse">
                                <svg class="h-8 w-8 " fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            </i>
                        </div>
                    </div>
                </a>
                <!-- Close burger Btn -->
                <a onclick="menuClose();">
                    <div id="header-menu-close" class="hidden lg:hidden">
                        <div class="space-y-2 text-gray-100">
                            <i class="block text-3xl animate-pulse">
                                <svg class="h-8 w-8" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>                      
                            </i>
                        </div>
                    </div>
                </a>
            </div>
    </div>