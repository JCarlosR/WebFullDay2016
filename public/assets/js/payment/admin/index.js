$(document).on('ready',principal);

var $modalRegister;

function principal()
{
    $modalRegister = $('#modalRegister');

    $('[data-certificate]').on('click',modalRegister);
    $('#formRegister').on('submit',payment);
}

function modalRegister()
{
    var solicitude = $(this).data('solicitude');
    var certificate = $(this).data('certificate');
    var assistant = $(this).data('assistant');

    $modalRegister.find('[name=solicitude_id]').val(solicitude);
    $modalRegister.find('[name=certificate]').val('Certificado de '+certificate);
    $modalRegister.find('[name=assistant]').val(assistant);
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
                    location.href = '../'+response.page;
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