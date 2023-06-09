<?php 
    // validation
    $arrError = [];
    if(isset($_POST['login'])){

        // sanitize
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $password = htmlspecialchars(stripslashes(trim($_POST['password'])));
        $gender = htmlspecialchars(stripslashes(trim($_POST['sex'])));
        $profession = htmlspecialchars(stripslashes(trim($_POST['profession'])));
        
        if (empty($name))
          $arrError["name"] = "Please input a name";
        if (empty($password))
          $arrError["password"] = "Please input a password";
        if (empty($gender))
          $arrError["gender"] = "Please input a gender";
        if (empty($profession))
          $arrError["profession"] = "Please input a profession";
        if (empty($email))
          $arrError["email"] = "Please input a email";
        else
          if(!filter_var($email, FILTER_SANITIZE_EMAIL))
            $arrError["email"] = "Email is not valid";
        if(count($arrError) < 1){
          header("location: welcome.php");
        }
        
    }
?>
<?php include "./dynamicForm.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../output.css">
    <title>Document</title>
</head>
<body class="bg-gray-200 flex flex-col items-center justify-center h-screen">
  <?php if((count($arrError))):?>
    <div class="bg-red-500 text-white py-4 my-4 px-4 rounded w-1/2 lg:w-1/4 flex items-center justify-between" id="messageTag">
        <div>
          <h1>Problems:</h1>
          <ul>
            <?php 
              foreach ($arrError as $value) {
                echo '<li>* '.$value.'</li>';
              }
            ?>
          </ul>
        </div>
        <div class="py-2 px-4 rounded-3xl bg-slate-200 hover:bg-slate-300 cursor-pointer font-bold" id="message">
          <h1>X</h1>
        </div>
    </div>
  <?php endif ?>
  <div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center">Sign up</h2>
    <form method="post">
      <!-- name -->
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
        <input type="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" name="name" value="<?php if(isset($name)) echo $name; ?>" placeholder="Enter your name">
      </div>
      <!-- email -->
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="<?php if(isset($email)) echo $email; ?>" name="email" placeholder="Enter your email">
      </div>
      <!-- password -->
      <div class="mb-6">
        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
        <input type="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" name="password" placeholder="Enter your password">
      </div>
      <!-- gender -->
      <div class="mb-6 flex space-x-2">
        <div>
          <label for="male" class="text-gray-700 font-medium mb-2">Male</label>
          <input type="radio" id="male" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="male" name="sex" checked>
        </div>
        <div class="">
          <label for="female" class="text-gray-700 font-medium mb-2 pl-4">Female</label>
          <input type="radio" id="female" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="female" name="sex">
        </div>
      </div>
      <div class="mb-6 flex items-center space-x-2">
        <select name="profession" id="profession" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 w-full">
          <?php 
            // dynamic form to maintain the data inserted if the inputs are invalid
            foreach ($professionData as $value) {
              if($value == $professionData[0])
                echo '<option value="">'.$value.'</option>';
              else
                // if the prefession is equal to value then maintain that data
                if($profession == $value)
                  echo '<option selected value="'.$value.'">'.$value.'</option>';
                else
                  echo '<option value="'.$value.'">'.$value.'</option>';
            }
          ?> 
        </select>
      </div>
      <button type="submit" name="login" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none">Login</button>
    </form>
  </div>
  <script src="../../js/dom.js"></script>
</body>

</html>