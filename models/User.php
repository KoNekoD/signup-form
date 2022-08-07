<?php

/**
 * Модель "Пользователь"
 * Отвечает в основном за работу с разделом пользователя
 * Может применятся и в других разделах сайта
 */
class User
{

//// Манипуляторы "первого сорта" (Inline methods)

	// bool Авторизован ли пользователь
	public static function isLogged() { return isset($_SESSION['user']); }

	// void Авторизовывает пользователя
	public static function auth($userId) { $_SESSION['user'] = $userId; }

	// void Деавторизовывает пользователя
	public static function deauth() { unset($_SESSION['user']); }

	// {Object} user Возвращает ячейку в таблице "Пользователя" по Id
	public static function getUser($userId)
    {
        //return DB::load('user', $userId);
        $db = DB::getConnection();
        $sql = 'SELECT * FROM `user` WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_OBJ);
        }
        else
        {
            echo 'ERROR! Не удалось получить данного пользователя';
        }
    }

	// Переадресовывает на главную страницу
	public static function LinkToIndex() { header('Location: /'); }

	// Переадресовывает на страницу авторизации
	public static function LinkToAuth() { header('Location: /auth/'); }

	// Переадресовывает в профиль
	public static function LinkToProfile() { header('Location: /profile/'); }

//// Методы "второго сорта"


	// Вернёт id авторизованного пользователя, если таковой есть
	// Если не вернуло то переадресует на страницу авторизации
	public static function checkLogged()
	{
		if (isset($_SESSION['user'])) return $_SESSION['user'];
		User::LinkToAuth();
	}

	// Вернёт результат на вопрос "Пользователь не авторизован?"
	// Если не вернёт то переадресует на главную страницу
	public static function checkNotLogged()
	{
		if (!isset($_SESSION['user'])) return true;
		User::LinkToIndex();
	}

//// Методы "Третьего сорта"

	/**
	 * Метод регистрации нового пользователя
	 * 
	 * @param $_POST Суперглобальный массив с данными введёнными пользователем
	 * @return Переадресация на страницу с профилем нового пользователя
	 */
	public static function register()
	{
        // Соединение с БД
        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO user (username, email, password, role) '
            . 'VALUES (:username, :email, :password, "user")';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
        $result->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $result->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        if ($result->execute())
        {
            $userId = $db->lastInsertId();

            User::auth($userId);
            User::LinkToProfile();
        }
        else
        {
            echo 'ERROR! Ошибка создания пользователя';
        }

    }

	/**
	 * Метод удаление аккаунта пользователя ( Разрегистрация )
	 * 
	 * @param $_POST Суперглобальный массив с данными введёнными пользователем
	 * @param int userId <p> id пользователя, которого ждёт разрегистрация </p>  
	 * @return Переадресация на главную страницу
	 * */
	public static function UnRegister($userId)
	{
		// Если маркер удаления страницы верный, то
		if ($_POST['delete-account-marker'] == 'KONO DIO DA')
		{
			// Получаем обьект пользователя
			$user = User::getUser($userId);

			// Деавторизуем пользователя
			User::deauth();

			// Если по пути из записи в бд есть файл, то удаляем его
			if (file_exists(ROOT.$user->avatar)) unlink(ROOT.$user->avatar);

			// Удаляем запись в БД
            $db = DB::getConnection();
			$sql = 'DELETE FROM `user` WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);
            $result->execute();

			// Перенаправляем его на главную страницу
			User::LinkToIndex();
		}
	}
	
	/**
	 * Метод верификации данных введёнными пользователями.
	 * Для регистрации или модификакии существующего профиля.
	 * 
	 * @param $_POST Суперглобальный массив с данными введёнными пользователем
	 * @param {optional} $userId Параметр, отличающий 
	 * регистрацию нового пользователя, или модификацию существующего
	 * 
	 * @return [Array|Bool] errors Обьект, характеризующий наличие невалидных данных
	 * */
	public static function verifyUserData($userId = 0)
	{
		$errors = [];

		// Базовые проверки
		if (strlen($_POST['username']) < 2) $errors[] = 'Слишком короткое имя пользователя!';

		if (strlen($_POST['password']) < 2) $errors[] = 'Слишком короткий пароль!';

		if ($_POST['password'] != $_POST['pass_c']) $errors[] = 'Подтверждение пароля введено неправильно!';

		// Если базовые проверки пройдены:
		if (empty($errors))
		{
			// Получаем количество записей в БД с введённым именем пользователя
			$count = DB::count(
				'user', 'username = :username AND id != :user_id', 
				[':username' => $_POST['username'], ':user_id' => $userId]
			);
			
			// Если больше 0(равен 1), значит этот юзернейм занят
			if ($count) $errors[] = "Уже существует учётная запись с этом Юзернеймом";
		}

		return $errors;
	}

	/**
	 * Вход в учётную запись пользователя
	 * 
	 * @param $_POST Суперглобальный массив с данными введёнными пользователем
	 * 
	 * @return [Array|Bool] errors Обьект, характеризующий наличие невалидных данных
	 */
	public static function checkLogin()
	{
		$errors = [];

		// Базовые проверки:
		if (empty($_POST['username'])) $errors[] = "Введите имя пользователя!";	
		if (empty($_POST['password'])) $errors[] = "Введите пароль!";	

		// Если базовые проверки пройдены:
		if (empty($errors))
		{
			// Получаем запись в БД с введёнными логином и паролем пользователя
            // Соединение с БД
            $db = DB::getConnection();

            // Текст запроса к БД
            $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';

            // Получение результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':username', $_POST['username'], PDO::PARAM_INT);
            $result->bindParam(':password', $_POST['password'], PDO::PARAM_INT);
            $result->execute();

            // Обращаемся к записи
            $user = $result->fetch(PDO::FETCH_OBJ);

			// Если такая запись есть
			if ($user)
			{
				// Авторизуем пользователя
				User::auth($user->id);

				// Переадресовываем его в его профиль
				User::LinkToProfile();
			}

			else
			{
				// Если пользователя в БД с такими данными нет
				$errors[] = 'Неправильный логин или пароль!';
			}
		}

		return $errors;
	}
}