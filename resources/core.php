<?php

	function getUniqid() {
		return hexdec(uniqid( ceil(rand()/1000) ));
	}

?>