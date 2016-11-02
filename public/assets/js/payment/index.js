$(document).on('ready',principal);

var $modalRegister;
var $modalDelete;
var $modalDocument;

function principal()
{
    $modalRegister = $('#modalRegister');
    $modalDocument   = $('#modalDocument');
    $modalDelete   = $('#modalDelete');

    $('[data-register]').on('click',modalRegister);
    $('[data-document]').on('click',modalDocument);
    $('[data-delete]').on('click',modalDelete);

    $('#formRegister').on('submit',payment);
    $('#formDelete').on('submit',payment);
}

function modalRegister()
{
    $modalRegister.modal('show');
}

function modalDocument()
{
    $('#document').html('');
    var document = $(this).data('document');
    $('#document').append('<img src="assets/img/payment/'+document+'" class="img">');
    $modalDocument.modal('show');
}


function modalDelete()
{
    var entity = $(this).data('entity');
    var id = $(this).data('delete');
    var operation = $(this).data('operation');

    $modalDelete.find('[name=id]').val(id);
    $modalDelete.find('[name=entity]').val(entity);
    $modalDelete.find('[name=operation]').val(operation);

    $modalDelete.modal('show');
}

function payment()
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