<?php 
  session_start();
  include("../../../utilities/dataScrub.php");
  include("../../../../data.php");
  if(isset($_POST['login'])){
    $arrError = [];
    $isSuccessful = false;
    // data scrubbing
    $username = dataScrub($_POST['username']);
    $password = dataScrub($_POST['password']);

    // validation
    if(empty($username)){
      $arrError[] = "Please input username";
    }
    if(empty($password)){
      $arrError[] = "Please input password";
    }

    if(empty($arrError)){
      foreach ($users2 as $value) {
        if(($username == $value['username']) && ($password == $value['password'])){
          $isSuccessful = true;
        }
      }
    }
    else{
      foreach ($arrError as $value) {
        echo $value . "<br>";
      }
    }

    if($isSuccessful){
      $_SESSION['username'] = $username;
      header("location: home.php");
    }else{
      echo "invalid username/password";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <title>Login Form</title>
</head>

<body class="bg-gray-100">
  <div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm">
      <form class="bg-white shadow-md rounded px-8 py-6" method="post">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Username
          </label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Enter your username">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
          </label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="Enter your password">
        </div>
        <div class="flex items-center justify-end">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
            Sign In
          </button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
