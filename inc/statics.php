<?php
// i'll store here some static content
// and methods for later use



class Statics {
	public static function sanitize($text){
		// ((?<![\\])['"])((?:.(?!(?<![\\])\1))*.?)\1
		$text = addcslashes($text,"'");
		$text = addcslashes($text,'"');
		return $text;
		
	}
	public static function sanitizeHTML($text){
		$text = $this->sanitize($text);
		$text = strip_tags($text);
		return $text;
		
	}
	public static function desanitize($text){
		$text = stripslashes($text);
	//	$text = stripcslashes($text);
		return $text;
		
	}
}
?>