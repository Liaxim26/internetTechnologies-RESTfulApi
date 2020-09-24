<?php 

function Error($p1, $p2) {
	http_response_code($p1);
	exit('{"status code;"'.$p1.', "ctatus text:"'.$p2.'"}');
}



 ?>