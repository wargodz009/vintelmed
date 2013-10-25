<?php
function to_select($obj,$name,$val){
	foreach($obj as $k) {
		$arr[$k->$val] = $k->$name;
	}
	return $arr;
}