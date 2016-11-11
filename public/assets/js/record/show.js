$(document).on('ready',principal);

function principal()
{
    $modalNew = $('#new-modal');
    $('#new-paper').on('click', showNewModal);
    
}

var $modalNew;

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

function showNewModal() {
    $modalNew.modal('show');
}