<?php 
    // validation
    if(isset($_POST['login'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $password = htmlspecialchars(stripslashes(trim($_POST['password'])));
        
        echo $name . "<br>";
        echo $email . "<br>";
        echo $password . "<br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Document</title>
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center">Login</h2>
    <form method="post">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
        <input type="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" name="name" placeholder="Enter your name" required>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" name="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
        <input type="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none">Login</button>
    </form>
  </div>
</body>

</html>