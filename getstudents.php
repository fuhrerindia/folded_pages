<?php 
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `users` WHERE `fp_batches` LIKE '%<tminc>".$_POST['data']."\"%'";
        if ($run = mysqli_query($conn, $sql)){
            if (0 < mysqli_num_rows($run)){
                html('<h4>Select Students to alot.</h4>');
                while($row = mysqli_fetch_array($run)){
                    html('<input type="checkbox" name="stu[]" value="'.$row['mail'].'" id="student'.$row['id'].'">&nbsp;<label style="cursor:pointer;" for="student'.$row['id'].'">'.$row['name'].'</label><br>');
                }
                br();
            }else{
                html("No user found in your room.");
            }
        }else{
            error("QUREY BROKE, WHILE FETCHING STUDENTS!");
        }
    }else{
        error("ERROR CONNECTING DB, WRONG CREDENTIALS.");
    }
?>