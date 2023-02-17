<? $title = 'Массивы';
	include 'functions.php';
	include 'header.php';
?>
    <header><?= $title; ?></header>
    <div class="container">
        <h3>Функции массивов:</h3>
            <ol>
                <li>Добавить  элемент массива в конец <b>array_push($arr, 'виноград' , 'малина');</b>
                или <b>$arr[]='дыня1';</b>
                </li>
                <li>Соединить массивы <b> $arr3=array_merge($arr1, $arr2);
</b> или <b>  for ($a=0; $a< count($arr2);$a++){
	array_push($arr1, $arr2[$a]);</b></li>

            </ol>
        <h3>Свойства массивов:</h3>
        <ol>
            <li> Все масивы имеют пару "ключ"=> "значение", бывают нумерованые и ассоциативные
            </li>
            <li>Вызыватся с помощью квадратных скобок [1,"строка"] или слова Array(1,"строка")</li>
            <li>В ассоциативном массиве ключ всегда в кавычках</li>
            <li>Получить элемент массива можно по его ключу: $arr[1], $user['name'], $user['address']["street"]</li>
            <li>Добавление элемента массива: обратится к массиву, указать ключ + значение
            </li>
            <li>Все функции по работе с массивом:
                <a href="https://www.php.net/manual/ru/function.array-push.php">php.net</a></li>
        </ol>
        <h3>Нумерованый массив: имя ключа является числом , счет начинается с 0</h3>
		<?
			$arr = [1, 'Ivanov', 12.25, [1, 2, 2, 5]];

			debug($arr);

			echo 'Получение определеного значения, например второго члена массива: $arr[1]<br>';
			echo 'Пример: $arr[1]=' . $arr[1];

			echo '<br> <br>Добавление элемента массива: обратится к массиву, указать ключ + значение';
			$arr[4] = 222;
			echo 'Пример: $arr[4] =' . $arr[4];

			echo '<br><br><br>';
		?>
        <h3>Ассоциативный массив: имя ключа задано текстом в кавычках</h3>
		<?php
			$user = [
				'name'    => 'Alex',
				'age'     => 26,
				'product' => [12, 35, 50, 51, 26],
			];
			$user = [
				'name'    => 'Alex',
				'age'     => 26,
				'product' => [12, 35, 50, 51, 26],
				'address' => ['sity' => 'Donetsk', 'street' => 'Veresaeva'],
			];

			debug($user);

			echo 'Получение определеного значения: $user["name"]<br>';
			echo 'My name is: ' . $user['name'] . ", im : " . $user['age'] . ' years<br>';
			echo "Sity: {$user['address']["sity"]}, street: {$user['address']["street"]}<br>";

			echo '<br> <br>Добавление элемента массива: обратится к массиву, указать ключ + значение';
			$user['text'] = 'some text';
			echo '<br>Пример: $user[\'text\'] =\'some text\'';
			$number = [10, 20, 30, 40, 50];

			$x         = $number[0];
			$number[0] = $number[4];
			$number[4] = $x;

		?>

    </div>
<? include 'footer.php' ?>