<?php include "server/index.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap.min.css"
    />
  <style>
.container {
    background: #f3c7ca;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
 }
.error {
    height: 80px;
    line-height: 2em;
    border: #ffd5da 1px solid;
    color: #d6001c;
    text-align: center;
    padding: 5px;
    margin: 0px auto;
    font-size: 30px;
    font-family: Georgia, 'Times New Roman', Times, serif;

}
.jumbotron{
  width: 100%;
  background: lightgreen;
  margin: 0;
  
}
.success {
    width: 100%;
    color: green;
    text-align: center;
    padding: 3px;
    margin: 2px auto;
}
span {
  color: red;
}
hr {
  border-color: green
}
  </style>
</head>
<body>
  <div class='container'>
    <?php if (!isset($_SESSION['userId'])) : ?>
       <div class="well error">
         <b> Intruder:</b> you don't have Access To this page. <a href="signup.php">click to request access.<a/>
        </div>
    <?php else: ?>
      <div class="jumbotron" >
        <p class="success"> <?php echo $_SESSION['success'] ?></p>
        <section>
          <div class="well">
           Welcome <b><?php if(isset($_SESSION['lastname'])) {echo $_SESSION['lastname']; } else { echo "Admin"; }?></b>, the following are Details of you: <hr>
           <b>Email Address:</b> <?php echo $_SESSION['email']; ?> <br>
           <b>Firstname:</b> <?php if(isset($_SESSION['firstname'])) {echo $_SESSION['firstname']; }else { echo "<span style='text-decoration: line-through'>Classified</span>"; };  ?> <br>
           <b>Lastname:</b> <?php if(isset($_SESSION['lastname'])) {echo $_SESSION['lastname']; }else { echo "<span style='text-decoration: line-through'>Classified</span>"; } ?> <br>
           <b>Full Name:</b> <?php echo $_SESSION['username']; ?> <br>
           <b>Are you a Robot? :</b> <span>Unidentified</span> <select>
             <option name='select'>select</option>
            <option value='yes'>Yes</option>
            <option value='no'>No</option>
            </select>
        </div>
        <a href="server/index.php?logoutId=<?php echo $_SESSION['userId']; ?>" class="btn btn-danger">Destroy Account</a>
        </section>
      </div>
    <?php endif ?>
  </div> 
   
</body>
</html>