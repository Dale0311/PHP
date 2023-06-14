<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_COOKIE["name"])){
            echo $_COOKIE["name"];
        }else echo "<h1>no cookies found, or the cookie expired already</h1>";
    ?>    
</body>
</html>