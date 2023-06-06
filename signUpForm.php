<?php include "./utility.php" ?>
<?php
    $months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
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

    <div class="w-screen h-screen flex flex-col items-center justify-center">
        <!-- form -->
        <div class="w-1/4 border border-gray-400 space-y-4 p-8 rounded align-middle">
            <h1 class="text-3xl font-semibold text-center">Sign up now:</h1>
            <form method="get" class="space-y-4">
                <div class="flex flex-col space-y-2">
                    <label class="text-lg font-semibold">Name: <span class="text-red-500 text-base">( * Required )</span>
                        <input class="px-2 py-1 border border-gray-400 rounded w-full" name="name" type="text" autofocus required>
                    </label>
                    <label class="text-lg font-semibold">Email: <span class="text-red-500 text-base">( * Required )</span>
                        <input class="px-2 py-1 border border-gray-400 rounded w-full" name="email" type="email">
                    </label>
                </div>

                <div>
                    <label class="text-lg font-semibold">Male
                        <input class="px-2 py-1 border border-gray-400 rounded" name="gender" value="male" type="radio" checked>
                    </label>
                    <label class="text-lg font-semibold">Female
                        <input class="px-2 py-1 border border-gray-400 rounded" name="gender" value="female" type="radio">
                    </label>
                </div>
                <div>
                    <label class="">Data of birth: 
                    <select name="date[]">
                        <?php
                            if(isset($months)) 
                                foreach($months as $month){
                                    if($month == date('F'))
                                        echo '<option selected value="'. $month .'">'. $month .'</option>';
                                    else
                                        echo '<option value="'. $month .'">'. $month .'</option>';
                                }
                        ?>
                    </select>
                    <select name="date[]">
                        <?php
                           for($i=1; $i<32; $i++)
                                if($i == date("d"))
                                    echo '<option selected value="'. $i .'">'. $i .'</option>';
                                else
                                    echo '<option value="'. $i .'">'. $i .'</option>';
                                    ?>
                    </select>
                    <select name="date[]">
                        <?php
                            $currYear = date("Y");
                            for($i=1900; $i<=$currYear; $i++)
                                if($i == 2010)
                                    echo '<option selected value="'. $i .'">'. $i .'</option>';
                                else
                                    echo '<option value="'. $i .'">'. $i .'</option>';
                           
                        ?>
                    </select>
                    </label>
                </div>

                <div class="w-full flex justify-end">
                    <button type="submit" class="py-2 px-8 bg-green-400 font-semibold text-white rounded hover:bg-green-500" name="btnSign">Sign up</button>
                </div>
            </form>
        </div>

        <?php if(isset($_GET["btnSign"])):
            $name = $_GET["name"];
            $email = $_GET["email"];
            $gender = $_GET["gender"];
            $dateOfBirth = $_GET["date"]; 
        ?>
            <div class="my-4" >
                <h2 class="text-xl font-semibold">Pls confirm your details: </h2>
                <div>
                    <h1 class="text-lg font-semibold">Name: <?php echo setValue($name) ?> </h1> 
                    <h1 class="text-lg font-semibold">Email: <?php echo setValue($email) ?> </h1> 
                    <h1 class="text-lg font-semibold">Gender: <?php echo setValue($gender) ?> </h1> 
                    <h1 class="text-lg font-semibold">Date of birth: <?php echo join(" ",$dateOfBirth)?> </h1> 
                </div>
            </div>
        <?php endif ?>
    </div>
</body>
</html>