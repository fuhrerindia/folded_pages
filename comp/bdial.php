<?php
    function batch($name, $id){
        ?>
            <div onclick='window.location="ann.php?id=<?php echo $id; ?>"' class='batchd'>
                <br><span>
                    <?php echo $name; ?>
                </span>
            </div>
        <?php
    }
    function adminbatch($name, $id){
        ?>
            <div onclick='window.location="admin_ann.php?id=<?php echo $id; ?>"' class='batchd'>
                <br><span>
                    <?php echo $name; ?>
                </span>
            </div>
        <?php
    }
?>