<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
?>
    <!-- MainContent -->
    <div class="container-fluid">
        <div class="container-profile">
            <div class="container-settings">
                <ul>
                    <li>                        
                        <a onclick="openItem('history-order')">                            
                            <i class="bi bi-card-list"></i>
                            История заказов
                        </a>
                    </li>
                    <li>
                        <a onclick="openItem('settings')">                            
                            <i class="bi bi-gear"></i>
                            Настройки
                        </a>
                    </li>
                    <li>
                        <a href="/logout.php">
                            <i class="bi bi-box-arrow-left"></i>
                            Выход
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container-info-profile">
                <?php
                    $APPLICATION->includeComponent(
                        'custom:profile',
                        'main',
                        false,
                        []
                    );
                ?>
            </div>
        </div>        
    </div>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
