<? $title = 'Часто употребляемые функции';
	include 'functions.php';
	include 'header.php';
?>
    <header><?= $title; ?></header>
    <div class="container">
        <ol>
            <li>Вывод на экран чего-либо: <b>echo 'text';</b></li>
            <li>Функция дебага выводит на экран значение того что вставлено в функцию: <b>var_dump(что-то);</b> <br>
                своя функия дебага (лежит тут \functions.php): <b>debug($user);</b></li>
            <li>Количество элементов чего либо(строки, массива, объекты):<br> <b>count(что-то)</b></li>
            <li><b>isset($x)</b> - проверяет переменную на существование</li>
            <li><b>empty($x)</b> - проверяет переменную на пустоту</li>
        </ol>


    </div>

<? include 'footer.php' ?>