<?
	$title = 'Условные операторы if, else ,switch';
	include 'functions.php';
	include 'header.php';
?>
<?
	$arr = [1, 3, 10, 250, 101,999,820, 56, 95, 200, 300, 500, 600];
	for ($i = 0; $i <= count($arr); $i++) {
		if ($arr[$i] <= 99) {
			$s1[] = $arr[$i];
		}
		if ($arr[$i] <= 199 && $arr[$i] >= 99) {
			$g[] = $arr[$i];
		}
		if ($arr[$i] <= 299 && $arr[$i] >= 199) {
			$h[] = $arr[$i];
		}
		if ($arr[$i] <= 399 && $arr[$i] >= 299) {
			$m[] = $arr[$i];
		}
	}
	//$x[2][]='cvsdv'\;
	for ($i = 0; $i <= count($arr); $i++) {
		$b = mb_str_split($arr[$i])[0];
		if (strlen($arr[$i]) < 3) {
			$b = 0;
		}
		switch ($b) {
			case 0:
				$s[0][] = $arr[$i];
				break;
			case 1:
				$s[1][] = $arr[$i];
				break;
			case 2:
				$s[2][] = $arr[$i];
				break;
			case 3:
				$s[3][] = $arr[$i];
				break;
			case 4:
				$s[4][] = $arr[$i];
				break;
			case 5:
				$s[5][] = $arr[$i];
				break;
			case 6:
				$s[6][] = $arr[$i];
				break;
			case 7:
				$s[7][] = $arr[$i];
				break;
			case 8:
				$s[8][] = $arr[$i];
				break;
			case 9:
				$s[9][] = $arr[$i];
				break;


		}


	}
debug($s);
?>

<? include 'footer.php' ?>
