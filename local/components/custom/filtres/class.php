<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Cinema\Helpers\FilmsHelper;

class FilmsFiltres extends CBitrixComponent
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

        

        $this->arResult = FilmsHelper::getFilmsGenres();

        $this->includeComponentTemplate();
    }
}