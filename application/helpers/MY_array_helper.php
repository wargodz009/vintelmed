<?php
function to_select($obj,$name,$val,$pad = true){
	$arr = array();
	foreach($obj as $k) {
		$arr[$k->$val] = $k->$name;
	}
	if($pad === false) {
		return $arr;
	} else {
		return $arr = array(""=>'--Choose one--') + $arr;
	}
}