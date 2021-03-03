<?php
ob_start("ob_gzhandler"); 
ob_start("ob_html_compress2");
//compress html php
function ob_html_compress2($buf){
    return str_replace(array("\n","\r","\t"),'',$buf);
}

/*You should also enable GZIP in the PHP config using zlib.outputcompression rather than using obgzhander() as your ob_start() callback.
https://coderwall.com/p/fatjmw/compressing-html-output-with-php
https://github.com/jenstornell/tiny-html-minifier/blob/master/tiny-html-minifier.php
https://www.textfixer.com/html/javascript-pop-up-window.php
But of course it might be a good idea to extend the obhtmlcompress function to filter out a bit more of unnecessary output, if you just replace the function body with.
*/
function ob_html_compress($buf){

    return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}
?>
<?php
    include('./string.php');
    function errorc($msg){
        ?>
        <script>
            var errmsg = 'Error shooted!, see CONSOLE for issue and its fix.';
           alert(errmsg);
           console.error('SOME ERROR FOUND! CHECK BELOW');
           console.warn('<?php echo $msg; ?>');
           </script>
            <?php
    }
    function alert($msg){
        ?>
            <script>
                alert('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function center($element){
        echo "<center>".$element."</center>";
    }
    function upload($files, $directory){
        $size = $files['size'];
        $filename = $files['name'];
        $namear = explode(".", $filename);
        $fname = date("Ymd") ."". time()."".$namear[0].".".$namear[1];
        $tempname = $files['tmp_name'];
        $folder = $directory."/".$fname;
        move_uploaded_file($tempname, $folder);
        return $folder; //RETURNS FILE PATH
    }
    function save_cookie($key, $val){
        setcookie($key, $val, time() + (86400 * 30), "/"); // 86400 = 1 day 
    }
    function cookie($cookiename){
        return $_COOKIE[$cookiename];
    }
    function style($code){
        ?>
            <style><?php echo $code; ?></style>
        <?php
    }
    function delete_cookie($cookiename){
        ?><script>
        document.cookie = "<?php echo $cookiename ?>=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        </script>
        <?php
        if (!isset($_COOKIE[$cookiename])){
            return true;
        }else{
            return false;
        }
    }
    function open($dest){
        ?>
            <script>
                window.location="<?php echo $dest; ?>";
            </script>
        <?php
    }

    function error($msg){
        ?>
            <script>
                console.error('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function console($msg){
        ?>
            <script>
                console.log('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function warn($msg){
        ?>
            <script>
                console.warn('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function boiler($title, $key, $desc, $rob, $cus, $theme_color, $favicon, $common_head_tag){
        /*
        $title: ENTER PAGE TITLE,
        $key: PAGE KEYWORDS,
        $DESC: page description,
        $rob: ALLOW ROBOTS TO INDEX PAGE? ACCEPT BOOLEAN
        $cus: CUSTOM HEADER 

        !IMPORTANT
        NEVER USE BACKTICKS (`) AS INVERTED COMMAS TO DEFINE VALUE OR USE VARIABLES!!!!
        */
        ?>
         <!-- MADE WITH TMINC PHP EXTENSION  -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?php echo $title; ?></title>
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <script src="modules/mod.js"></script>
                <meta name='theme-color' content= '#008000' />
                <meta name="description" content="<?php echo $desc; ?>">
                <link rel="stylesheet" href="design/tminc.css">
                <link rel="manifest" href="manifest.webmanifest">
                <meta name="keywords" content="<?php echo $key; ?>">
                <?php echo $common_head_tag;?>
                <?php 
                    if ($rob === false){
                ?>
                <?php 
                    if ($favicon[0] === false){
                        echo '';
                    }else{
                        ?>
                        <?php 
                            if ($favicon[1] === false || !isset($favicon[1]) || $favicon[1] === ''){
                                ?>
                                    <script>
                                        var errmsg = 'Error in setting Favicon, see CONSOLE for issue and its fix.';
                                        alert(errmsg);
                                        console.warn(errmsg);
                                        console.log('ISSUE FIX HINT: OPEN /default.php and add image type of favicon in 2nd Value (1st INDEX) of array in \'$favicon\' variable in line 3, or change its 1st Value (0th Index) to false to remove custom favicon.')
                                    </script>
                                <?php
                            }
                        ?>
                    <meta name="msapplication-TileImage" content="<?php echo $favicon[0]; ?>"> <!-- Windows 8 -->
                    <meta name="msapplication-TileColor" content="<?php echo $favicon[0]; ?>"/> <!-- Windows 8 color -->
                    <link rel="icon" type="image/<?php echo $favicon[1]; ?>" href="<?php echo $favicon[0]; ?>">
                    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $favicon[0]; ?>"><!-- iPad Retina-->
                    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="i<?php echo $favicon[0]; ?>"><!--iPhone Retina -->
                    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $favicon[0]; ?>"><!-- iPad 1 e 2 -->
                    <link rel="apple-touch-icon-precomposed" href="<?php echo $favicon[0]; ?>"><!-- iPhone, iPod e Android 2.2+ -->

                        <?php
                    }
                ?>
                <meta name="theme-color" content="<?php echo $theme_color; ?>">
                <meta name="robots" content="noindex">
                <?php 
                    }
                ?>
                                <script src="modules/jquery.js"></script>

                <?php echo $cus; ?>
            </head>
            <body>
                    <!-- PRELOADER -->
                    <div class="preloader" id="preloader" style="
    width: 100%;
    height: 100vh;
    position: fixed;
    background: #000000a6;
">
        <img src="assets/loading.gif" style="
    margin-top: 37vh;
">
    </div>
    <script>
        $(document).ready(function(){
            $("#preloader").css("display", "none");
        });
    </script>
                    <!-- PRELOADER END -->

                <div id="overlay">
                    <div class="dialog">
                    <h3 id='heading'></h3>
                    <p id='message'></p>
                    <button onClick='tmincreshidedialog()' id="tmincokbtn">OK</button>
                </div>
                </div>
        <?php
    }
    function save_local($tag, $val){
        ?>
        <script>
        localStorage.setItem($tag, $val);
        </script>
        <?php
    }
    function del_local($tag){
        ?>
        <script>
        localStorage.removeItem($tag);
        </script>
        <?php
    }
    function clicked($id, $function){
        ?>
            <script>
                document.getElementById("<?php echo $id; ?>").addEventListener("click", ()=>{<?php echo $function; ?>});
            </script>
        <?php
    }
    function mouseover($id, $function){
        ?>
            <script>
                document.getElementById("<?php echo $id; ?>").addEventListener("mouseover", ()=>{<?php echo $function; ?>});
            </script>
        <?php
    }
    function notify($title, $message){
        ?>
            <script>
            notify("<?php echo $title; ?>", "<?php echo $message; ?>");
            </script>
        <?php
    }
    function floating($arr){
        ?>
        <style>
        #<?php echo $arr['id'] ?>:hover{background:<?php echo $arr['hover'];?>!important}
        </style>
            <div style="width:50px;height:50px;border-radius:25px;position:fixed;<?php if(isset($arr['vert'])){
                                                                                    echo $arr['vert']; 
                                                                                    }else{
                                                                                        echo "right";}?>:0;bottom:0;background:<?php echo $arr['background']; ?>;cursor:pointer;margin: <?php echo $arr['margin']; ?>" id="<?php echo $arr['id']; ?>">
            <span style="color:<?php echo $arr['color']; ?>;margin:13px;" class="material-icons">menu</span>
            </div>
        <?php
    }
    function last(){
        ?>
            </body>
            </html>
        <?php
    }
    function css($path){
        echo '<style type=\'text/css\'>';
        include('design/'.$path.'.php');
        echo '</style>';
        }
        function design($input){
            $arr = explode(", ", $input);
            foreach($arr as $filname){
                ?><style type="text/css"><?php include('design/'.$filname.'.php'); echo "\n";?></style><?php
            }
        }
    function img($src, $alt){
        ?>
            <image src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
        <?php
    }

    function errorn($msg){
        echo '<font style=\'font-weight:bold;color:red;\'>'.$msg.'</font><br>';
    }
    function warnn($msg){
        echo '<font style=\'font-weight:bold;color:yellow;\'>'.$msg.'</font><br>';
    }
    function success($msg){
        echo '<font style=\'font-weight:bold;color:green;\'>'.$msg.'</font><br>';
    }
    function input($array){
        if (is_array($array)){
        ?>
        <input type='<?php echo @$array['type']?>' placeholder='<?php echo @$array['hint']; ?>' name='<?php echo @$array['name']?>' class='<?php echo @$array['class'] ?>' id='<?php echo @$array['id']; ?>' value='<?php echo @$array['val']?>' name='<?php echo @$array['name'] ?>'>
        <?php
        }else{
            errorc('Input accepts properties in an array with index name, string given');
        }
    }
    function button($arr){
        ?>
        <button id="<?php echo $arr['id']; ?>" class="<?php echo $arr['class']; ?>"><?php echo $arr['value']; ?></button>
        <?php
    }
    function loadevent($function){
        ?>
        <script>
        $(document).ready(function() {
            <?php echo $function; ?>
        });
        </script>
        <?php
    }
    function import($arr){
        foreach($arr as $each){
            include('./comp/'.$each.'.php');
        }
    }
    function br(){
        echo '<br>';
    }
    function label($larr){
        if (is_array($larr)){
        ?>
        <label id='<?php echo @$larr['id']; ?>' class='<?php echo @$larr['class']?>' for='<?php echo @$larr['for']?>'><?php echo @$larr['val']?></label>
        <?php
        }else{
            errorc('You have added a label through PHP FRONTEND, it accepts an array but you have provided a string!');
        }
    }
    function html($html){
        echo $html;
    }
    function script($code){
        ?>
            <script>
                <?php echo $code; ?>
                </script>
        <?php
    }
?>
