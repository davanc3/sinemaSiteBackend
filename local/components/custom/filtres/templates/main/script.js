$(document).ready(function(){
    var ajaxUrl = '/';
    
    $('#stateFilms').on('change', function(){
        let state = this.value;
        let genre = document.getElementById('genre').value;
        let data = {'state': state, 'genre': genre};

        if (state == 'soon') {
            document.getElementById('date').setAttribute('disabled', 'disabled');
        } else {
            document.getElementById('date').removeAttribute('disabled');
            data.date = document.getElementById('date').value;
        }

        $.ajax({
            url: '/',
            type: 'POST',
            data: data,
            success:
                function(response){
                    $('.container-films').html(response);
                },
            error: 
                function(answer){
                    console.log(answer);
                }
        })
    });
    
    $('#date').on('change', function(){
        let date = this.value;
        let genre = document.getElementById('genre').value;

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {'date': date, 'genre': genre},
            success: function(response){
                $('.container-films').html(response);
            },
            error: function(answer){
                alert(answer);
            }
        })
    });

    $('#genre').on('change', function(){
        let state = document.getElementById('stateFilms').value;
        let genre = this.value;
        let data = {'state': state, 'genre': genre};
        if (state == 'active') {
            let date = document.getElementById('date').value;
            data.date = date;
        }

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                $('.container-films').html(response);
            },
            error: function(answer){
                console.log(answer);
            }
        })
    });

    $('#reset').click(function(){
        let genre = '-1';

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {'genre': genre},
            success: function(response){
                console.log(response);
                $('.container-films').html(response);
            },
            error: function(answer){
                console.log(answer);
            }
        })
    });
})
