<?php
    include('modules/tminc.php');
    boiler('Folded Pages - Sign Up &bull; TMINC', 
    'Login to Folded pages as student, TMINC, folded Pages, fp, student, students', 
    'Folded Pages, Student Login', 
    true, 
    '', 
    $theme_color, $favicon, $common_head_tag //DON'T EDIT THESE VARIABLES
    );
    import(array('header'));
    css('def');
    ?>
    <style>
    body{text-align:center;}
    .ele{    width: 60%;
    height: 43px;
    background: #ffffffe8;
    margin: 12px;
    display: inline-block;
    padding-top: 25px;
    padding-left: 21px;
    border-radius: 12px;
    box-shadow: 0px 0px 15px #ddd;
    text-align: left;
    cursor: pointer;}
    .ele:hover{    box-shadow: 0px 0px 27px #000;   }</style>
    <?php head($name); ?>
    <div class="ele" id="user" onclick="window.location='dashboard.php';">User Panel</div>
    <div class="ele" id="admin" onclick="window.location='admin.php'">Admin Panel</div>
    <?php
    last();
?>