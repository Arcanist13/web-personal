<?php
	function validPassword($psk){
		if(strlen($psk) < 5){
			return False;
		}
		$detectPatt = '/^(.*)[0-9]+(.*)/';
		if(!preg_match($detectPatt, $psk)){
			return False;
		}
		return True;
	}
?>