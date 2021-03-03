<?php
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
            $todo = "SELECT * FROM `users` WHERE `mail` LIKE '".$_COOKIE['User']."' AND `password` LIKE '".$_COOKIE['Pass']."'";
            if ($details = mysqli_query($conn, $todo)){
                if (0 < mysqli_num_rows($details)){
                    $userdetail = mysqli_fetch_array($details)['fp_batches'];
                    $roomarr = json_decode($userdetail);



                    foreach ($roomarr as $each){
                        $roomdiv = explode("<tminc>", $each);
                        if ($roomdiv[1] === $_GET['id']){
                            $todel = $roomdiv[0]."<tminc>".$roomdiv[1];
                            $roomname = $roomdiv[0];
                        }
                    }



                    unset($roomarr[array_search($roomname."<tminc>".$_GET['id'], $roomarr)]);
                    $newroomarr = array();
                    foreach($roomarr as $eachrooms){
                        array_push($newroomarr, $eachrooms);
                    }
                    $newroom = json_encode($newroomarr);
                    $updateuserrooms = "UPDATE `users` SET `fp_batches`='".$newroom."' WHERE `mail` LIKE '".$_COOKIE['User']."'";
                    if ($updated = mysqli_query($conn, $updateuserrooms)){
                        open('dashboard.php');
                    }else{
                        alert('ERROR CAUSED! CONTACT TMINC.ML/BUGS');
                    }
                }else{
                    alert('User Not Found.');
                    open('');
                }
            }else{
                alert('ERROR GETTING USER.');
            }
        }else{
            html('error');
        }
        ?>