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

    <link rel="stylesheet" type="text/css" href="/index.css">

    <title>Landing</title>
</head>
<body>
    <div class="flex-col">
        <form id="contact-form" class="flex-col">

            <h2>Contact us</h2>

            <input type="hidden" id="token" name="token" value="<?php echo $token; ?>" />
            <label>Name:</label> 
            <input name="name" id="name" type="text" />
            <label>Email:</label> 
            <input style="cursor: pointer;" name="email" id="email" type="email" />
            <button type="submit" id="submit-btn">Send</button>
        </form>
    </div>
    <script src="./bundle.js"></script>
</body>
</html>