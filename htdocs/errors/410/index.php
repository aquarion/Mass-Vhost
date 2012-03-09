<?PHP
	header("HTTP/1.1 410 Gone");

$purl = parse_url($_SERVER['REQUEST_URI']);

$host = $_SERVER['HTTP_HOST'];

$error = "File Gone";


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
		color: #fff;
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

                         <p>This is a dead resource,<br> Bereft of content it has ceased to be.<br> It hasn't
                         Moved, it's <i>gone</i>.<br> Removed from the server.<br> If you hadn't asked for it,
                         the server wouldn't even know it existed,<br> it's expired and gone to meet it's maker<br>
                         'E's kicked the bucket,<br> 'e's shuffled off 'is mortal coil, run down the curtain and 
                         joined the bleedin' choir invisibile.<br> THIS IS AN EX-RESOURCE.</p>
                         <p>*ahem*</p>
                         <p>I got a slug?</p>

</div>

</body>
</html>
