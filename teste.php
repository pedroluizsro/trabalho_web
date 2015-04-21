<?php

function helloWorld($tempo){
	$GLOBALS['tempo'] = 10;
	return $GLOBALS['tempo'];
}

echo helloWorld($tempo);

?>
