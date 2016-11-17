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
    var certificate = $(this).data('certificate');
    $modalRegister.find('[name=certificate]').val('Certificado de '+certificate);
    $modalRegister.modal('show');

    $('#amount').on('change',function(){
        if($(this).val()<1) {
            alert('Ingrese un monto positivo');
            $(this).val(null);
        }
    });

    $('#operation').on('change',function(){
        if($(this).val()<1) {
            alert('Ingrese un número de operación positivo');
            $(this).val(null);
        }
    });

    $('#payment_file').on('change', function() {
        if(this.files[0].size > 3145728)
        {
            alert('El tamaño del archivo debe ser menor o igual de 3MB');
            $('#payment_file').val(null);
        }
    });
}

function modalDocument()
{
    var document = $(this).data('document');
    var path = $('#path').attr('data-path');
    var src = path+'assets/img/payment/'+document;
    $('#document').attr('src',src);

    $modalDocument.modal('show');
}

function modalDelete()
{
    var id = $(this).data('delete');
    var entity = $(this).data('entity');
    var amount = $(this).data('amount');
    var operation = $(this).data('operation');

    $modalDelete.find('[name=id]').val(id);
    $modalDelete.find('[name=entity]').val(entity);
    $modalDelete.find('[name=amount]').val('S/. '+amount);
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

