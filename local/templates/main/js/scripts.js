$(function(){
    $('#reset').click(function(){
        $('#filtr').each(function(){
            this.reset();
        });

        $('#date').val(new Date().toISOString().substring(0, 10));    
    });

});
$(document).ready( function() {
    let date = new Date().toISOString().substring(0, 10);
    $('#date').attr('min',date);
    $('#date').val(date);
});