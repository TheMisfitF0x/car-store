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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //variables for a user's login, name, and role
        $login = null;
        $name = null;
        $role = 0;

        //if the use has logged in, retrieve login, name, and role.
        if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND
            isset($_SESSION['role']))   {
            $login = $_SESSION['login'];
            $name = $_SESSION['name'];
            $role = $_SESSION['role'];
        }
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
            <div class="LogoBox">
                <img style="float: right; padding: 5%" src="<?= BASE_URL ?>/www/img/ran.png" alt="ran's picture">
                <h1>&nbsp&nbsp&nbsp Ran's</h1>
                <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Racin</h1>
                <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Racer's</h1>

            </div>
        </div>
        <hr class="hr">
        <!--This is the Navigation Tab -->
        <div class="NavBar" id="flex">
            <div class="NavBar" id="style" >
                <table class="NavBar">
                    <tr>
                        <th class="NavBar"><a href="<?= BASE_URL ?>/index.php/welcome/index/">Home</a></th>
                        <th class="NavBar"><a href="<?= BASE_URL?>/index.php/car/index/">Cars </a></th>
                        <?php
                            if ($login==null){
                             ?><th class="NavBar"><a href="<?= BASE_URL?>/index.php/user/login/">Login</th><?php
                            }else{
                                ?><th class="NavBar"><a href="<?= BASE_URL?>/index.php/user/logout/">Logout</th><?php
                            }
                        ?>

                        <th class="NavBar"><a href="<?= BASE_URL?>/index.php/about/index">About</a></th>
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