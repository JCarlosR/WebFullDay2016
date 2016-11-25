$(document).on('ready',principal);

var $modalRegister;

function principal()
{
    $modalRegister = $('#modalRegister');

    $('body').on('click','#solicitude',modalRegister);
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

function verifica(id_solicitude,concept,state)
{   
    var path = $('#path').attr('data-path');
    $('#cagaPagos').empty();
    var concepto = document.getElementById("concept");
    concepto.value="Certificado "+concept;
    var dataString = 'id_soli='+id_solicitude;
        $.ajax({
            type: "GET",
            url:  $("#formularioVerificar").attr("action"),
            data: dataString,
            success: function(data) {
                var nuevaFila="";
                var payment=data.payment;
                for (var i=0; i<payment.length; i++){
                    nuevaFila+="<tr>";
                    nuevaFila+='<td>'+payment[i].entity+'</td>';
                    nuevaFila+='<td align="center">'+payment[i].operation+'</td>';
                    nuevaFila+='<td align="center">'+payment[i].operation_date+'</td>';
                    nuevaFila+='<td align="center"> S/.'+payment[i].amount+'.00</td>';
                    var car="'"+payment[i].payment_file+"'";
                    nuevaFila+='<td><a  onClick="verboucher('+car+');" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-search"></i></a> <a download href="'+path+'assets/img/payment/'+payment[i].payment_file+'" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-arrow-down"></i></a></td>';
                    nuevaFila+="</tr>";
                }
                $("#cagaPagos").append(nuevaFila);
            }
        });
    $('#botton').empty();
    if (state==0){
        veriHtml='<button disabled type="button" class="btn btn-success" data-dismiss="modal">Verificar</button>';
        veriHtml+=' <button type="button" onclick="limpiar();" class="btn btn-danger" data-dismiss="modal">Cerrar</button>';
        $("#botton").append(veriHtml);
    }else{
        veriHtml='<a  onClick="actualizaEstate('+id_solicitude+');limpiar();" type="button" class="btn btn-success" data-dismiss="modal">Verificar</a>';
        veriHtml+=' <button type="button" onclick="limpiar();" class="btn btn-danger" data-dismiss="modal">Cerrar</button>';
        $("#botton").append(veriHtml);
    }
    $('#ModalVerifica').modal('show');
}

function verboucher(name_image){
    var path = $('#path').attr('data-path');
    var imagen = document.getElementById("imageBoucher");
    imagen.src=path+"assets/img/payment/"+name_image;
}
function limpiar(){
    var imagen = document.getElementById("imageBoucher");
    imagen.src="";
}
function actualizaEstate(id_solicitud){
    var dataString = 'id_soli='+id_solicitud;
        $.ajax({
            type: "GET",
            url:  $("#actualizaVerificar").attr("action"),
            data: dataString,
            success: function(data) {

            }
        });
    window.location.reload(true); 
}