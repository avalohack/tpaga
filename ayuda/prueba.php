<?php
function getRealIP()
{

    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }

}


$x = getRealIP();
print_r($x);
?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="https://w.tpaga.co/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTllZmUwOWI4MGViZGE5ZjliZjlhYTg4MjU3MzgyZmUzYTQyZTcyMDZlZTFiNjk4ZjJkYTk3ZjVhZGJhYmI3YThhOTZkNjllMCJ9fQ=="> prueba de deep link</a>
</body>
</html> -->