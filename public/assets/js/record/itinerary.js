$(document).on('ready',principal);

function principal()
{
    $modalNew = $('#new-modal');
    $modalEdit = $('#edit-modal');
    $modalDelete = $('#delete-modal');
    $('#new-itinerary').on('click', showNewModal);
    $('[data-edit]').on('click', showEditModal);
    $('[data-delete]').on('click', showDeleteModal);
    $('#btnSave').on('click', saveItinerary);
    $('#btnEditar').on('click', editItinerary);
    $('#btnEliminar').on('click', deleteItinerary);
}

var $modalNew;
var $modalEdit;
var $modalDelete;

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

    var type = $(this).data('type');
    $modalEdit.find('[name="type-e"]').val(type);

    var description = $(this).data('description');
    $modalEdit.find('[name="description-e"]').val(description);

    var start = $(this).data('start');
    $modalEdit.find('[name="start-e"]').val(start);

    var end = $(this).data('end');
    $modalEdit.find('[name="end-e"]').val(end);

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

function showDeleteModal() {
    var id = $(this).data('id');
    $modalDelete.find('[name="id-d"]').val(id);

    var description = $(this).data('description');
    $modalDelete.find('[name="description-d"]').val(description);

    $modalDelete.modal('show');
}

function deleteItinerary() {
    event.preventDefault();
    var data = $('#form-delete').serializeArray();
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
