$(document).ready(function(){
    var ajaxUrl = '/local/ajax/updateUserProfile.php';

    // алерт
    function openAlert(message, state = "default"){
        // Вызывает сообщение для оповещение клиента
        // default - Обычное сообщение
        // success - Удачное сообщение
        // unsuccess - Неудачное сообщение
        openPopup("popup-overlay-alert");
        $('#messageToUser').text(message);
        switch(state){
            case "unsuccess":               
                $('#messageToUser').prepend('<i class="bi bi-patch-exclamation"></i>');         
                $('#messageToUser').css('color','red'); 
                break;
            case "success":
                $('#messageToUser').prepend('<i class="bi bi-patch-check"></i>');         
                $('#messageToUser').css('color','green'); 
                break;
            default:
                break;
        }
    }
    
    $('#savePhone').on('click', function(){
        let phone = $('#phoneSettings').val();
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {'phone': phone},
            success: function(response){
                answer = JSON.parse(response);
                if (answer.status == 'success') {
                    openAlert('Изменения успешно сохранены', 'success');
                    $('.info.phone').text(phone);
                    $('#phoneSettings').val('');
                } else {
                    openAlert('К сожалению данные сохранить не удалось, попробуйте повторить попытку позже!', 'unsuccess');
                }
            },
            error: function(answer){
                console.log(answer);
            }
        })
    })
    
    $('#saveEmail').on('click', function(){
        let email = $('#emailSettings').val();
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {'email': email},
            success: function(response){
                answer = JSON.parse(response);
                if (answer.status == 'success') {
                    openAlert('Изменения успешно сохранены', 'success');
                    $('.info.email').text(email);
                    $('#emailSettings').val('');
                } else {
                    openAlert('К сожалению данные сохранить не удалось, попробуйте повторить попытку позже!', 'unsuccess');
                }
            },
            error: function(answer){
                console.log(answer);
            }
        })
    })
    $('#savePassword').on('click', function(){
        let password = $('#passwordSettings').val();
        let confirmPassword = $('#confirmPasswordSettings').val();
        if (password != confirmPassword) {
            openAlert('Введённые пароли не совпадают!\n Пожалуйста введите одинаковые пароли!', 'unsuccess');
            return;
        }
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {'password': password, 'confirmPassword': confirmPassword},
            success: function(response){
                answer = JSON.parse(response);
                if (answer.status == 'success') {
                    openAlert('Изменения успешно сохранены', 'success');
                    $('#passwordSettings').val('');
                    $('#confirmPasswordSettings').val('');
                } else {
                    openAlert('К сожалению данные сохранить не удалось, попробуйте повторить попытку позже!', 'unsuccess');
                }
            },
            error: function(answer){
                console.log(answer);
            }
        })
    })
})
