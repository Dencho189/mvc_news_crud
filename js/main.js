$(document).ready(function () {

    $('#form_create').submit(function () {
        var data = $('#form_create').serialize();
        var url = 'news/create';
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(msg){
                if (msg == 'ok'){
                    window.location =  'http://' + location.hostname + '/' ;
                }else{
                    alert('error');
                }
            }
        });
        return false;
    });

    $('.delete').bind('click',function () {
        var key = $(this).attr('data-key');
        var url = 'news/delete';
        $.ajax({
            type: "POST",
            url: url,
            data: {'key':key},
            success: function(msg){
                if (msg == 'ok'){
                    window.location =  'http://' + location.hostname + '/' ;
                }else{
                    alert('error');
                }
            }
        });
        return false;
    });

    $('.update').bind('click',function () {
        var key = $(this).attr('data-key');

        $('#up_date').val($('#date_'+key).text());
        $('#up_title').val($('#title_'+key).text());
        $('#up_annotation').val($('#annotation_'+key).text());
        $('#up_text').val($('#text_'+key).text());
        $('#up_author').val($('#author_'+key).text());
        $('#key').val(key);

        $('.modal').show();
    });

    $('.close').bind('click', function () {
        $('.modal').hide();
    });
    
    $('#form_update').submit(function () {

        var data = $('#form_update').serialize();
        var url = 'news/update';
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(msg){
                console.log(msg)
                if (msg == 'ok'){
                    $('.modal').hide();
                    window.location =  'http://' + location.hostname + '/' ;
                }else{
                    alert('error');
                }
            }
        });
        return false;
    })

    



});