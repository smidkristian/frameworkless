<?php
  session_start();
  $token = bin2hex(random_bytes(32));
  $_SESSION["csrfToken"] = $token;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./dist/index.css">

    <title>Landing</title>
</head>
<body>
    <div class="flex h-screen bg-gray-100 justify-center items-center">
        <form id="contact-form" class="flex flex-col">

            <h1 class="text-2xl font-bold my-4 text-gray-400">Contact us</h1>

            <input type="hidden" id="token" value="<?php echo $token; ?>" />
            <!-- <label>Name:</label>  -->
            <input id="name" type="text" class="px-2 py-2 bg-gray-50 rounded mb-2 focus:outline-none" placeholder="Name" />
            <div id="name-error" class="flex mb-2 hidden">
                <p class="text-red-400 text-sm ml-2">Name field is required.</p>
            </div>
            <!-- <label>Email:</label>  -->
            <input id="email" type="email" class="px-2 py-2 bg-gray-50 rounded mb-2 focus:outline-none" placeholder="Email" />
            <div id="email-error" class="flex mb-2 hidden">
                <p class="text-red-400 text-sm ml-2">Email field is required.</p>
            </div>
            <button style="cursor: pointer;" type="submit" id="submit-btn" 
                class="flex items-center justify-center rounded bg-white py-2 my-2 hover:bg-gray-50 focus:outline-none">
                <div id="spinner" class="flex items-center hidden p-1"><div class="spinner"></div></div>

                <div id="email-success" class="text-green-400 hidden">Sent!</div>
                <div id="email-failed" class="text-red-400 hidden">Not sent. Try again!</div>
                
                <div id="send" class="font-bold text-gray-600">Send</div>
            </button>
            

        </form>
    </div>
    <script src="./dist/bundle.js"></script>
</body>
</html>