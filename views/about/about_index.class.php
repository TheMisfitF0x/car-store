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
<p>hello</p>
<?php

        parent::displayFooter();
    }
}
        ?>