<?php include "server/index.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <title>registration</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/styles.css"
    />
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        Login 
      </div>
      <form method="post" action="" autocomplete="off">
      <?php include "errors.php"; ?>
          <div class="form-group">
          <input
            type="email"
            name="email"
            value="<?php echo $email; ?>"
            placeholder="Email: example@gmail.com"
            class="form-control"
          />
        </div>
        <div class="form-group">
          <input
            type="password"
            name="password"
            placeholder="Password"
            class="form-control"
          />
        </div>
       
        <p style="margin:10px;">
          <input
            type="submit"
            name="login"
            value="Login"
            class="btn"
          /><br />
        </p>
        <p
          style="font-size:15px;margin: 20px; padding: 10px; box-sizing: border-box;"
        >
          Already a member?
          <a href="#" style="text-decoration:none;color: #EE00FF;"
            >Sign up</a
          >
        </p>
      </form>
    </div>
  </body>
</html>
