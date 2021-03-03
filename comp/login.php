<?php
    css('login');
        function loginform($name){
            ?>
                <div class="box">
        <img src="assets/icon.png" class="logo"><br>
        <h2>Sign in</h2>
        <span>to continue to <?php echo $name; ?></span>
        <form action="pro.php" method="POST">
            <input type="text" name="mail" placeholder="Email" required><br>
            <?php
            br();
                input(array("name"=>'pass', 'type'=>'password', 'hint'=>'Password'));
            ?>
        <div>
    <a href="signup.php" class="left">Create account</a><input type="submit" value="Next" name='signin'> </form>
        </div>
    </div>
            <?php
        }
        function signupform($name){
            ?>
            <div class="box">
            <img src="assets/icon.png" class="logo"><br>
            <h2>Sign Up</h2>
            <span>to continue to <?php echo $name; ?></span>
            <form action="register.php" method="POST">
            <input type="text" name="name" placeholder="Full Name" required><br><br>
                <input type="text" name="mail" placeholder="Email" required><br>
                <?php
                br();
                    input(array("name"=>'pass', 'type'=>'password', 'hint'=>'Password'));
                    br();
                    br();
                    input(array("name"=>'conf', 'type'=>'password', 'hint'=>'Confirm Password'));
                ?>
            <div>
        <a href="index.php" class="left">Login Instead?</a><input type="submit" value="Next" name='signin'> </form>
            </div>
        </div>
        <?php
        }
?>