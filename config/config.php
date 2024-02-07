<?php
define('DATE_FORMAT','DD-MM-YYYY');
define('url','http://localhost/SyncSimpl/assets');
define('App','http://localhost/SyncSimpl');
define('Project_name','SyncSimpl');

$base_url = (basename($_SERVER['PHP_SELF'])) == 'welcome.php' ? '../' : ''; 
define('base_url',$base_url);

?>
