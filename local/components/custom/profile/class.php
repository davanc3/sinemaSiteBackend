<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Cinema\Helpers\ProfileHelper;

class UserProfile extends CBitrixComponent
{
    /**
     * executeComponent
     * 
     * @return void
     */
    function executeComponent ()
    {
        $componentTemplate = $this->getTemplateName();
        if ($this->InitComponentTemplate($componentTemplate)) {
            $this->ShowComponentTemplate();
        } else {
            @define('ERROR_404', 'Y');
        }

        global $USER;

        $this->arResult = ProfileHelper::getInfoUserById($USER->GetID());

        $this->includeComponentTemplate();
    }
}