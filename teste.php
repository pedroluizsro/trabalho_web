<?php

function helloWorld($tempo){
	$GLOBALS['tempo'] = 10;
	return $GLOBALS['tempo'];
}


echo "TESTANDOOOO";
echo helloWorld($tempo);

?>
