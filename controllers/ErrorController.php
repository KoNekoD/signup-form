<?php

/**
 * Контроллер вывода разных ошибок
 */
class ErrorController
{
	public static function actionE404()
	{
		
		// Подключаем вид
		require_once ROOT.'/views/error/404.php';

		return true;
	}
}