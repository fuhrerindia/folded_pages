<?php
    include('modules/tminc.php');
    $code = $_POST['code'];
    $nsql = "SELECT * FROM `users` WHERE `mail` LIKE '".cookie('User')."' AND `password` LIKE '".cookie('Pass')."'";
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        if ($save = mysqli_query($conn, $nsql)){
            if (0 < mysqli_num_rows($save)){
                $row = mysqli_fetch_array($save);
                $name = $row['name'];
                if (strpos($row['fp_batches'], '>'.$code.'"')){
                    alert('You are already in this room!');
                    open('dashboard.php');
                }else{
                //igtiti
                $sql = "INSERT INTO `fp_req`(`id`, `user`, `room`, `name`) VALUES (NULL,'".cookie('User')."','".$code."', '".$name."')";
                if (mysqli_query($conn, $sql)){
                    alert('Room Joining Request is sent to Room Admin.');
                    open('dashboard.php');
                }else{
                    error('ERROR');
                }
            }
                ///ugig
            }else{
                error('ERROR');
            }

        }else{
            warn('Broken Query cause error!');
        }
    }else{
        error('Can not connect to Server');
    }
?>