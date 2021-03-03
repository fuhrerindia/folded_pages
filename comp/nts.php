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
        </ul>  
        <li class='cont'>
            <div class="rgt">
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
        <a href="<?php echo $arr['point']; ?>" id='listref'>
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
    function annd($arr){
        ?>
            <div class="itemvid">
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