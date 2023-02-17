<?php
	$blocks  = "";
	$tplHTML = "";

	$colors = ['#ffc107', '#d6b550', 'red', 'green', 'blue'];

	$start = 13;
	for ($i = 0; $i <= 1000; $i++) {
		if ($start == $i-1) {
			if ($i % 2 == 0) {
				$start += 1;
			} else {
				$start += 13;
			}

		}

		$selectColor = $colors[rand(0, 4)];
		if ($start == $i || $i == 0) {
			$tplHTML .= "<div class='block blocksmall' style='border: 1px solid #5f2727; background-color: " . $selectColor . ";'></div>";
		} else {
			$tplHTML .= "<div class='block' style='border: 1px solid #5f2727; background-color: " . $selectColor . ";'></div>";
		}

		//echo $start . '/' . $i . '<br>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .blocks {
        width: 700px;
        margin: 0 auto;

        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .block {
        width: 100px;
        height: 50px;
        margin: 2px;
    }

    /*.block:nth-child(1) {
        margin-left: -50px;
    }*/

    .blocksmall {
        width: 50px;
    }
</style>
<div class="blocks">
	<?php echo $tplHTML; ?>
</div>
</body>
</html>
