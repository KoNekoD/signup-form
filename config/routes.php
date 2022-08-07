<?php

return array(
    // Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
    // Страницы с ошибками
    'Error/404' => 'error/e404',

    // Раздел пользователя
    'auth' => 'user/index',
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
    'profile' => 'user/profile',
    'account/modify' => 'user/modify',
    'account/delete' => 'user/delete',
    
    // Админка
    'admin' => 'admin/index',
);
