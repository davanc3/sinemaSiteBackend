<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

use \Bitrix\Main\Application; 

class ByeTickets extends CBitrixComponent
{
    /**
     * executeComponent
     * 
     * @return void
     */
    function executeComponent ()
    {
        // $request = Application::getInstance()->getContext()->getRequest();
        // $seance = $request->get('seance');

        // if (isset($seance)) {
        //     $this->arResult = [
        //         'SEANCE' => $seance
        //     ];
        //     $this->includeComponentTemplate();
        //     die();
        // }
        
        $componentTemplate = $this->getTemplateName();
        if ($this->InitComponentTemplate($componentTemplate)) {
            $this->ShowComponentTemplate();
        } else {
            @define('ERROR_404', 'Y');
        }

        $this->arResult = [];
        $this->includeComponentTemplate();
    }
}