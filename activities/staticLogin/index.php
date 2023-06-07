<?php include "../../data.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../output.css">
</head>
<body>
    <div class="w-screen h-screen flex flex-col justify-center items-center" id="index">
        <?php if(isset($_POST['login'])) : 
            // fetch data from form
            $userType = $_POST['userType']; 
            $userName = $_POST['username']; 
            $password = $_POST['password'];
            $isSuccesful = false;
            // validation
            foreach ($users as $uType => $data) {
                if($userType == $uType){
                    foreach($data as $usersData){
                       if($userName === $usersData["username"] && $password === $usersData["password"]){
                            $isSuccesful = true;
                       } 
                    }
                }
            }
            $color = $isSuccesful? "text-green-400": "text-red-400";
            $bgColor = $isSuccesful? "bg-green-400": "bg-red-400";
        ?>
            <div class="<?php echo $bgColor?> text-white py-4 my-4 px-4 rounded w-1/2 lg:w-1/4 flex items-center justify-between" id="messageTag">
                <?php echo $isSuccesful? '<h1>Good Afternoon, '.$userName.'!</h1>':"<h1>Invalid username or password</h1>" ?>
                <div class="py-2 px-4 rounded-3xl bg-slate-200 <?php echo $color ?> hover:bg-slate-300 cursor-pointer font-bold" id="message">
                    <h1>X</h1>
                </div>
            </div>
        <?php endif ?>
        <div class="w-1/2 lg:w-1/4 bg-[#edeced] mx-auto px-4 py-10 rounded">
            <div class="w-1/4 mx-auto">
                <img src="../../img/user.png" alt="" class=" mx-auto">
            </div>
            <div class="px-4 space-y-8 py-4">
                <form class="space-y-4 py-4" method="post">
                    <select name="userType" class="py-2 px-4 border border-gray-200 w-full" value="Content Manager">
                        <?php
                            foreach ($users as $key => $value) {
                                if($userType == $key){
                                    echo '<option selected value="'.$key.'">'.$key.'</option>';
                                }
                                else
                                    echo '<option value="'.$key.'">'.$key.'</option>';
                            }
                        ?>
                    </select>
                    <input type="text" placeholder="Username" name="username" class="py-2 px-4 border border-gray-200 w-full" required value="<?php if(isset($userName)) echo $userName;?>">
                    <input type="password" placeholder="Password" name="password" class="py-2 px-4 border border-gray-200 w-full" required value="<?php if(isset($password)) echo $password;?>">
                    <button class="py-2 px-4 bg-blue-400 text-white rounded w-full" type="submit" name="login">Log in</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/dom.js"></script>
</body>
</html>
