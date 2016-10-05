<?php

var_dump($_POST);


?>
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
                <h2 class="form-signin-heading">Registration</h2>

                <br>
                Your name:
                <input type="text" name="name" class="form-control" placeholder="Name" required>
                <br>

                Email address:
                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <br>

                Password
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <br>
                Repeat password
                <input type="password" name="password2" id="inputPassword" class="form-control" placeholder="Repeat password" required>


                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>

        </div>

        <div class="col-md-4 col-md-offset-3">

            <?php

            foreach ($data as $error) {
                echo '<p class="bg-danger">'.$error.'</p>';
            }

            ?>


        </div>

    </div>

</div> <!-- /container -->


</body>
</html>
