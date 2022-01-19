<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание");
?>
<!-- MainContent -->
    <div class="container-fluid margin">
        <!--Контейнер с фильмами-->        
        <div class="container-schedule">
            <?php
                $APPLICATION->IncludeComponent(
                    'custom:filtres',
                    'timetable',
                    false,
                    []
                );
            ?>    
            <div class="container-films">
                <!--Карточка фильма-->  
                <a href="" class="film-card">
                    <div class="film-title-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cover.jpg" alt="">
                    </div>
                    <div class="film-description">
                        <h1 class="film-title">
                            <span class="film-title">King’s Man: Начало</span>
                        </h1>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla suscipit blanditiis necessitatibus commodi atque voluptatibus accusamus nostrum vero! Unde, earum. Vitae, sed provident. Quos repellat eos quidem numquam officia?</p>
                        </div>
                    </div>
                </a>
                
                <div class="pagination">
                    <a href="#">«</a>
                    <a href="#"class="active">1</a>
                    <a href="#" >2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">»</a>
                </div>
            </div>
        </div>
    </div>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
