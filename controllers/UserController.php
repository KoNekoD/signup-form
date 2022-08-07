<?php

/**
 * Контроллер для раздела Пользователь
 */
class UserController
{
	public static function actionIndex()
	{
		User::checkNotLogged();
		
		// Подключаем вид
		require_once ROOT.'/views/user/index.php';
		return true;
	}
	
	public static function actionRegister()
	{
		User::checkNotLogged();

		if (isset($_POST))
		{
			$errors = User::verifyUserData();

			// Если пользователя не переадресует то
			// В переменной errors будет массив с ошибками 
			if (!$errors) User::register();
		}

		// Подключаем вид
		require_once ROOT.'/views/user/register.php';
		return true;
	}
	
	public static function actionLogin()
	{
		User::checkNotLogged();

		if (isset($_POST))
		{
			// Если пользователя не переадресует то
			// В переменной errors будет массив с ошибками 
			$errors = User::checkLogin($_POST);
		}

		// Подключаем вид
		require_once ROOT.'/views/user/login.php';
		return true;
	}

	public static function actionLogout()
	{
		User::checkLogged();
		User::deauth();

		header('Location: /index.php');
		return true;
	}

	public static function actionProfile()
	{
		$userId = User::checkLogged();
		$profile = User::getUser($userId);

		// Подключаем вид
		require_once ROOT.'/views/user/profile.php';
		return true;
	}

	public static function actionModify()
	{
		$userId = User::checkLogged();
		$profile = User::getUser($userId);

		if (!empty($_POST))
		{
			// Если пользователя не переадресует то
			// В переменной errors будет массив с ошибками 
			$errors = User::modify($userId);
		}
		// Подключаем вид
		require_once ROOT.'/views/user/modify.php';

		return true;
	}

	public static function actionDelete()
	{
		// Получаем id авторизованного пользователя
		$userId = User::checkLogged();

		if (!empty($_POST))
		{
			// Начинается процесс разрегистрации
			User::UnRegister($userId);
		}

		// Подключаем вид
		require_once ROOT.'/views/user/delete.php';
		return true;
	}
}