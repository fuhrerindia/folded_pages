<?php
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `users` WHERE `mail` LIKE '".cookie('User')."' AND `password` LIKE '".cookie('Pass')."'";
        if ($run = mysqli_query($conn, $sql)){
            if (0 < mysqli_num_rows($run)){
                $data = mysqli_fetch_array($run);
            save_cookie('User', cookie('User'));
            save_cookie('Pass', cookie('Pass'));
            $vsql = "SELECT * FROM `batch` WHERE `id` LIKE '".$_GET['id']."'";
            if ($allbs = mysqli_query($conn, $vsql)){
                if (0 < mysqli_num_rows($allbs)){
                    $verdata = mysqli_fetch_array($allbs);
                    if ($verdata['owner'] === cookie('User')){

    boiler('Folded Pages - Notices &bull; TMINC', 
    'Login to Folded pages as student, TMINC, folded Pages, fp, student, students', 
    'Folded Pages, Student Login', 
    true, 
    '    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    ', 
    $theme_color, $favicon, $common_head_tag //DON'T EDIT THESE VARIABLES
    );
    import(array('head', 'contdata'));
    css('def');    
    css('dash');
    css('cont');
    head($name);
    html('<div class=\'dprnt\'>');
    ?>
          <div class='overlay' style="top:0;left:0;" id="nann">
        <div class="dialog" style="    text-align: center;">
          <h3 style="    margin: 8px;
">New App</h3>
          <form action="" method="POST">
            <input type="text" id="titleinput" name="titleann" placeholder="Enter Title" style="    width: 90%;
    display: inline-block;
    padding: 10px;
    margin:10px;
    background: #f2f2f2;
    border: 1px solid #666;" required><br>
    <input type="text" id="titleinput" name="yturl" placeholder="Enter Meeting URL" style="    width: 90%;
    display: inline-block;
    padding: 10px;
    margin:10px;
    background: #f2f2f2;
    border: 1px solid #666;" required>
    <select name="appyt" class="selectin">
        <option value="zoom">Zoom</option>
        <option value="meet">Google Meet</option>
        <option value="webx">Cisco Webex</option>
        <option value="team">Microsoft Teams</option>
        <option value="un">Other</option>
    </select>
                <select name="allowto" class="selectin" id="alloselect" required>
                <option value="">--Allow to--</option>
                    <option value="true">All</option>
                    <option value="select">Select Students</option>
                    <!-- // STUDENTS SELECTION -->

                    <script>
                        $(document).ready(function(){
                            $("#alloselect").change(function(){
                                if ($("#alloselect").val() === "select"){
                                $("#stlist").css("display", "block");
                                $.post("getstudents.php",
                                    {data: "<?php echo $_GET['id']; ?>"},
                                    function(result){
                                        $("#stlist").html(result);
                                    });
                                }else{
                                $("#stlist").hide();
                                }
                            });
                        });
                    </script>
                </select>
                <div id="stlist" style="display:none;margin-left:10%;text-align:left;">
                        Fetching Students...
                    </div>
    <button name="save">Save</button>
    </form>
    <button onClick="getbyid('nann').style.display='none'">Cancel</button>
        </div>
      </div>
      <?php
            if (isset($_POST['save'])){
                if (isset($_POST['stu'])){
                if ($_POST['stu'][0] === "" || empty($_POST['stu'])){
                    $allow = 'true';
                }else{
                    $allow = "";
                    foreach ($_POST['stu'] as $index){
                        $allow = $index."<a>".$allow;
                    }
                }
            }else{
                $allow = 'true';
            }
                $saveann = "INSERT INTO `fp_link`(`id`, `title`, `url`, `batch`, `allow`, `app`) VALUES (NULL,'".$_POST['titleann']."','".$_POST['yturl']."','".$_GET['id']."','".$allow."','".$_POST['appyt']."')";
                if ($uploaded = mysqli_query($conn, $saveann)){
                    script('notify(\'Video Saved\', \'Video is available for students. They can see it into Announcements Tab.\')');
                }else{
                    script('notify(\'Error!\', \'Something Went Wrong, Please don\'t use "\'" in message or heading.\')');
                }
            }
      ?>
    <?php
    markupadmin($_GET['id'], array("title"=>'null', "nid"=>'nann'));
    $sqli = "SELECT * FROM `fp_req` WHERE `room` LIKE '".$_GET['id']."' order by `id` desc";
    if ($get = mysqli_query($conn, $sqli)){
        if (0 < mysqli_num_rows($get)){
            ?>
            <?php
            if (isset($_POST['decline'])){
                $deletesql = "DELETE FROM `fp_req` WHERE `id` LIKE '".$_POST['id']."'";
                if ($deleted = mysqli_query($conn, $deletesql)){
                    unset($_POST['decline']);
                    open('');
                }else{
                    script("notify('ERROR!', 'INTERNAL QUERY BROKE WHILE DELETING, PLEASE REPORT ISSUE AT tminc.ml/bug');");
                }
            }
            if (isset($_POST['accept'])){
                $newsql = "SELECT * FROM `users` WHERE `mail` LIKE '".$_POST['mail']."'";
                if ($insert = mysqli_query($conn, $newsql)){
                    if (0 < mysqli_num_rows($insert)){
                        $allrooms = mysqli_fetch_array($insert)['fp_batches'];
                        $roomarr = json_decode($allrooms);
                        array_unshift($roomarr, $verdata['name']."<tminc>".$_GET['id']);
                        $newarr = json_encode($roomarr);
                    $savesql = "UPDATE `users` SET `fp_batches`='".$newarr."' WHERE `mail` LIKE '".$_POST['mail']."'";
                    if ($update = mysqli_query($conn, $savesql)){
                        $deletesql = "DELETE FROM `fp_req` WHERE `id` LIKE '".$_POST['id']."'";
                        if ($remove = mysqli_query($conn, $deletesql)){
                        unset($_POST['accept']);
                    open('');
                        }else{
                            alert('USER ADDED TO ROOM BUT CAN\'T REMOVE REQUEST, DON\'T ACCEPT THE REQUEST AGAIN UNTILL THE FIXATION OF ISSUE AS IT WILL CAUSE GLITCH IN USER\'S PANEL');
                            open('');
                        }
                    }else{
                        alert('ERROR SAVING USER TO ROOM, CONTACT TMINC.ML/BUG');
                    }
                    }else{
                        alert('User Not Found. Ask the person to request again.');
                    }
                }else{
                    script("notify('ERROR!', 'INTERNAL QUERY BROKE WHILE ADDING TO ROOM, PLEASE REPORT ISSUE AT tminc.ml/bug');");
                }
            }
            while($nval = mysqli_fetch_array($get)){          
                requests(array("mail"=>$nval['name'], "id"=>$nval['id'], "email"=>$nval['user']));
                        }
            ?>
            <?php
        }else{
            html('No available Reaquest. Feel Free.');
        }
    }else{
        errorn('Query Broke! Contact TMINC');
        error('Query Broke, Report this issue at tminc.ml/bug');
    }
    markupb();
    html('</div>');
    last();
            }else{
                alert('This batch is not registered with your account');
                open('admin.php');
            }
            
                    
        }else{
            alert('Room Not Found');
            open('admin.php');
        }
    }else{
        warn('Broken Query, Can\'t Verify You');
    }
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
