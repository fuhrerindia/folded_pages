<?php
    $code = base64_encode(str_replace("&", "%tminc%", $_GET['id']));
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `users` WHERE `mail` LIKE '".cookie('User')."' AND `password` LIKE '".cookie('Pass')."'";
        if ($run = mysqli_query($conn, $sql)){
            if (0 < mysqli_num_rows($run)){
                $data = mysqli_fetch_array($run);
            save_cookie('User', cookie('User'));
            save_cookie('Pass', cookie('Pass'));

        }else{
            alert('Password of Your account got changed!, Login again.');
            delete_cookie('User');
            delete_cookie('Pass');
            open('index.php');
        }
        }else{
            errorn('Broken Query Provided, Contact TMINC');
                error('QUERY BROKE, SERVER SIDE FAULT.');
                warn('Report Bug at tminc.ml/bug');
        }
        }else{
        erron('Error Connecting DatabasE, Please try again later or contact TMINC.');
        error('CONNECTION FAULT, SERVER SIDE FAULT.');
        warn('Contact TMINC');
        
        }
?>