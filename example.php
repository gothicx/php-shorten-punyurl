<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SAPO PunyURL shortening service examples</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>

<?php

require_once("punyurl.class.php");

$shorten=PunyURL::short("http://www.marblehole.com");
$original=PunyURL::long("http://瀟.sl.pt");

echo 'Puny URL: '.$shorten['puny']."<br>";
echo 'ASCii URL: '.$shorten['ascii']."<br>";
echo 'Preview URL: '.$shorten['preview']."<br><br>";
echo 'Original URL: '.$original['url'];

?>

</body>
</html>
