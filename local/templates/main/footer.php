        <!-- popup registration -->
        <div class="overlay" id="popup-overlay-registration">
        <div class="popup">
            <div class="popup-content">
                <h1>Регистрация</h1>
                <form method="post" class="form-registration-login" id="form-registration-login">
                    <div class="error-message reg">
                        <h5 id="message-reg">Сообщение об ошибки</h5>
                    </div>
                    <div class="warp-input">
                        <div class="bi bi-person"></div>
                        <input id="loginReg" type="text" placeholder="Логин" pattern="[a-zA-Z0-9]+" title="Можно использовать только комбинации букв английского алфавита и цифр" required>
                    </div>
                    <div class="warp-input">
                        <div class="bi bi-lock"></div>
                        <input id="passwordReg" type="password" placeholder="Пароль" required>
                    </div>
                    <div class="warp-input">
                        <div class="bi bi-lock"></div>
                        <input id="confirmPassword" type="password" placeholder="Подтвердить пароль" required>
                    </div>
                    <div class="warp-input">
                        <div class="bi bi-envelope"></div>
                        <input id="email" type="email" placeholder="Почта" required>
                    </div>                   
                    <div class="warp-input">
                        <div class="bi bi-phone"></div>
                        <input id="phone" type="tel" id="phone" placeholder="Телефон" title="Введите правильный номер телефона" required>
                    </div>
                    <input type="submit" value="Регистрация">
                </form>
            </div>            
            <div class="bi bi-x popup-close" id="popup-close-registration"></div> 
        </div>
    </div>
    <!-- popup login -->
    <div class="overlay" id="popup-overlay-login">
        <div class="popup">
            <div class="popup-content">
                <h1>Авторизация</h1>
                <div class="error-message">
                    <h5 id="message">Сообщение об ошибки</h5>
                </div>
                <form method="post" class="form-registration-login" id="form-auth-login">
                    <div class="warp-input">
                        <div class="bi bi-person"></div>
                        <input id="loginAuth" type="text" placeholder="Логин" pattern="[a-zA-Z0-9]+" title="Можно использовать только комбинации букв английского алфавита и цифр" required>
                    </div>
                    <div class="warp-input">
                        <div class="bi bi-lock"></div>
                        <input id="passwordAuth" type="password" placeholder="Пароль" required>
                    </div>
                    <input type="submit" value="Войти">
                    <div style="margin-top: 10px;">
                        <a id="redirect-registration">Регистрация</a>
                    </div>
                </form>
            </div>            
            <div class="bi bi-x popup-close" id="popup-close-login"></div> 
        </div>
    </div>
    <!-- Popup -->
    <div class="overlay" id="popup-overlay-alert">
        <div class="popup">
            <div class="popup-content">
                <div class="alert" id="alert">
                    <div id="messageToUser"> </div>
                    <div class="alert-ok"><a id="alert-ok">OK</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>

    </footer>
</body>
</html>