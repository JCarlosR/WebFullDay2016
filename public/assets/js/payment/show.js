$(document).on('ready',principal);

var $modalDelete;

function principal()
{
    $modalDelete   = $('#modalDelete');
    $('[data-delete]').on('click',modalDelete);
    $('#formDelete').on('submit',certificate);
}

function modalDelete()
{
    var id = $(this).data('delete');
    var name = $(this).data('name');
    var event = $(this).data('event');
    $('#null_message').html('');
    var null_message = '¿Está seguro que desea desactivar la suscripción del siguiente certificado del '+event+'?';
    $('#null_message').text(null_message);
    $modalDelete.find('[name=id]').val(id);
    $modalDelete.find('[name=name]').val('Certificado de '+name);
    $modalDelete.modal('show');
}

function certificate()
{
    event.preventDefault();
    $.ajax({
            url: $(this).attr("action"),
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
                    location.href = '../pagos';
                }
                else
                    alert(response.message);
            }
            else{
                alert(response.message);
                setTimeout(function(){
                    location.reload();
                }, 500);
            }
        });
}
