// Очищение полей формы с фильтром.
$(function(){
    $('#reset').click(function(){
        $('#filtr').each(function(){
            this.reset();
        });
        $('#date').val(new Date().toISOString().substring(0, 10));   
        $('#info-title').text("Фильмы на сегодня:"); 
    });

});

$(document).ready( function() {
    // Изменение даты на сегодня и блокирование всех дат которые были до
    let date = new Date().toISOString().substring(0, 10);
    $('#date').attr('min',date);
    $('#date').val(date);

    // Popup
    $('#popup-open').click(function(){    
        $('#popup-overlay').fadeIn();
        // отключить возможно нажатия на задний фон
        $('#popup-overlay').addClass('disabled');
        // убирает меню на задний фон 
        $('.navbar-default').css('z-index','0');

    });
    $('#popup-close').click(function(){
        $('#popup-overlay').fadeOut();     
        // возврощает меню  
        $('.navbar-default').css('z-index','1030');
    });
});

// Добавление текста в info-title. На какой день отображаются фильмы 
$('#date').change(function(){
    let date = new Date().toISOString().substring(0, 10);
    let dateForm = $('#date').val();
    if(date !== dateForm)
        $('#info-title').text("Фильмы на " + dateForm +":");
    else         
        $('#info-title').text("Фильмы на сегодня:");
});

