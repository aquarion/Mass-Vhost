<?PHP
	header("HTTP/1.1 404 File Not Found");

$purl = parse_url($_SERVER['REQUEST_URI']);

if ($purl['path'] == '/favicon.ico'){
	header("Content-Type: image/x-icon");
	readfile("page.ico");
	die();
}

$host = $_SERVER['HTTP_HOST'];

$error = "File not Found";

if (!file_exists("/var/www/hosts/".$host)){

	$error = "Host not configured";

	if(file_exists("/var/www/hosts/www.".$host)){
		header("location: http://www.".$host.$_SERVER['REQUEST_URI']);
		die("No host, but there is a www version of it");
	}

	if(preg_match("#^www\.#", $host) && file_exists("/var/www/hosts/".substr($host, 4))){
		header("location: http://".substr($host,4).$_SERVER['REQUEST_URI']);
		die("No host, but there is a non-www version of it");
	}

	$bom = explode(".", $host);

	if (substr($host,-5) == "co.uk"){
		$check = implode(".",array_slice($bom, 0,-2));
	} else {
		$check = implode(".",array_slice($bom, 0,-1));
	}
	$glob = glob("/var/www/hosts/".$check.".*");

	if(count($glob) > 1){
		$try = $glob;
	} elseif(count($glob)){
		header("location: http://".basename($glob[0]));
		die("Found you");
	}


	$check = implode(".",array_slice($bom, 0, 1));
	$glob = glob("/var/www/hosts/www.".$check.".*");
	if(count($glob) > 1){
		$try = $glob;
	} elseif(count($glob)){
		header("location: http://".basename($glob[0]));
		die("Found you");
	}

	$check = implode(".",array_slice($bom, 0, 1));
	$glob = glob("/var/www/hosts/*.".$check.".*");
	if(count($glob) > 1){
		$try = $glob;
	} elseif(count($glob)){
		header("location: http://".basename($glob[0]));
		die("Found you");
	}

}


?>
<html>
<head>
	<title>Not Found</title>

<style type="text/css">

body {
	margin: 0;
	font-family: sans-serif;
}
	.header {
		background-color: #000;
		color: #FFF;
		border-bottom: 2px solid #0e3874;
		height: 100px;
		padding: 1em;
		font-family: 'SteelfishRegular';
	}

.content {
	padding: 1em;
}

.header h1 a {
	color: white;
	text-decoration: none;
}

.header h1 {
	font-weight: normal;
	font-size: 42pt;
	padding: 0;
	margin: 0;
}

.header span {
	letter-spacing: 0.1em;
}

</style>

<style type="text/css">
	@import url("http://istic.net/assets/steelfish/stylesheet.css");
</style>
</head>
<body>
<div class="header">
	<h1><a href="http://www.istic.net">
	Istic.Networks
	</a></h1>
	<span>Hosting</span>
</div>
<div class="content">
<h1><?=$error?></h1>

<p>Sorry, I haven't been able to complete that request for you.</p>

<p><code><?PHP echo $error ?></code></p>
</div>

</body>
</html>
