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
            </script>
        </head>
        <body>

        <!--This is the header for every page-->
        <div class="header">
            <h1>Ran's Roadsters</h1>
            <hr style="border-top: 2px solid black;border-bottom: 2px solid black">
        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>

        <div class="footer">
            <hr style="border-top: 2px solid black;border-bottom: 2px solid black">
            <p>&copy 2022 Ran's Racing Racers. All Rights Reserved</p>
        </div>

        </body>
        </html>
        <?php
    } //end of displayFooter function
}