<?php
require_once ROOT.'/config/db_params.php';

class Database
{
	public static function init()
	{
		DB::setup('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
	}

	public static function close()
	{
		DB::close();
	}
}