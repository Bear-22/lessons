<?php session_start(); // Начинаем сессию?>
    <link rel="stylesheet" href="../assets/css/main.min.css">
<?php
	$title = 'Создание капчи';
	include '../header.php';
	include '../functions.php';

?>
    <header><?= $title; ?></header>
    <div class="container">
        <ol>
            <li>session_start(); // Начинаем сессию . Сессия начинается до вывода чего-либо на экран </li>
            <li>Ссылка на библиотеку GD <a href="https://www.php.net/manual/ru/ref.image.php">php.net</a></li>
            <li>Создаем картинку капчи</li>
            <li>Создаем форму</li>
            <li>Подключаем картинку через img</li>
            <li>Обрабатываем логику формы</li>
        </ol>
		<?
			echo 'Это переменная $_SESSION <br>';
			debug($_SESSION);
			echo 'Это переменная $_POST <br>';
			debug($_POST);
		?>
        <form action="" method="post">
            Капча математическая
            <br>
            <img src="/captcha/captcha_num.php" alt="" style="border: 1px solid #000; max-width: 100px"/>
            <br>
            <br>
            <input type="text" name="captcha_num">
            <br>
            <br>
            Капча цветная
            <br>
            <img src="/captcha/captcha.php" alt="" style="border: 1px solid #000; max-width: 100px"/>
            <br>
            <br>
            <input type="text" name="captcha">
            <br>
            <br>
            <button type="submit">submit</button>

        </form>

		<?


			if (isset($_POST["captcha_num"]) && isset($_POST["captcha"])) {
				if (empty($_POST["captcha_num"]) && empty($_POST["captcha"])) {
					echo "Ответ: Пустые значения";
					die();
				}
				/* Проверяем правильность ввода капчи (не забывайте проверять на "пустое значение", это очень важно!) */
				if (($_POST["captcha_num"] == $_SESSION["rand_code"]) && ($_POST["captcha"] == $_SESSION["captcha"])) {
					echo "Ответ: Капча введена правильно";
				} else {
					echo "Ответ: Капча введена неправильно";
				}
			}
		?>
    </div>
<? include '../footer.php' ?>