<?php 
	include_once('config.php'); 
	$site_root = get_site_root();
?><!doctype html>
<head>
<title></title>

</head>
<body>

<input type="text" id="q" onkeydown="if (event.keyCode == 13) { googlesearch(); }">
<input type="button" value="go" onclick="googlesearch();">

<script type="text/javascript">
    function googlesearch() {
    	var searchterm = document.getElementById('q').value;
    	var searchurl = 'https://www.google.com/search?q=site:<?php echo $site_root; ?>+' + searchterm;
    	window.location = searchurl;
    	// alert(searchurl);
    }
</script>


</body>
</html>