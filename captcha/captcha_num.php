<?php
	// Начинаем сессию
	session_start();
	// Генерируем 1-е случайное число
	$number_1
		= rand(1, 100);
	// Генерируем 2-е случайное число
	$number_2
		= rand(1, 100);
	// Записываем их сумму в сессию
	$_SESSION['rand_code']
		= $number_1 + $number_2;

	// Создаём изображение
	// Директория с шрифтами
	$image
		= imagecreatetruecolor(200, 60);

	// Делаем капчу с белым фоном
	// Задаём 1-й заливки
	$white
		= imagecolorallocate($image, 255, 255, 100);
	imagefilledrectangle($image, 0, 0, 399, 99, $white);
	// Задаём 1-й цвет текста
	$color
		= imagecolorallocate($image, 200, 100, 90);
	// Пишем текст
	imagettftext($image, 30, 0, 10, 40, $color, $_SERVER['DOCUMENT_ROOT'] . "/assets/fonts/Verdana.ttf", "$number_1 + $number_2");
	// Отсылаем заголовок о том, что это изображение png
	header("Content-type: image/png");
	// Выводим изображени
	imagepng($image);

?>

