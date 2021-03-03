<?php include('./string.php'); ?>
.list{
    list-style:none;
}
.list li{    font-size: 18px;
    font-weight: bold;
    margin: 10px;
    color: #161616;
    cursor:pointer;
    margin-right:20px;
}
.flex{
    display: flex;
    list-style:none;
}
.list li a{color:#000;text-decoration:none}
.cont{width:70%}
.docicon{font-size: 42px;}
.menu{width:40%}
.itemvid{    width: 100%;
    background: #fff;
    padding: 10px;
    border-radius: 10px;
    margin-top:10px;
    }
    .itemvid:hover{
        box-shadow: 0px 0px 10px #404040;
    }
    #listref{
        text-decoration:none;
        color:#000  }
    .itemvid ul{    display: flex;
    list-style: none;}
    .itemvid ul li img{
    width:100px;height:50px;
    }
    .h3san{margin-top: 11px;
    margin-left: 10px;
    font-size: 14px;}
    @media screen and (max-width:700px){
        .flex{display:unset}
        .list{display:flex;overflow:scroll;}
        .list li a{white-space: nowrap;}
        header div{width:80%}
        .dprnt{width:90%}
        .cont{width: 100%;
    text-align: center;
    padding-top: 12px;}
    header ul{display:block;}
    .list li button{margin-top:0}
    }