<?
	include 'functions.php';
	include 'header.php';
?>
<?
	//добавить в конец масива
	$arr    = ["апельсин", "банан"];
	$arr[2] = 'яблоко';
	$arr[3] = 'дыня';
	array_push($arr, 'виноград', 'малина');
	$arr[] = 'дыня1';
	debug($arr);
//соединяем массив
$arr1 = ['first','second'];
$arr2 = [3,52,65,75];
for ($a=0; $a<count($arr2);$a++){
	array_push($arr1, $arr2[$a]);


}
$arr3=array_merge($arr1, $arr2);

//ищем последний элемент массива
	$third=$arr3[count($arr3)-1];
	debug($third);


















?>


<? include 'footer.php' ?>
