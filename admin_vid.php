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
">New Video</h3>
          <form action="" method="POST">
            <input type="text" id="titleinput" name="titleann" placeholder="Enter Heading" style="    width: 90%;
    display: inline-block;
    padding: 10px;
    margin:10px;
    background: #f2f2f2;
    border: 1px solid #666;" required><br>
    <input type="text" id="titleinput" name="yturl" placeholder="Enter YouTube Video URL" style="    width: 90%;
    display: inline-block;
    padding: 10px;
    margin:10px;
    background: #f2f2f2;
    border: 1px solid #666;" required>
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
            $breakuri = explode(".be/",$_POST['yturl']);
                $saveann = "INSERT INTO `fp_video`(`id`, `img`, `title`, `url`, `batch`, `allow`) VALUES (NULL,'https://img.youtube.com/vi/".$breakuri[1]."/hqdefault.jpg','".$_POST['titleann']."','".$_POST['yturl']."','".$_GET['id']."','".$allow."')";
                if ($uploaded = mysqli_query($conn, $saveann)){
                    script('notify(\'Video Saved\', \'Video is available for students. They can see it into Videos Tab.\')');
                }else{
                    script('notify(\'Error!\', \'Something Went Wrong, Please don\'t use "\'" in message or heading.\')');
                }
            }
      ?>
    <?php
    markupadmin($_GET['id'], array("title"=>'Add Video', "nid"=>'nann'));
    $sqli = "SELECT * FROM `fp_video` WHERE `batch` LIKE '".$_GET['id']."' order by `id` desc";
    if ($get = mysqli_query($conn, $sqli)){
        if (0 < mysqli_num_rows($get)){
            ?>
                <form action="" method="post">
                    <input type="submit" value="delete" style="color:red;background:transparent;border:0;cursor:pointer" name="delete" class="material-icons">
            <?php
            if (isset($_POST['delete'])){
                if (empty($_POST['sel'])){
                    alert('No Video Selected to delete');
                }else{
                    $i = 1;
                foreach($_POST['sel'] as $sele){
                    if ($i === 1){
                        $selections = "`id` LIKE '".$sele."'";
                        $i = 2;
                    }else{
                        $selections = " OR `id` LIKE '".$sele."'";
                    }
                }
                $deletesql = "DELETE FROM `fp_video` WHERE ".$selections;
                if ($deleted = mysqli_query($conn, $deletesql)){
                    alert('Selected Videos are deleted successfully.');
                    open('');
                }else{
                    script("notify('ERROR!', 'INTERNAL QUERY BROKE WHILE DELETING, PLEASE REPORT ISSUE AT tminc.ml/bug');");
                }
            }
            }
            while($nval = mysqli_fetch_array($get)){          
            adminvid(array('title'=>$nval['title'], 'point'=>$nval['url'], 'img'=>$nval['img'], 'id'=>$nval['id']));
            }
            ?>
            </form>
            <?php
        }else{
            html('No Video is available. Add one by clicking Add Video');
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
