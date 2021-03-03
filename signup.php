<?php
    include('modules/tminc.php');
    boiler('Folded Pages - Sign Up &bull; TMINC', 
    'Login to Folded pages as student, TMINC, folded Pages, fp, student, students', 
    'Folded Pages, Student Login', 
    true, 
    '', 
    $theme_color, $favicon, $common_head_tag //DON'T EDIT THESE VARIABLES
    );
    import(array('login'));
    css('def');    
    signupform($name);
    last();
?>
