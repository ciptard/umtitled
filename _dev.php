<!doctype html>
<head>
<title></title>
</head>
<body>
<div id="result"></div>


<?php 

	include_once('config.php');
	include_once('functions/simple_html_dom.php');
	
	$html = file_get_html($dropbox_posts_page);
	
	foreach($html->find('.filename-link') as $element) {
		$md = $element->href;
		$md = preg_replace('#.*/#', '', $md);
		echo ('<a href="'.$dropbox_posts_dir.$md.'">'.$md.'</a><br />');
	}

 ?>


</body>
</html>