$(document).on('ready',principal);

function principal(){
    $btnsolicitar = $('#solicitar');
    $btnsolicitar.on('click',solicitar);
}

function solicitar()
{
    var data =
    {
        '_token' : $('#token').val(),
        'usuarioid' : $(this).attr('data-id')
    };
    var url = $(this).data('url');
    $.ajax({
        url: url,
        data: data,
        method: 'POST'
    })
        .done(function( response ) {
            console.log(response);
            if(response.error) {
                console.log(response.message);
                alert(response.message);
            }else{
                alert(response.message);
                location.reload();
            }

        });

}