<?php

$url = isset($url) && $url != false ? $url : url('/');
?>
<!DOCTYPE html>
<html>
<head>
	<title>{{ $subject }}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />
</head>
<body>

<?php

$message = "

<br>
Hi <b>$name</b>, <br><br>

<h4>$subject</h4>

$caption
$contents

<br><br><br><br><br>
<hr>
<a href='$url'>

</a>

<p style='text-align: center'>
<img src='".url('/images/logo.png')."'><br>
Where Deserving Talent Meets Deserving Opportunities
</p>
";

print $message;

?>



</body>
</html>