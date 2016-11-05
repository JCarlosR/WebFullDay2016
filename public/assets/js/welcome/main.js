$(document).on('ready',principal);

function principal()
{
    $('#form').on('submit', sendEmail);
    
}

function sendEmail() {
    event.preventDefault();
    var url = $('#send').data('url');
    $.ajax({
        url: url,
        data: new FormData(this),
        dataType: "JSON",
        processData: false,
        contentType: false,
        method: 'POST'
    })
        .done(function( response ) {
            if(response.error){
                if(response.refreshing)
                {
                    alert(response.message);
                    
                }
                else
                    alert(response.message);
            }
            else{
                alert(response.message);
                setTimeout(function(){
                    location.reload();
                }, 100);
            }
        });
}
