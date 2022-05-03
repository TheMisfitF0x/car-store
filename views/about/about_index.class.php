<?php
/**
 * Author:Evan Minor
 * Date: 5/3/2022
 * File: about_index.class.php
 * Description:
 */

class AboutIndex extends IndexView{
    public function display(){
        //display page header
        parent::displayHeader("About");

?>
<div class="ListTitle" id="TitleBorder">
    <div>
        <h2 class="ListTitle" id="TitleText">About Ran's Racin Racer's</h2>
    </div>
</div>
        <div class="viewCarsTable" id="CarViewBorder">
            <div class="aboutRans">
                <p class="aboutRans">    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp In the 1980's <strong>Ran</strong> started his adventure!  With a little help from his parents he was finally able to afford his own lot in <strong> Indianapolis!</strong> Ever since then <strong>Ran</strong> prides himself on selling the best <i>Unique</i> cars in the state!  We Challenge you to come find a better deal on your next automotive purchase!</p>
            </div>
            <img class="aboutRans" src="../../www/img/MercedesBenzMI.jpg">
        </div>

<?php

        parent::displayFooter();
    }
}
        ?>