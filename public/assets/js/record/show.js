$(document).on('ready',principal);

function principal()
{
    $modalNew = $('#new-modal');
    $modalEdit = $('#edit-modal');
    $modalDelete = $('#delete-modal');
    $('#new-paper').on('click', showNewModal);
    $('[data-edit]').on('click', showEditModal);
    $('[data-delete]').on('click', showDeleteModal);
    $('#btnSave').on('click', savePaper);
    $('#btnEditar').on('click', editPaper);
    $('#btnEliminar').on('click', deletePaper);
}

var $modalNew;
var $modalEdit;
var $modalDelete;

function showNewModal() {
    /*var id = 3;
    var lista = document.getElementById("ponentes");
    for (i = 0; i < lista.options.length; i++) {
        if (lista.options[i].value == id) {
            lista.options[i].selected = true;
        }
    }*/


    $modalNew.modal('show');
}

function savePaper() {
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
    var speaker = $(this).data('speaker');

    var paper = $(this).data('paper');
    $modalEdit.find('[name="paper"]').val(paper);
    
    var subject = $(this).data('subject');
    $modalEdit.find('[name="subject-e"]').val(subject);
    
    var realization = $(this).data('date');
    $modalEdit.find('[name="date-e"]').val(realization);
    
    var start = $(this).data('start');
    $modalEdit.find('[name="start-e"]').val(start);
    
    var end = $(this).data('end');
    $modalEdit.find('[name="end-e"]').val(end);
    
    var lista = document.getElementById("speakers");
    for (i = 0; i < lista.options.length; i++) {
        if (lista.options[i].value == speaker) {
            lista.options[i].selected = true;
        }
    }
    
    $modalEdit.modal('show');
}

function editPaper() {
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
    $modalDelete.find('[name="idEliminado"]').val(id);

    var paper = $(this).data('paper');
    $modalDelete.find('[name="subject-d"]').val(paper);

    var speaker = $(this).data('speaker');
    $modalDelete.find('[name="ponente-d"]').val(speaker);

    $modalDelete.modal('show');
}

function deletePaper() {
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