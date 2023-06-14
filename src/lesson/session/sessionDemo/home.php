<?php 
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <title>Home Page</title>
</head>

<body class="bg-gray-100">
  <nav class="bg-gray-800 p-6">
    <div class="container mx-auto flex items-center justify-between">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="h-8 w-8 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M11 0h3L9 20H6l5-20z" />
        </svg>
        <span class="font-semibold text-xl tracking-tight">My Website</span>
      </div>
      <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white">
          <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M0 4h20v3H0zm0 5h20v3H0zm0 5h20v3H0z" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:block">
        <ul class="flex space-x-4">
          <li><a class="text-gray-300 hover:text-white" href="#">Home</a></li>
          <li><a class="text-gray-300 hover:text-white" href="#">About</a></li>
          <li><a class="text-gray-300 hover:text-white" href="#">Services</a></li>
          <li><a class="text-gray-300 hover:text-white" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-gray-200 py-10">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold text-gray-800">Welcome <?php echo $_SESSION['username']?></h1>
      <p class="mt-2 text-xl text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </header>

  <main class="container mx-auto py-10">
    <div class="grid grid-cols-3 gap-8">
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800">Feature 1</h2>
        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sagittis nunc id nisi dignissim, nec mattis tortor ultrices.</p>
      </div>
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800">Feature 2</h2>
        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sagittis nunc id nisi dignissim, nec mattis tortor ultrices.</p>
      </div>
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800">Feature 3</h2>
        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sagittis nunc id nisi dignissim, nec mattis tortor ultrices.</p>
      </div>
    </div>
  </main>

  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2023 My Website. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>
