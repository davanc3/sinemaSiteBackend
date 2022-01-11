<?php
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Кинотеатр \"Общежитие №6\"");
?>

<!-- MainContent -->
<div class="container-fluid">
        <wrapper>
            <div id="dws-slider" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Показатели-->
                <ol class="carousel-indicators">
                    <li data-target="#dws-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#dws-slider" data-slide-to="1"></li>
                </ol>        
                <!--Обертка для слайдов-->
                <div class="carousel-inner" role="listbox">
                    <div class="item active"><img src="<?= SITE_TEMPLATE_PATH ?>/images/spider-man.jpg"  alt="Картинка 1">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Человек-паук: Нет пути домой</h3>
                            <p style="text-overflow: ellipsis;">Жизнь и репутация Питера Паркера оказываются под угрозой, поскольку Мистерио раскрыл всему миру тайну личности Человека-паука.
                                 Пытаясь исправить ситуацию, Питер обращается за помощью к Стивену Стрэнджу, но вскоре всё становится намного опаснее.</p>
                        </div>
                    </div>
                    <div class="item"><img src="<?= SITE_TEMPLATE_PATH ?>/images/bogatyr1.jpg"  alt="Картинка 1">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Последний богатырь</h3>
                            <p style="text-overflow: ellipsis;">Обычный парень Иван по воле случая переносится из современной Москвы в фантастическую страну Белогорье.
                                 В этом параллельном мире живут герои русских сказок, волшебство — неотъемлемая часть быта, а спорные вопросы решаются битвой на богатырских мечах.</p>
                        </div>
                    </div>
                </div>        
                <!--Элементы управления-->
                <a class="left carousel-control" href="#dws-slider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#dws-slider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </wrapper>
        <div>
            <div class="container-filtr">
                <form action="" id='filtr' class="filtr">
                    <select name="" id="stateFilms">
                        <option value="">Уже в кино</option>
                        <option value="">Скоро в кино</option>
                    </select>                
                    <input type="date" id="date" min="">
                    <select name="" id="genre ">
                        <option value="">Жанр</option>
                    </select>
                    <a class="reset" id="reset">Сбросить</a>
                </form>
            </div>
            <h2>Фильмы на сегодня:</h2>
            <div class="container-films">
                <a href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cover.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2Зверопой 2Зверопой 2Зверопой </span>
                    </p>
                </a>
                <a  href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/bogatyr1.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2</span>
                    </p>
                </a>
                <a href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cover.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2Зверопой 2Зверопой 2Зверопой </span>
                    </p>
                </a>
                <a  href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/bogatyr1.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2</span>
                    </p>
                </a>
                <a href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cover.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2Зверопой 2Зверопой 2Зверопой </span>
                    </p>
                </a>
                <a  href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/bogatyr1.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2</span>
                    </p>
                </a>
                <a href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cover.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2Зверопой 2Зверопой 2Зверопой </span>
                    </p>
                </a>
                <a  href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/bogatyr1.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2</span>
                    </p>
                </a>
                <a href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cover.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2Зверопой 2Зверопой 2Зверопой </span>
                    </p>
                </a>
                <a  href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/bogatyr1.jpg" alt="">
                    </div>
                    <p class="film-description">
                        <span class="film-title">Зверопой 2</span>
                    </p>
                </a>
            </div>
        </div>
    </div>
	
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>