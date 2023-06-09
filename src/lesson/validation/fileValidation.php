<?php 
    if(isset($_POST['submit'])){
        if(isset($_FILES['picture'])){
            // error array
            $arrError = [];
            
            // original name of the file
            $fileName = $_FILES['picture']['name'];
            // file temp name
            $fileTemp = $_FILES['picture']['tmp_name'];
            // file size
            $fileSize = $_FILES['picture']['size'];
            // file type -> image/jpg
            $fileType = $_FILES['picture']['type'];
            
            // file extension -> .jpg            
            //---- using end - returns the last value in the array.
            $fileExtension = explode(".", $fileName);
            $fileExtension = strtolower(end($fileExtension));
            
            $arrAllowedFiles = ["jpg", "jpeg", "png"];
            $uploadDir = "../pictures/";

            // validation
            // validate the type
            if(!in_array($fileExtension, $arrAllowedFiles)){
                $arrError[] = "file type error! please only upload jpg, jpeg or png.";
            }
            // validate the size
            if($fileSize > 5000000){
                $arrError[] = "file size is too large";
            }

            // uploading file
            if(count($arrError) < 1){
                move_uploaded_file($fileTemp, $uploadDir . $fileName);
                echo "file upload is successful";
            }else{
                foreach ($arrError as $value) {
                    echo $value . '<br>';
                }
            }
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label>Upload a picture: <input type="file" name="picture"></label>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>