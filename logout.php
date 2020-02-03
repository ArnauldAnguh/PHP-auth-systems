<?php include "server/index.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
       <link
      rel="stylesheet"
      href="assets/bootstrap.min.css"
    />
<style>
.container {
      height: 100vh;
          display: flex;
    flex-direction: column;
    justify-content: center;
    }
.success {
    width: 100%;
    color: green;
    text-align: center;
    padding: 3px;
    margin: 2px auto;
}
</style>
</head>
<body>
    <div class="container">
    <div class="success">
    <?php echo $_SESSION['success']; ?> <a href="signup.php"> click here</a> to create another
</div></div>
</body>
</html>