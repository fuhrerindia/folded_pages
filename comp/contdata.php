<?php
    function markupa($cpid){
        ?>
                <ul class="flex">
        <li id="menu">
        <ul class="list">
            <li>
                <a href='vid.php?id=<?php echo $cpid; ?>'>Videos</a>
            </li>
            <li>
            <a href='ann.php?id=<?php echo $cpid; ?>'>Announcement</a>
            </li>
            <li>
            <a href='nts.php?id=<?php echo $cpid; ?>'>Notes</a>
            </li>
            <li>
                <a href="class.php?id=<?php echo $cpid; ?>">Class Link</a>
            </li>
            <li>
                <a href="quiz.php?id=<?php echo $cpid; ?>">Quiz and Tests</a>
            </li>
            <li>
                <a href="leave_room.php?id=<?php echo $cpid; ?>" style="color:red;">Leave Room</a>
            </li>
        </ul>  
        <li class='cont'>
            <div class="rgt">
        <?php
    }
    function markupadmin($cpid, $button){
        ?>
                <ul class="flex">
        <li id="menu">
        <ul class="list paddingphoneitem">
            <li>
            <?php if ($button['title'] === "null"){
                echo '';
            }else{
                ?>

        <button onClick="getbyid('<?php echo $button['nid']; ?>').style.display='block';">
            <?php echo $button['title']; ?>
        </button>
        
        <?php
            }
            ?>
    </li>
            <li>
                <a href='admin_vid.php?id=<?php echo $cpid; ?>'>Videos</a>
            </li>
            <li>
            <a href='admin_ann.php?id=<?php echo $cpid; ?>'>Announcement</a>
            </li>
            <li>
            <a href='admin_nts.php?id=<?php echo $cpid; ?>'>Notes</a>
            </li>
            <li>
                <a href="admin_class.php?id=<?php echo $cpid; ?>">Class Link</a>
            </li>
            <li>
                <a href="admin_quiz.php?id=<?php echo $cpid; ?>">Quiz and Tests</a>
            </li>
            <li>
                <a href="requsts.php?id=<?php echo $cpid; ?>">Requests</a>
            </li>
            <li onclick="showinvite('<?php echo $cpid; ?>')" class="jsdowntmincfp">
                Invitation
            </li>
            <li>
                <a href="admin_users.php?id=<?php echo $cpid; ?>">Users</a>
            </li>
            <li>
                <a onclick="document.getElementById('delroomconfdial').style.display='block'" style="color:red!important">Delete Room</a>
            </li>
        </ul>  
        <!--DELETE POPUP-->
        <div class='overlay' style="top:0;left:0;" id="delroomconfdial">
        <div class="dialog" style="    text-align: left;">
          <h3 style="    margin: 8px;
">Are you sure to delete this Room?</h3>
<p>All Room Data including Announcement, Notes, Meeting, Videos, Quizes, Tests, Requests etc will be deleted. This action can't be undone. Are you sure to delete this room? Still after deleting Room will be visible to its members, after attepting to open a deleted room, the Room will be unlinked from their account.</p>
    <button style="color:red" onclick="window.location='delete_room.php?id=<?php echo $cpid; ?>'">Yes, Delete</button>
    </form>
    <button onClick="getbyid('delroomconfdial').style.display='none'">No, Don't Delete</button>
        </div>
      </div>
        <!--/DELETE POPUP-->
        <li class='cont'>
            <div class="rgt">
        <?php
    }
    function addapp($link, $title, $app){
        ?>
            <a href="<?php echo $link; ?>" id='listref' target=_blank>
            <div class="itemvid">
                <ul>
                    <li>
                        <img src="<?php
                            if ($app === 'zoom'){
                                echo 'assets/zoom.jpg';
                            }else if($app === 'meet'){
                                echo 'assets/meet.png';
                            }elseif($app === 'team'){
                                echo 'assets/team.jpg';
                            }else if($app === 'webx'){
                                echo 'assets/webx.png';
                            }else{
                                echo 'assets/icon.png';
                            }
                        ?>" style="width:50px!important;<?php
                            if ($app === 'zoom'){
                                echo "border-radius: 30px;";
                            }
                        ?>">
                    </li>
                    <li class='h3san'>
                        <h3>
                            <?php echo $title; ?>
                        </h3>
                    </li>
                </ul>
            </div>
            </a>
        <?php
    }
    function requests($arr){
        ?>
        <div class="itemvid">
            <ul>
                <li>
                    <?php echo $arr['mail']; ?>
                </li>
                <li>
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr['id']; ?>">
                    <input type="hidden" name="mail" value="<?php echo $arr['email']; ?>">
                        <input type="submit" name="accept" class="material-icons" value="done" style="color:green;background:transparent;border:0;cursor:pointer">
                        <input type="submit" name="decline" class="material-icons" value="clear" style="color:red;background:transparent;border:0;cursor:pointer">
                    </form>
                </li>
            </ul>
        </div>
        <?php
    }
    function students($arr){
        ?>
        <div class="itemvid" style="height:22px;">
        <span style="float:left">
                    <?php echo $arr['name']; ?></span>

                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $arr['id']; ?>">
                    <input type="hidden" name="mail" value="<?php echo $arr['mail']; ?>">
                        <input type="submit" name="dismiss" class="material-icons" value="clear" style="color:red;float:right;background:transparent;border:0;cursor:pointer">
                    </form>

        </div>
        <?php
    }
    function adminaddapp($link, $title, $app, $gid){
        ?>
            <div class="itemvid">
            <input type="checkbox" name="sel[]" value="<?php echo $gid; ?>" style="cursor:pointer">

                <ul>
                    <li>
                        <img src="<?php
                            if ($app === 'zoom'){
                                echo 'assets/zoom.jpg';
                            }else if($app === 'meet'){
                                echo 'assets/meet.png';
                            }elseif($app === 'team'){
                                echo 'assets/team.jpg';
                            }else if($app === 'webx'){
                                echo 'assets/webx.png';
                            }else{
                                echo 'assets/icon.png';
                            }
                        ?>" style="width:50px!important;<?php
                            if ($app === 'zoom'){
                                echo "border-radius: 30px;";
                            }
                        ?>">
                    </li>
                    <li class='h3san'>
                        <h3>            <a href="<?php echo $link; ?>" id='listref' target=_blank>

                            <?php echo $title; ?>            </a>

                        </h3>
                    </li>
                </ul>
            </div>
        <?php
    }
    function adddoc($arr){
        ?>
                <a href="<?php echo $arr['point']; ?>" id='listref' target=_blank>
            <div class="itemvid">
                <ul>
                    <li>
                        <i class="material-icons docicon" style="color: <?php echo $arr['type']; ?>!important">description</i>
                    </li>
                    <li class='h3san'>
                        <h3>
                            <?php echo $arr['title']; ?>
                        </h3>
                    </li>
                </ul>
            </div>
            </a>
        <?php
    }
    function adminadddoc($arr){
        ?>
            <div class="itemvid">
            <input type="checkbox" name="sel[]" value="<?php echo $arr['id']?>" style="cursor:pointer">
                <ul>
                    <li>
                        <i class="material-icons docicon" style="color: <?php echo $arr['type']; ?>!important">description</i>
                    </li>
                    <li class='h3san'>
                        <h3>                <a href="<?php echo $arr['point']; ?>" id='listref' target=_blank>

                            <?php echo $arr['title']; ?>
                            </a>

                        </h3>
                    </li>
                </ul>
            </div>
        <?php
    }
    function adminquiz($arr){
        ?>
            <div class="itemvid">
            <input type="checkbox" name="sel[]" value="<?php echo $arr['id']; ?>" style="cursor:pointer">
                <ul>
                    <li>
                        <i class="material-icons docicon" style="color:#008000!important">quiz</i>
                    </li>
                    <li class='h3san'>
                        <h3>                <a href="<?php echo base64_decode($arr['point']); ?>" id='listref' target=_blank>

                            <?php echo base64_decode($arr['title']); ?>
                            </a>

                        </h3>
                    </li>
                </ul>
            </div>
        <?php
    }
    function markupb(){
        ?>
            </div>
        </li>  
    </li>
    </ul>
        <?php
    }
    function video($arr){
        ?>
        <a href="<?php echo $arr['point']; ?>" id='listref' target="_blank">
            <div class="itemvid">
                <ul>
                    <li>
                        <img src="<?php echo $arr['img']; ?>">
                    </li>
                    <li class='h3san'>
                        <h3>
                            <?php echo $arr['title']; ?>
                        </h3>
                    </li>
                </ul>
            </div>
            </a>
        <?php
    }
    function adminvid($arr){
        ?>
            <div class="itemvid">
            <input type="checkbox" name="sel[]" value="<?php echo $arr['id']?>" style="cursor:pointer">
                <ul>
                    <li>
                        <img src="<?php echo $arr['img']; ?>">
                    </li>
                    <li class='h3san'>
                    <a href="<?php echo $arr['point']; ?>" id='listref' target="_blank"><h3>
                            <?php echo $arr['title']; ?>
                        </h3>
                        </a>
                    </li>
                </ul>
            </div>
        <?php
    }
    function annd($arr){
        ?>
            <div class="itemvid" onClick="notify('<?php echo $arr['title']?>', '<?php echo $arr['msg']; ?>')" style='cursor:pointer;'">
                <h3>
                <?php echo $arr['title']; ?>
                </h3>
                <p>
                    <?php echo $arr['msg']; ?>
                </p>
            </div>
        <?php
    }
    function quiz($arr){
        ?>
            <a href="<?php echo base64_decode($arr['url']); ?>" id='listref' target=_blank>
            <div class="itemvid">
                <ul>
                    <li>
                        <i class="material-icons docicon" style="color:#008000">quiz</i>
                    </li>
                    <li class='h3san'>
                        <h3>
                            <?php echo base64_decode($arr['title']); ?>
                        </h3>
                    </li>
                </ul>
            </div>
            </a>
        <?php
    }
    function adminannd($arr){
        ?>
            <div class="itemvid" style='cursor:pointer;'">
            <input type="checkbox" name="sel[]" value="<?php echo $arr['id']; ?>" style="cursor:pointer">
                <h3>
                <?php echo $arr['title']; ?>
                </h3>
                <p>
                    <?php echo $arr['msg']; ?>
                </p>
            </div>
        <?php
    }
?>