<? $title = 'Уроки по PHP';
	include 'header.php';
	include 'functions.php';
	global $test;
	$test = 'test';

?>
<?
	$ar    = [
		[
			'link' => 'lesson_1.php',
			'name' => 'Переменные , типы данных, операторы<br>lesson_1.php',
		], [
			'link' => 'lesson_2.php',
			'name' => 'Массивы<br>lesson_2.php',
		], [
			'link' => 'lesson_3.php',
			'name' => 'Циклы<br>lesson_3.php',
		], [
			'link' => 'lesson_fn.php',
			'name' => 'Часто употребляемые функции<br>lesson_fn.php',
		], [
			'link' => 'lesson_4.php',
			'name' => 'Суперглобальные переменные<br>lesson_4.php',
		],
		[
			'link' => 'lesson_5.php',
			'name' => 'Работа со строками<br>lesson_5.php',
		],
		[
			'link' => 'lesson_6.php',
			'name' => 'Условные операторы if, else, switch<br>lesson_6.php',
		],
	];
	$train = [
		[
			'link' => 'train.php',
			'name' => 'Решение задач МАССИВЫ<br>train.php',
		],	[
			'link' => 'ifelse.php',
			'name' => 'Решение задач ifelse<br>ifelse.php',
		],
	];
?>

<header>Уроки по PHP</header>
<div class="container">
    <div class="lesson" style="margin-bottom: 50px;">

		<? foreach ($ar as $key => $item): ?>
            <a href='<?= $item['link'] ?>'><?= $item['name'] ?></a>
		<? endforeach; ?>

    </div>

    <hr>
    <h2 style="text-align: center">Тренировочные файлы</h2>
    <hr>

    <div class="lesson" style="margin-top: 50px;">
		<? foreach ($train as $key => $item): ?>
            <a href='<?= $item['link'] ?>'><?= $item['name'] ?></a>
		<? endforeach; ?>
    </div>
</div>


<?

?>



<? include 'footer.php' ?>
