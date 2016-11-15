$(document).on('ready',principal);

var modalRegister;
var modalDelete;
function principal()
{
    modalRegister = $('#modalRegister');
    modalDelete   = $('#modalDelete');

    $('[data-register]').on('click',showModalRegister);
    $('[data-delete]').on('click',showModalDelete);

    $('#formRegister').on('submit',milestone);
    $('#formDelete').on('submit',milestone);
}

function showModalRegister()
{
    modalRegister.modal('show');
}

function showModalDelete()
{
    var id   = $(this).data('delete');
    var name = $(this).data('name');
    var date = $(this).data('date');
    var time = $(this).data('time');

    modalDelete.find('[name=id]').val(id);
    modalDelete.find('[name=name]').val(name);
    modalDelete.find('[name=date_time]').val(date+'     '+time);
    modalDelete.modal('show');
}

function milestone()
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
            if(response.error)
                alert(response.message);
            else{
                alert(response.message);
                setTimeout(function(){
                    location.reload();
                }, 500);
            }
        });
}

