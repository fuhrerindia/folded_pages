<?php
    include('modules/tminc.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `users` WHERE `mail` LIKE '".cookie('User')."' AND `password` LIKE '".cookie('Pass')."'";
        if ($run = mysqli_query($conn, $sql)){
            if (0 < mysqli_num_rows($run)){
                $data = mysqli_fetch_array($run);
            save_cookie('User', cookie('User'));
            save_cookie('Pass', cookie('Pass'));
    boiler('Folded Pages - Dashboard &bull; TMINC', 
    'Login to Folded pages as student, TMINC, folded Pages, fp, student, students', 
    'Folded Pages, Student Login', 
    true, 
    '', 
    $theme_color, $favicon, $common_head_tag //DON'T EDIT THESE VARIABLES
    );
    import(array('head', 'bdial'));
    css('def');    
    css('dash');
    head($name);
    html('<div class=\'dprnt\'>');
    $nsql = "SELECT * FROM `batch` WHERE `owner` LIKE '".cookie('User')."' order by `id` desc";
    if ($data = mysqli_query($conn, $nsql)){
        if (0 < mysqli_num_rows($data)){
            while($rows = mysqli_fetch_array($data)){
                adminbatch($rows['name'], $rows['id']);
            }
        }else{
            echo 'No Created Rooms. Create one now by clicking on Create Room Above.';
        }
    }else{
        error('Broken Query Found.');
    }
    html('</div>');
    last();
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
