<?php
    $theme_color = '#FFFFFF'; //THEME COLOR FOR BROWSER [HEX VALUE RECOMMENDED], DEFAULT IS WHITE
    $favicon = array(false, false); //ENTER PATH OF YOUR FAVICON OR UPLOAD FAVICON IN ROOT FOLDER WITH NAME 'favicon.ico' or NO FAVICON WILL BE SET,
                                        // It accepts an array, 1st Value (0 Index) image path and 2nd value (1st Index) should have image type or extension, for eg png or jpg etc
    
    $common_head_tag = ''; //ADD A COMMON HTML <HEAD> TAG HERE FOR ALL PAGES!
    // THIS FESTURE IS GIVEN TO ADD ANY ANALYTIC CODE OR EXTERNAL LINK, CSS ETC.
    $name = 'Folded Pages';
    $colordef = '#008000';
    $colorbg = '#ededed';
    $colorbg2 = '#ffffff';
    // DEFINE A COLOR VARIABLE HERE AND USE IT IN ALL PAGES WITHOUT DEFINING OR INCLUDING AGAIN
    // NO NEED OF INCLUDING THIS PAGE AGAIN AS IT IS PRE INCLUDED IN ALL PAGES WITH MODULES

    ##IMPORTANT##
    // IF YOU DON'T HAVE NEED OF THIS PAGE, IGNORE THIS PAGE BUT DON'T DELETE THIS PAGE OR IT WILL CAUSE AN ERROR,
    // // THEIR ARE FUNCTIONS AND LOGICS DEPENDENT ON THIS PAGE, AND NEVER DELETE ANY PRE-WRITTEN VARIBALE FROM THIS PAGE, THIS WILL CAUSE AN ERROR.
    // WHY NOT TO REMOVE ANY PRE DEFINED VARIABLE?
    //     1. THESE ARE UNIQUE VARIABLES, THESE VARIABLE ARE USED IN EACH PAGE AND MODULES, THIS WILL CRASH WHOLE WEBSITE OR WEBAPP.

    //MYSQL / MARIADB DETAIL FOR EACH PAGE
    //OPTIONAL, IGNORE, EDIT,DELETE DO WHATEVER YOU WANT.
    $server = 'fdb25.awardspace.net'; //Usually it is 'localhost' should check your PANEL for this.
    $user = '2998560_sdb'; //Usually it is 'root' in XAMPP and WAMPP, check your PANEL for this.
    $pass = 'tmincdcin1'; //By default blank in XAMPP AND WAMP, check your PANEL TO find this.
    $db = '2998560_sdb'; //Your DB name.
    //END OF MYSQL / MARIA DB CREDENTIALS, NOW YOU CAN USE THESE VARIABLE FOR DB CONNECTIONS AND USAGE.
?>