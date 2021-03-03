<?php
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        if($_POST['pass'] === $_POST['conf']){
        $sql = "INSERT INTO `users`(`id`, `name`, `mail`, `password`, `fp_batches`) VALUES (NULL,'".$_POST['name']."','".$_POST['mail']."','".$_POST['pass']."','[]')";
        if ($signin = mysqli_query($conn, $sql)){
            alert('Account Created');
            open('index.php');
        }else{
            error('ERROR');
        }
        }else{
            alert('Password you entered do not match each other.');
            open('signup.php');
        }
    }else{
        alert('Cant connect to server, Report issue at tminc.ml/bugs');
        open('http://tminc.ml/bugs');
    }
?>