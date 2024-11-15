<?php

$type = $_GET['type'];
$month = $_GET['uname'];
$month = preg_replace('/[0-9]+/', null, $month);
if ($type == "ac"  && $month == "nonac") {
	if ($month) {
		echo "Please select price of The same type Ac, or Change the Room type if you want this price..";
	} else {
		echo "";
	}
}

if ($type == "nonac" && $month == "ac") {
	if ($month) {
		echo "Please select price of The same type NonAc, or Change the Room type if you want this price..";
	} else {
		echo "";
	}
}
