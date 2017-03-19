<?php
    session_start();
    require_once("user.php");
    $user = new USER();

    if( $user->logovan() == true )
    {
        $user->preusmjeri('browse.php');
    }

    if( isset($_POST['bLogin']) )
    {
        $uname = $_POST['user'];
        $upass = $_POST['pw'];

        if( $user->login($uname, $upass) )
        {
            $user->preusmjeri('browse.php');
        }
        else
        {
            $error = "Pogrešan username ili password!";
        } 
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Keynes</title>
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="../img/logo2.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <body>
        <div class="login-page">
            <div class="form">
                <img src="../img/logo2.png" height="70px;" >
                <form class="login-form" method="POST">
                    <?php
                         if(isset($error))
                         {
                             echo "<div class=\"alert alert-danger\">
                                   <i class=\"glyphicon glyphicon-warning-sign\"></i> &nbsp;".$error."!
                                   </div>";
                         }
                    ?>
                    <input  type="text"     placeholder="username" name="user">
                    <input  type="password" placeholder="password" name="pw">
                    <button type="submit"   name="bLogin">login</button>
                </form>
            </div>
        </div>
    </body>
</html>
