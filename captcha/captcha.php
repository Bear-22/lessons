<?
	// Формирование проверочного кода
	// (с) Pavliy Vitaliy, 2010


	// Инициализация сессии
	session_start();

	// Инициализация генератора случайных чисел
	mt_srand(time() + getmypid());

	// Сформировать код
	$captcha = '';
	for ($i = 0; $i < 5; $i++) {
		if (mt_rand(0, 30) < 10) {
			$captcha .= chr(mt_rand(48, 57));
		} else                  $captcha .= chr(mt_rand(65, 90));
	}
	$captcha = str_replace(['0', '1'], ['O', 'I'], $captcha);

	// Записать код в сессию для последующей проверки
	$_SESSION['captcha'] = $captcha;

	// Создать изображение
	$sizecodex = 110;
	$sizecodey = 30;
	$im        = imageCreateTrueColor($sizecodex, $sizecodey);

	// Рисуем изображение
	// Фон
	imageFilledRectangle($im, 0, 0, $sizecodex - 1, $sizecodey - 1, imageColorAllocate($im, 230, 230, 230));
	// // Круги
	for ($i = 0; $i < 10; $i++) {
		imageFilledEllipse($im, mt_rand(($i * $sizecodex / 10), (($i + 1) * $sizecodex / 10)), mt_rand(1, $sizecodey), mt_rand(1, $sizecodey), mt_rand(1, $sizecodey), imageColorAllocateAlpha($im, mt_rand(50, 150), mt_rand(50, 150), mt_rand(50, 150), 80));
	}
	// Случайные линии
	for ($i = 0; $i < 10; $i++)
		imageLine($im, mt_rand(1, $sizecodex), mt_rand(1, $sizecodey), mt_rand(1, $sizecodex), mt_rand(1, $sizecodey), imageColorAllocateAlpha($im, mt_rand(50, 150), mt_rand(50, 150), mt_rand(50, 150), 80));
	// Случайные точки
	for ($i = 0; $i < 100; $i++)
		imageSetPixel($im, mt_rand(1, $sizecodex), mt_rand(1, $sizecodey), imageColorAllocateAlpha($im, mt_rand(50, 150), mt_rand(50, 150), mt_rand(50, 150), 80));
	// Текст
	for ($i = 0; $i < 5; $i++) {
		imageTtfText($im, 20, mt_rand(330, 360), mt_rand(1, $sizecodex / 20) + ($i * $sizecodex) / 5, mt_rand(20, $sizecodey - 3), imageColorAllocateAlpha($im, mt_rand(50, 150), mt_rand(50, 150), mt_rand(50, 150), 10), $_SERVER['DOCUMENT_ROOT']."/assets/fonts/OpenSansBold.ttf", $captcha[$i]);
	}
	// Окантовка
	imageRectangle($im, 0, 0, $sizecodex - 1, $sizecodey - 1, imageColorAllocate($im, 170, 170, 170));
	// Выводим изображение в браузер
	Header('Content-type: image/png');
	imagePng($im);
	//удаляем изображение из памяти на сервере
	imageDestroy($im);
?>