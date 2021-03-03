<?php include('./string.php'); ?>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
    *{color:#666;text-align:center;margin:0;font-size:14px;padding:0;font-family: 'Noto Sans', sans-serif;}
    .box{padding:20px;margin-top:15vh;background:<?php echo $colorbg2; ?>;padding-bottom:36px;border:1px solid #ddd;border-radius:8px;width:445px;display:inline-block;}
    .logo{height:50px;width:50px;display:inline-block;margin:40px;margin-bottom:0px}
    h2{color:#202124;margin-bottom:10px;font-size:24px;font-weight:100;}
    p{width:90%;text-align:left;margin:30px;display:inline-block;}
    a{text-decoration:none;color:<?php echo $colordef; ?>;font-weight:5px}
    .left{float:left;}
    body{background:<?php echo $colorbg; ?>}
    span{display:block;margin:10px;}
    input[type="text"],input[type="email"],input[type="password"]{width:90%;padding:13px 15px;font-size:16px;text-align:left;color:#404040;border-radius:4px;border:1px solid #ddd;padding-top:10px;padding-bottom:10px;}
    input[type="submit"]{float:right;cursor:pointer;outline:0;background:<?php echo $colordef; ?>;color:#fff;font-family: 'Noto Sans', sans-serif;border:0;width:85px;height:40px;border-radius:5px;}
    .left, input[type="submit"]{margin:20px;}
    @media screen and (max-width:450px){
        .box{border:0;width:100%;margin-top:0;}
    }