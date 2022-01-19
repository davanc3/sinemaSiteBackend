$(document).ready(function(){
    $('#form-registration-login').submit(function(event){
        var urlRegistration = "/local/ajax/registrationUsers.php";
        event.preventDefault();
        let login = $('#loginReg').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let password = $('#passwordReg').val();
        let confirmPassword = $('#confirmPassword').val();

        if (password != confirmPassword) {
            $('#message-reg').text('Введённые пароли не совпадают');
            $('.error-message.reg').show();
            return;
        } else {
            $('.error-message.reg').hide();
        }
        $.ajax({
            url: urlRegistration,
            type: 'POST',
            data: {'login': login, 'password': password, 'email': email, 'phone': phone},
            success: function(response) {
                answer = JSON.parse(response);
                if (answer.status == "success") {
                    location.reload();
                } else {
                    $('#message-reg').text('К сожалению при попытке регистрации произошла ошибка, попробуйте позже!');
                    $('.error-message.reg').show();
                }
            },
            error: function(answer) {
                console.log(answer);
            }
        })
    })

    $('#form-auth-login').submit(function(e){
        var urlRegistration = "/local/ajax/authUsers.php";
        e.preventDefault();
        let login = $('#loginAuth').val();
        let password = $('#passwordAuth').val();
        $.ajax({
            url: urlRegistration,
            type: 'POST',
            data: {'login': login, 'password': password},
            success: function(response) {
                answer = JSON.parse(response);
                if (answer.status == "success") {
                    location.reload();
                } else {
                    $('#message').text('Неверный логин или пароль, попробуйте ещё раз');
                    $('.error-message').show();
                }
            },
            error: function(answer) {
                console.log(answer);
            }
        })
    })
})