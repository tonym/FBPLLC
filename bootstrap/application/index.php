<?php
include(dirname(__FILE__) . '/samplomatic.php');

$Samplomatic = new Samplomatic();

print $Samplomatic->create_ajax_response();

?>
