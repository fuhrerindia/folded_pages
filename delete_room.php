<?php
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `users` WHERE `id` LIKE '".$_COOKIE['User']."' AND `password` LIKE '".$_COOKIE['Pass']."'";
        if ($ver = mysqli_query($conn, $sql)){
            $sql = "DELETE FROM `batch` WHERE `id` LIKE '".$_GET['id']."' AND `owner` LIKE '".$_COOKIE['User']."'";
            if ($save = mysqli_query($conn, $sql)){
                $dsql = "DELETE FROM `fp_ann` WHERE `owner` LIKE '".$_GET['id']."'";
                if ($ann = mysqli_query($conn, $dsql)){
                    $dsql = "DELETE FROM `fp_link` WHERE `batch` LIKE '".$_GET['id']."'";
                if ($ann = mysqli_query($conn, $dsql)){
                    $dsql = "DELETE FROM `fp_notes` WHERE `batch` LIKE '".$_GET['id']."'";
                    if ($ann = mysqli_query($conn, $dsql)){
                        $dsql = "DELETE FROM `fp_req` WHERE `room` LIKE '".$_GET['id']."'";
                if ($ann = mysqli_query($conn, $dsql)){
                    $dsql = "DELETE FROM `fp_video` WHERE `batch` LIKE '".$_GET['id']."'";
                if ($ann = mysqli_query($conn, $dsql)){
                    
                    $sqlarr = array("DELETE FROM `fp_quiz` WHERE `batch` LIKE '".base64_encode($_GET['id'])."'", "DELETE FROM `fp_ann` WHERE `owner` LIKE '".$_GET['id']."'", "DELETE FROM `fp_link` WHERE `batch` LIKE '".$_GET['id']."'", "DELETE FROM `fp_notes` WHERE `batch` LIKE '".$_GET['id']."'", "DELETE FROM `fp_video` WHERE `batch` LIKE '".$_GET['id']."'", "DELETE FROM `fp_req` WHERE `room` LIKE '".$_GET['id']."'");
                    foreach($sqlarr as $query){
                        mysqli_query($conn, $query);
                    }
                    open('admin.php');

                }else{
                    echo "Can't Delete Announcements.";
                }
                }else{
                    echo "Can't Delete Announcements.";
                }
                    }else{
                        echo "Can't Delete Announcements.";
                    }
                }else{
                    echo "Can't Delete Announcements.";
                }
                }else{
                    echo "Can't Delete Announcements.";
                }
            }else{
                alert('Error deleting Room');
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