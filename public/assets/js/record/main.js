$(document).on('ready',principal);

function principal()
{
    $('#send').on('click', sendEmail);
    
}

function sendEmail() {
    event.preventDefault();
    var url = $('#send').data('url');
    $.ajax({
        url: url,
        dataType: "JSON"
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
