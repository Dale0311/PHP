<?php 
    session_start();

    // removing 1 var
    unset($name); //this use to destroy a variable

    // destroy all session
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    
</body>
</html>