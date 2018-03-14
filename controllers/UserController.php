<?php

class UserController{
	
	public function actionRegister(){


 // Переменные для формы
		$name = false;
		$email = false;
		$password = false;
		$result = false;

        // Обработка формы
		if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

            // Флаг ошибок
			$errors = false;


			echo $name.$email.$password;
            // Валидация полей
			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
			}
			if (!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}
			if (!User::checkPassword($password)) {
				$errors[] = 'Пароль не должен быть короче 6-ти символов';
			}
			// if (User::checkEmailExists($email)) {
			// 	$errors[] = 'Такой email уже используется';
			// }

			if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
				// $result = User::register($name, $email, $password);
			}
		}
		require_once(ROOT.'/views/user/register.php');
		return true;

	}
}