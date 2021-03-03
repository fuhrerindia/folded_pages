<?php
        include('modules/tminc.php');
        include('string.php');
        include('modules/algo.php');
?>
<?php
                if (isset($_POST['signin'])){
                    $mail = $_POST['mail'];
                    $pin = $_POST['pass'];
                    if ($conn = mysqli_connect($server, $user, $pass, $db)){
                        $sql = 'SELECT * FROM `users` WHERE `mail` LIKE \''.$mail.'\' AND `password` LIKE \''.$pin.'\'';
                        if ($run = mysqli_query($conn, $sql)){
                            if (0 < mysqli_num_rows($run)){
                                save_cookie('User',$mail);
                                save_cookie('Pass',$pin);
                                open('ask.php');
                            }else{
                                alert('Entered Wrong Username or Password.');
                                open('index.php');
                            }
                        }else{
                            errorn('Broken Query Given!');
                        }
                    }else{
                        errorn('Error Connecting Database, contact TMINC');
                    }
                }
            ?>