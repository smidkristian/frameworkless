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
    <div>
        <form id="contact-form">

            <h2>Contact us</h2>

            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <!-- <label>Name:</label>  -->
            <input name="name" type="text" class="input" placeholder="Name" />
            <!-- <label>Email:</label>  -->
            <input name="email" type="email" class="input" placeholder="Email" />
            <button style="cursor: pointer;" type="submit" id="submit-btn" class="button">Send</button>
        </form>
    </div>
    <script src="./bundle.js"></script>
</body>
</html>