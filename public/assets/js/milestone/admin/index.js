$(document).on('ready',principal);

var ids = [];
var states = [];
var dni;
var milestone;
function principal()
{
    milestone = $('#milestone').val();
    search();

    $('#search').on('input',search);
    attendance_state();
}

function attendance_state()
{
    $('[data-id]').on('change',function() {
        var pos = find_element($(this).data('id'));

        var url = '../asistencias/registrar';
        var _token = $('#_token').val();

        if( states[pos]==0 )
            states[pos]=1;
        else
            states[pos]=0;

        var formData = new FormData();
        formData.append( 'milestone',milestone);
        formData.append( 'id',ids[pos] );
        formData.append( 'check',states[pos] );

        $.ajax({
                url: url,
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': _token }
            })
            .done(function( response ) {
            });

        });
}

function find_element( element )
{
    for( var i=0; i<ids.length; i++ )
        if( ids[i]== element )
            return i;
}

function search()
{
    dni = $('#search').val();
    if( dni.length == 0 )
        dni = 'z';

    var url = '../asistencias/'+milestone+'/'+dni;
    $.ajax({
            url: url,
            method: 'GET'
        })
        .done(function( users ) {
            $('#attendances').html('');
            var i  = 0;
            ids    = [];
            states = [];
            $.each(users,function(key,user){
                states[i]= user.pivot.check;
                ids[i] = user.id;
                var input ='<input type="checkbox" data-id="'+user.id+'">';
                if( states[i]==1 )
                    input = '<input type="checkbox" data-id="'+user.id+'" checked>';

                var toAppend =
                    '<tr data-check="'+user.id+'">' +
                    '<td>'+user.name+'</td>' +
                    '<td>'+user.email+'</td>' +
                    '<td>'+user.dni+'</td>' +
                    '<td>'+user.celular+'</td>' +
                    '<td>'+user.universidad+'</td>' +
                    '<td>'+user.carrera+'</td>' +
                    '<td>'+input+'</td>' +
                    '</tr>';
                $('#attendances').append(toAppend);
                i+=1;
            });
            $('.pagination').html('');
            paginate();
            attendance_state();
        });
}
