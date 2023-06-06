<?php include "./pages/header.php" ?>
<?php include "./data.php" ?>

<div class="container mx-auto my-4 flex flex-col items-center">
    <!-- vending machine -->
    <div class="w-1/2 py-4 border border-gray-400 rounded">
        <form>
            <h1 class="text-center text-xl font-semibold">Vendo Machine: </h1>
            <div class="px-4 py-4">
                <h1 class="font-semibold">Products: </h1>
                <!-- menu -->
                <div class="flex flex-col">
                    <?php if (isset($drinkMenu))
                        foreach ($drinkMenu as $value) {
                            echo
                            '<label>
                                <input type="checkbox" name="chckbox[]" value="' . $value['name'] . '"> 
                                ' . $value["name"] . ' - P' . $value["price"] . '
                            </label>';
                        }
                    ?>
                </div>

                <!-- option -->
                <div class="my-6">
                    <fieldset class="border border-gray-400 rounded py-4 px-4">
                        <legend class="font-semibold">Option: </legend>
                        <div class="space-x-4 flex justify-start items-center">
                            <!-- sizes -->
                            <label class="flex item-center space-x-2">
                                <h1>Sizes:</h1>
                                <select name="size" class="border border-gray-400 rounded px-2">
                                    <?php
                                    if (isset($drinkOption)) {
                                        foreach ($drinkOption as $value) {
                                            if ($value["name"] == "Regular")
                                                echo '<option value="' . $value["name"] . '">' . $value["name"] . '</option>';
                                            else
                                                echo '<option value="' . $value["name"] . '">' . $value["name"] . ' - P' . $value["price"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </label>

                            <!-- quantity -->
                            <label class="flex item-center space-x-2">
                                <h1>Quantity:</h1>
                                <input type="number" name="number" class="border border-gray-400 rounded pl-2" value="1" min="0">
                            </label>
                        </div>
                    </fieldset>
                </div>

                <!-- checkout -->
                <div class="flex w-full justify-end">
                    <button type="submit" name="chckOut" class="font-semibold bg-green-400 hover:bg-green-600 text-white py-1 px-4 rounded">
                        Checkout
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- receipt -->
    <?php if(isset($_GET["chckOut"]) && isset($_GET["chckbox"])) :?>
        <div class="bg-gray-200 w-1/2 p-8 my-4">
            <div class="mx-auto p-4 bg-white rounded-md shadow-md my-4">
                <h1 class="text-2xl font-bold mb-4">Receipt</h1>
                <div class="mb-6">
                    <p class="text-gray-600"><span class="font-semibold">Order ID:</span> 123456</p>
                    <p class="text-gray-600"><span class="font-semibold">Date:</span> June 6, 2023</p>
                </div>
                <div class="mb-6">
                    <h2 class="text-lg font-semibold">Items:</h2>
                    <ul class="mt-2">
                        <?php
                            $drinks = $_GET["chckbox"];
                            $size = $_GET["size"];
                            $quantity = $_GET["number"];
                            $prices = [];
                            $sizePrice = 0;
                            foreach ($drinkMenu as $row) {
                                // check if the current drink is on my drinks checkbox
                                if(in_array($row["name"], $drinks)){
                                    array_push($prices, $row["price"]);
                                    echo '
                                        <li class="flex justify-between">
                                            <span>'.$quantity.' piece of '.$size.' '.$row["name"].'</span>
                                            <span>
                                                P'.$row["price"].'
                                            </span>
                                        </li>
                                    ';
                                }
                            }

                        ?>
                    </ul>
                </div>
                <div class="mb-4">
                    <!-- size -->
                    <p class="text-gray-600"><span class="font-semibold">Size:</span>
                        <?php
                            foreach($drinkOption as $row){
                                if(in_array($size, $row)){
                                    $sizePrice = $row["price"];
                                    echo $row["name"] ." +P". $row["price"];  
                                }
                            }
                        ?>
                    </p>

                    <p class="text-gray-600"><span class="font-semibold">total number of drinks:</span> <?php echo count($drinks) * $quantity; ?> </p>
                </div>
                <div class="mb-6">
                    <p class="text-xl font-semibold">Total: 
                        <?php 
                            $sum=0;
                            foreach ($prices as $value) {
                                $pricePerDrink = ($value + $sizePrice) * $quantity;
                                $sum+=$pricePerDrink;
                            }
                            echo "P$sum";
                        ?>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600">Thank you for your purchase!</p>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>




<?php include "./pages/footer.php" ?>