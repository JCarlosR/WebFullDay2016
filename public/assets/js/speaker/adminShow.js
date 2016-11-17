$(document).on('ready',principal);
var modalRegister;
var modalShowImage;
var modalEdit;
var modalDelete;

function principal()
{
    $('.mytable').footable();
    modalRegister  = $('#modalRegister');
    modalShowImage = $('#modalShowImage');
    modalEdit      = $('#modalEdit');
    modalDelete    = $('#modalDelete');

    $('[data-register]').on('click',showModalRegister);
    $('[data-show]').on('click',showModalImage);
    $('[data-edit]').on('click',showModalEdit);
    $('[data-delete]').on('click',showModalDelete);

    $('#formRegister').on('submit',ponent);
    $('#formEdit').on('submit',ponent);
    $('#formDelete').on('submit',ponent);
}

function showModalRegister()
{
    modalRegister.modal('show');
}

function showModalImage()
{
    var name = $(this).data('name');
    var image = $(this).data('image');

    modalShowImage.find('[name=name]').val(name);
    var asset = 'assets/images/'+image;
    $('#image').attr('src',public_path()+asset);

    modalShowImage.modal('show');
}

function showModalEdit()
{
    var id = $(this).data('edit');
    var name = $(this).data('name');
    var email = $(this).data('email');
    var profile = $(this).data('profile');
    var company = $(this).data('company');
    var position = $(this).data('position');
    var description = $(this).data('description');

    modalEdit.find('[name=id]').val(id);
    modalEdit.find('[name=name]').val(name);
    modalEdit.find('[name=email]').val(email);
    modalEdit.find('[name=company]').val(company);
    modalEdit.find('[name=profile]').val(profile);
    modalEdit.find('[name=position]').val(position);
    modalEdit.find('[name=description]').val(description);

    modalEdit.modal('show');
}

function showModalDelete()
{
    var id = $(this).data('delete');
    var name = $(this).data('name');

    modalDelete.find('[name=id]').val(id);
    modalDelete.find('[name=name]').val(name);

    modalDelete.modal('show');
}

function ponent()
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

function public_path() {
    var path = location.href;
    var the_path = '';
    for (var i = 0; i < path.length; i++){
        if (path[i] == 'p' && path[i+1] == 'u' && path[i+2] == 'b' && path[i+3] == 'l' && path[i+4] == 'i' && path[i+5] == 'c')
            return the_path+'public/';
        the_path += path[i];
    }
}
