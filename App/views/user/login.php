<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/template_admin/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container">
 <div class="row">
     <div class="col-md-4 col-md-offset-3">


    <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Please sign in or <a href="/user/register">Register</a></h2>

         Email address
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        Password
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

     </div>

     <div class="col-md-4 col-md-offset-3">
         <br>

         <?php


             echo '<p class="bg-danger">'.$data.'</p>';


         ?>


     </div>

 </div>

</div> <!-- /container -->


</body>
</html>
