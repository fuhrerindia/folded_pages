<?php
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `users` WHERE `id` LIKE '".$_COOKIE['User']."' AND `password` LIKE '".$_COOKIE['Pass']."'";
        if ($ver = mysqli_query($conn, $sql)){
            $sql = "INSERT INTO `batch`(`id`, `owner`, `name`) VALUES (NULL,'".$_COOKIE['User']."','".$_POST['code']."')";
            if ($save = mysqli_query($conn, $sql)){
                open('admin.php');
            }else{
                alert('Error Creating Room');
                open('admin.php');
            }
        }else{
            alert('Signed Out!');
            open('admin.php');
        }
    }else{
        alert('Cant Connect to server');
        open('admin.php');
    }
?>