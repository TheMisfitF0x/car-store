<?php

class CarUpdate extends IndexView
{
    public function display($confirm){
        //display page header
        parent::displayHeader("Success");?>
        <div class="ListTitle" id="TitleBorder">
            <div>
                <h2 class="ListTitle" id="TitleText"><?=$confirm ?></h2>
            </div>
        </div>
<?php
        self::displayFooter();
    }
}?>