<?php
    include('modules/tminc.php');
    boiler('Folded Pages - Release Notes &bull; TMINC', 
    'tminc, folded pages, release notes, student management, dashboard', 
    'Manage students online for Free!', 
    true, 
    '', 
    $theme_color, $favicon, $common_head_tag //DON'T EDIT THESE VARIABLES
    );
    import(array('header', 'bdial'));
    css('def');    
    css('dash');
    style('.joinroomarticletmincunique{display:none}');
    head($name);
    style('ol li{margin-top:10px;line-height:25px;}a{text-decoration:none;color:#008000;font-weight:bold}');
    ?>
    <div class="dprnt"><h2>Release Notes</h2></p>
        <p>
            <em>Release Date: January 27th 2021 ; <strong>Version 1</strong></em>
        </p>
        <br>
        <p>
            <ol>
                <li>New Quiz / Test Tab feature</li>
                <li>Menifest Included</li>
                <li>Some Minor Bugs Fixed</li>
                <li>Deleting <strong>all</strong> Room Data with Room when 'Delete Room' is clicked.</li>
                <li>Added End-To-End Encryption to Quiz/Test feature. Even TMINC can't read Quiz/Test details.</li>
                <li>Added Release Notes Page</li>
                <li>Updated TMINC PHP+JS Library</li>
                <li>Changed Browser Colour to green (#008000) as per the theme colour of FOLDED PAGES. This will only visible in Chrome Mobile.</li>
                <li>Delete Room confirmation added.</li>
            </ol>
            <br>
            <strong>Suggest New Features at <a href="mailto:info.themorningindia@gmail.com">info.themorningindia@gmail.com</a></strong>
        </p>
    </div>
    <?php
    last();
    ?>