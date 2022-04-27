<?php
/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView {

    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <!--This is the URL stuff -->
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/styles.css' />  <!--Getting Style from CSS -->
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
                var media = "car";
            </script>
        </head>
        <body>

        <!--This is the header for every page-->
        <div id="header">
            <img style="float: right;"  src="www/img/ran.png" alt="ran's picture">
            <h1>&nbsp&nbsp&nbsp Ran's</h1>
            <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Racin</h1>
            <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Racer's</h1>

        </div>
        <hr class="hr">


        <!-- This is the search bar  -->
        <div id="searchbar">
            <form method="get" action="<?=BASE_URL?>/index.php/car/search">
                <input name="query-terms" id="searchtextbox" placeholder="Search Cars by Name" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go">
            </form>
            <div id="suggestionDiv"></div>
        </div>



        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <hr class="hr">
        <div id="footer">
            <p>&copy 2022 Ran's Racing Racers. All Rights Reserved</p>
            <p style="font-size: 9px;">* A Group 7 project By: Logan Douglass, Issac Lowe, Evan Minor, and Logan Orender</p>
        </div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}