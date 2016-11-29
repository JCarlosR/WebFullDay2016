$(document).on('ready',principal);

function principal()
{
    $modalNew = $('#new-modal');
    $modalEdit = $('#edit-modal');
    $('#new-admin').on('click', showNewModal);
    $('[data-edit]').on('click', showEditModal);
    $('#btnSave').on('click', saveItinerary);
    $('#btnEditar').on('click', editItinerary);
}

var $modalNew;
var $modalEdit;

function showNewModal() {
    $modalNew.modal('show');
}

function saveItinerary() {
    event.preventDefault();
    var data = $('#form-new').serializeArray();
    console.log(data);
    var url = $(this).data('url');
    console.log(data);
    $.ajax({
        url: url,
        data: data,
        method: 'POST'
    })
        .done(function( response ) {
            console.log(response);
            if(response.error) {
                console.log(response.message);
                alert(response.message);
            }else{
                alert(response.message);
                location.reload();
            }

        });
}

function showEditModal() {

    var id = $(this).data('id');
    $modalEdit.find('[name="id-e"]').val(id);

    var name = $(this).data('name');
    $modalEdit.find('[name="name-e"]').val(name);

    var email = $(this).data('email');
    $modalEdit.find('[name="email-e"]').val(email);

    $modalEdit.modal('show');
}

function editItinerary() {
    event.preventDefault();
    var data = $('#form-edit').serializeArray();
    console.log(data);
    var url = $(this).data('url');
    console.log(data);
    $.ajax({
        url: url,
        data: data,
        method: 'POST'
    })
        .done(function( response ) {
            console.log(response);
            if(response.error) {
                console.log(response.message);
                alert(response.message);
            }else{
                alert(response.message);
                location.reload();
            }

        });
}

