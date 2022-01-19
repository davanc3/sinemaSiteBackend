$(document).ready(function(){
    $('#seanceSelect').on('change', function(){
        let ajaxUrl = $('#curUrl').val();
        let seance = this.value;
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {'seance': seance},
            success: function(response){
                let result = $(response);
                let elements = result.find('.seancePlace');
                $('.priceForTickets').hide();
                elements.each(function(){
                    $(this).on('change', function(){
                        onChangeCheckbox();
                    })
                })
                $('.booking-table').html(result);
            }
        })
    })

    $('.seancePlace').on('change', function(){
        onChangeCheckbox();
    })
    $('#buyTickets').on('click', function(event){
        event.preventDefault();
        let ajaxUrl = '/local/ajax/buyTicket.php';
        let elements = $('.seancePlace:checked');
        if (elements.length == 0) {
            closePopup('popup-overlay');
            openAlert('Чтобы купить билеты, для начала надо выбрать места, вернитесь на форму и не допускайте таких ошибок в будущем))', 'unsuccess');
            return;
        }
        let seance = $('#seanceSelect').val();
        elements.each(function(){
            let checkbox = $(this);
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {'row': $(this).data('row'), 'place': $(this).data('place'), 'seance': seance},
                success: function(response){
                    let answer = JSON.parse(response);
                    if (answer.status == 'success') {
                        $('.priceForTickets').hide();
                        checkbox.attr('disabled', 'disabled');
                        checkbox.removeAttr('checked');
                        closePopup('popup-overlay');
                        openAlert('Билет успешно куплен, можете найти его в своём личном кабиненте!', 'success');
                    } else if (answer.status == 'unregister') {
                        closePopup('popup-overlay');
                        openAlert('Для того, чтобы купить билет, необходимо зарегестрироваться или авторизоваться на нашем сайте!', 'unsuccess');
                    } else if (answer.status == 'error') {
                        closePopup('popup-overlay');
                        openAlert('К сожалению, при покупке билета, что-то пошло не так, приносим свои извинения и попробуйте попытку позже!', 'unsuccess');
                    } 
                }
            })
        })
    })
})

function onChangeCheckbox(){
    if ($('.seancePlace:checked').length <= 0){
        $('.priceForTickets').hide();
    } else {
        if ($('.seancePlace:checked').length == 1) {
            var text = 'билет';
        } else if ($('.seancePlace:checked').length > 1 && $('.seancePlace:checked').length < 5) {
            var text = 'билета';
        } else {
            var text = 'билетов';
        }
        $('.priceForTickets').text($('.seancePlace:checked').length + ' ' + text + ': ' + ($('#seancePrice').text() * $('.seancePlace:checked').length)  + ' руб.');
        $('.priceForTickets').show();
    }
}
