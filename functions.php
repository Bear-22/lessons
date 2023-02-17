<?php
	function debug($item) {
		echo '<pre style="border: 1px solid gray;
		  background: aliceblue;
		  padding: 20px;
		  display: block;
		  font-size: 16px!important;
		  line-height: 110% !important;">';
		var_dump($item);
		echo '</pre>';
	}
