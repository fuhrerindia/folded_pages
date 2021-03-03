<?php
    include('./string.php');
    // THE ABOVE FILE IS INCLUDED HERE TO ALLOW YOU TO USE SOME DEFAULT VARIABLES.
    //  FOR EG COLORS- ADD A VARIABLE IN detail.php in root folder and use it here.
    //  eg code, suppose you have define a variable name colorscheme there and want to use it as some div's bg.
    //  the code should look somehing like:-
    //  .div{
    //      background: <?php echo $colorscheme; ? > A GAP IS GIVEN IN PHP CLOSING HERE, YOU DON'T HAVE TO GIVE THIS GAP. 
            // THIS IS GIVEN HERE BECAUSE IF THIS GAP WAS NOT GIVEN, THEN PHP WILL TAKE THIS COMMENT AS CODE AND CASUE FAULTS.
    //  } 
    //  If you want to add tminc php extension css page, just create it in same directory and extension should be php,
    //  to use this default variable and unification function. 
?>
*{
    margin:0;
    padding:0;
    font-family: sans-serif;
    outline:0;
    transition:0.3s;
}
.selectin{
    width: 90%;
    margin:5px;
    padding:3px;
}
body{background:<?php echo $colorbg; ?>}
header div{display:inline-block;
    width:60%;
    text-align:left;
    border-bottom:1px solid #666;
    padding-bottom:30px
    }
header{
    text-align:center;
    width:100%;
    padding-top:20vh;
}
.span{
    margin-top:40px;
    margin-left:20px;
}
header ul{
    list-style:none;
    display:flex;
}
.logo{width:100px;height:100px}
img{width: 100px;height:100px}
@media screen and (max-width: 900px){
    header article{float:none!important;text-align:center;}
    header{padding-top:8vh;}
    .paddingphoneitem li a, .jsdowntmincfp{    padding-top: 10px;
    display: block;}
    .batchd{width:150px!important;height:150px!important;font-size:17px!important;}
}