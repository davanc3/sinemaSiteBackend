<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Cinema\Helpers\FilmsHelper;
use \Bitrix\Main\Application; 

class FilmsComponent extends CBitrixComponent
{
    /**
     * executeComponent
     * 
     * @return void
     */
    function executeComponent () {
        $request = Application::getInstance()->getContext()->getRequest();
        $genre = $request->get('genre');
        $date = $request->get('date');
        $state = $request->get('state');

        if(isset($state)) {
            $this->arResult = FilmsHelper::getFilms($genre, $date, $state);
            $this->includeComponentTemplate();
            die;
        }
        if (isset($date)) {
            $this->arResult = FilmsHelper::getFilms($genre, $date);
            $this->includeComponentTemplate();
            die;
        }
        if (isset($genre)) {
            $this->arResult = FilmsHelper::getFilms($genre);
            $this->includeComponentTemplate();
            die;
        }

        $componentTemplate = $this->getTemplateName();
        if ($this->InitComponentTemplate($componentTemplate)) {
            $this->ShowComponentTemplate();
        } else {
            @define('ERROR_404', 'Y');
        }

        $this->arResult = FilmsHelper::getFilms();

        $this->includeComponentTemplate();
    }
}