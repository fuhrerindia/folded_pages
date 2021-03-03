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
">Add User</h3>
          <form action="" method="POST">
            <input type="email" id="titleinput" name="titleann" placeholder="Enter User's Registered E-Mail" style="    width: 90%;
    display: inline-block;
    padding: 10px;
    margin:10px;
    background: #f2f2f2;
    border: 1px solid #666;" required><br>

   
    <button name="save">Save</button>
    </form>
    <?php
    if (isset($_POST['save'])){
        $userverify = "SELECT * FROM `users` WHERE `mail` LIKE '".$_POST['titleann']."'";
        if ($userlist = mysqli_query($conn, $userverify)){
            if (0 < mysqli_num_rows($userlist)){
                $account = mysqli_fetch_array($userlist)['fp_batches'];
                $userroomarray = json_decode($account);
                array_unshift($userroomarray,$verdata['name']."<tminc>".$_GET['id']);
                $userjson = json_encode($userroomarray);
                $userupdatesql = "UPDATE `users` SET `fp_batches`='".$userjson."' WHERE `mail` LIKE '".$_POST['titleann']."'";
                if ($userdataupdated = mysqli_query($conn, $userupdatesql)){
                    open('');
                }else{
                    alert('ERROR UPDATING USER');
                    open('');
                }
            }else{
                script("notify('', 'No TMINC ID is registered with this E-Mail, Ask the person to register with TMINC ID first.');");
            }
        }else{
            alert('ERROR VERIFYING');
            open('');
        }
    }
    ?>
    <button onClick="getbyid('nann').style.display='none'">Cancel</button>
        </div>
      </div>
      <?php
        if (isset($_POST['dismiss'])){
            $todo = "SELECT * FROM `users` WHERE `id` LIKE '".$_POST['id']."'";
            if ($details = mysqli_query($conn, $todo)){
                if (0 < mysqli_num_rows($details)){
                    $userdetail = mysqli_fetch_array($details)['fp_batches'];
                    $roomarr = json_decode($userdetail);
                    unset($roomarr[array_search($verdata['name']."<tminc>".$_GET['id'], $roomarr)]);
                    $newroomarr = array();
                    foreach($roomarr as $eachrooms){
                        array_push($newroomarr, $eachrooms);
                    }
                    $newroom = json_encode($newroomarr);
                    $updateuserrooms = "UPDATE `users` SET `fp_batches`='".$newroom."' WHERE `id` LIKE '".$_POST['id']."'";
                    if ($updated = mysqli_query($conn, $updateuserrooms)){
                        open('');
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
        }
      ?>
    <?php
    markupadmin($_GET['id'], array("title"=>'Add User', "nid"=>'nann'));
    $sqli = "SELECT * FROM `users` WHERE `fp_batches` LIKE '%>".$_GET['id']."\"%' order by `id` desc";
    if ($get = mysqli_query($conn, $sqli)){
        if (0 < mysqli_num_rows($get)){
            ?>
            <?php

            while($nval = mysqli_fetch_array($get)){          
                students(array("name"=>$nval['name'], "id"=>$nval['id'], "mail"=>$nval['mail']));
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
