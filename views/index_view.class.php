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
        <div class="header">
            <img style="float: right;"  src="<?= BASE_URL ?>/www/img/ran.png" alt="ran's picture">
            <div class="LogoBox">
                <h1>&nbsp&nbsp&nbsp Ran's</h1>
                <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Racin</h1>
                <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Racer's</h1>
            </div>
        </div>
        <hr class="hr">
        <!--This is the Navigation Tab -->
        <div class="NavBar">
            <table>
                <tr>
                    <th class="NavBar"><a href="<?= BASE_URL ?>/index.php/welcome/index/">Home</a></th>
                    <th class="NavBar"><a href="<?= BASE_URL?>/index.php/car/index/">Cars </a></th>
                    <th class="NavBar"><a href="<?= BASE_URL?>/index.php/user/login/">Login</th>
                    <th class="NavBar">About</th>
                    <div class="searchbar">
                        <form method="get" action="<?=BASE_URL?>/index.php/car/search">
                    <td>
                        <input name="query-terms" id="searchtextbox" placeholder="Search Cars by Name" autocomplete="off" onkeyup="handleKeyUp(event)">
                        <div id="suggestionDiv";></div>
                    </td>
                            <td>
                                <input type="submit" value="Search" class="GoButton" id="GoButtonStyle">
                            </td>
                        </form>
                    </div>
                </tr>

            </table>
        </div>
        <hr class="hr">






        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <hr class="hr">
        <div class="footer" id="FooterBorder">
            <div class="footer" id="FooterText">
                <p>&copy 2022 Ran's Racing Racers. All Rights Reserved</p>
                <p style="font-size: 9px;">* A Group 7 project By: Logan Douglass, Issac Lowe, Evan Minor, and Logan Orender</p>
            </div>
        </div>
        <hr class="hr">
        <!--Auto suggestion Javascript -->
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}