@extends('layouts.panel')

@section('title','Certificados')

@section('manage-inscription','open')

@section('make-payment','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripción</a>
    </li>
    <li class="active">Pagos</li>
@endsection

@section('content')
    <div id="path" data-path="{{ asset('/') }}"></div>
    <div class="page-header">
        <h1>
            Gestionar pagos del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando pagos de los certificados
            </small>
        </h1>

    </div>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Asistente</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Estado</th>
                        <th>Monto abonado</th>
                        <th>Concepto</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->dni }}</td>
                            <td>{{ $user->state }}</td>
                            <td>S/. {{ $user->payment }}.00</td>
                            <td width="270">Certificado {{ $user->certificate }}</td>
                            <td>
                                @if(  $user->state  == 'Pendiente')
                                    <button class="btn btn-primary btn-sm" data-solicitude="{{ $user->solicitude }}"
                                            data-certificate="{{ $user->certificate }}"
                                            data-assistant="{{ $user->name }}"><i class="ace-icon glyphicon glyphicon-plus-sign bigger-120"></i> Registrar pago</button>
                                    @if( $user->payment !=0 )
                                        <button onClick="verifica({{ $user->solicitude }},'{{ $user->certificate }}',0);" class="btn btn-warning btn-sm"><i class="ace-icon glyphicon glyphicon-check bigger-120"></i> Verificar pago</button>
                                    @endif
                                @endif
                                @if(  $user->state  == 'Pagado')
                                    <button onClick="verifica({{ $user->solicitude }},'{{ $user->certificate }}',1);" class="btn btn-warning btn-sm"><i class="ace-icon glyphicon glyphicon-check bigger-120"></i> Verificar pago</button>
                                @endif
                                @if( $user->state == 'Verificado')
                                    <button onClick="verifica({{ $user->solicitude }},'{{ $user->certificate }}',0);" class="btn btn-info btn-sm"><i class="ace-icon glyphicon glyphicon-share bigger-120"></i> Ver Pagos</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modals')
    <div id="modalRegister" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar pago</h4>
                </div>

                <form id="formRegister" action="{{ url('admin/pagos/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="solicitude_id" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Asistente</label>
                            <div class="col-md-8">
                                <input name="assistant" class="form-control inside" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Concepto</label>
                            <div class="col-md-8">
                                <input name="certificate" class="form-control inside" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Centro de pago<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input id="entity" name="entity" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Monto<span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="number" min="1" step="1" id="amount" name="amount" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Vaucher</label>
                            <div class="col-md-8">
                                <input type="file" accept="image/*" id="payment_file" name="payment_file" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Número operación</label>
                            <div class="col-md-4">
                                <input type="number" min="1" step="1" id="operation" name="operation" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Fecha de operación<span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="date" id="operation_date" name="operation_date" value="{{$today}}" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registrar pago</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalVerifica">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Verificar Pagos</h4>
            </div>
        <form id="formularioVerificar" action="{{ url('admin/pagos/carga/') }}">
         {{ csrf_field() }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="name">Concepto de Pagos :</label>
                        <div class="col-md-9">
                             <input id="concept" class="form-control inside" readonly><br>
                        </div>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                        <div class="">
                            <table id="talaCategoria" class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="ace-icon glyphicon glyphicon-credit-card bigger-120"></i> Centro de Pago</th>
                                  <th><i class="ace-icon glyphicon glyphicon-pushpin bigger-120"></i> N° de Operacion </th>
                                  <th><i class="ace-icon glyphicon glyphicon-calendar bigger-120"></i> Fecha Operacion </th>
                                  <th><i class="ace-icon glyphicon glyphicon-usd bigger-120"></i> Monto </th>
                                  <th><i class="ace-icon fa fa-cogs bigger-120"></i> Accion </th>
                              </tr>
                              </thead>
                              <tbody id="cagaPagos">
                              </tbody>
                          </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="">
                            <label for="name">Preview de Boucher : </label><br>
                            <img id="imageBoucher" src=""  width="270" height="300">
                        </div>
                     </div>
                  </div>
              </div>
            </div>
        </form>
        <form id="actualizaVerificar" action="{{ url('admin/pagos/verfica/') }}">
        {{ csrf_field() }}
            <div class="modal-footer">
              <div id="botton">
              </div>
            </div>
        </form>    
        </div>
        
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/payment/admin/index.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/record/main.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/jquery.dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js') }}"></script>

    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            //initiate dataTables plugin
            var myTable =
                    $('#dynamic-table')
                    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                            .DataTable( {
                                bAutoWidth: false,
                                "aoColumns": [
                                    { "bSortable": false },
                                    null, null,null, null, null, null,
                                ],
                                "aaSorting": [],


                                //"bProcessing": true,
                                //"bServerSide": true,
                                //"sAjaxSource": "http://127.0.0.1/table.php"	,

                                //,
                                //"sScrollY": "200px",
                                //"bPaginate": false,

                                //"sScrollX": "100%",
                                //"sScrollXInner": "120%",
                                //"bScrollCollapse": true,
                                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                //"iDisplayLength": 50


                                select: {
                                    style: 'multi'
                                }
                            } );



            $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

            new $.fn.dataTable.Buttons( myTable, {
                buttons: [
                    {
                        "extend": "colvis",
                        "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                        "className": "btn btn-white btn-primary btn-bold",
                        columns: ':not(:first):not(:last)'
                    },
                    {
                        "extend": "copy",
                        "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "csv",
                        "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "excel",
                        "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "pdf",
                        "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "print",
                        "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                        "className": "btn btn-white btn-primary btn-bold",
                        autoPrint: false,
                        message: 'This print was produced using the Print button for DataTables'
                    }
                ]
            } );
            myTable.buttons().container().appendTo( $('.tableTools-container') );

            //style the message box
            var defaultCopyAction = myTable.button(1).action();
            myTable.button(1).action(function (e, dt, button, config) {
                defaultCopyAction(e, dt, button, config);
                $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
            });


            var defaultColvisAction = myTable.button(0).action();
            myTable.button(0).action(function (e, dt, button, config) {

                defaultColvisAction(e, dt, button, config);


                if($('.dt-button-collection > .dropdown-menu').length == 0) {
                    $('.dt-button-collection')
                            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                            .find('a').attr('href', '#').wrap("<li />")
                }
                $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
            });

            ////

            setTimeout(function() {
                $($('.tableTools-container')).find('a.dt-button').each(function() {
                    var div = $(this).find(' > div').first();
                    if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                    else $(this).tooltip({container: 'body', title: $(this).text()});
                });
            }, 500);





            myTable.on( 'select', function ( e, dt, type, index ) {
                if ( type === 'row' ) {
                    $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
                }
            } );
            myTable.on( 'deselect', function ( e, dt, type, index ) {
                if ( type === 'row' ) {
                    $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
                }
            } );




            /////////////////////////////////
            //table checkboxes
            $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

            //select/deselect all rows according to table header checkbox
            $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
                var th_checked = this.checked;//checkbox inside "TH" table header

                $('#dynamic-table').find('tbody > tr').each(function(){
                    var row = this;
                    if(th_checked) myTable.row(row).select();
                    else  myTable.row(row).deselect();
                });
            });

            //select/deselect a row when the checkbox is checked/unchecked
            $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
                var row = $(this).closest('tr').get(0);
                if(this.checked) myTable.row(row).deselect();
                else myTable.row(row).select();
            });



            $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                e.stopImmediatePropagation();
                e.stopPropagation();
                e.preventDefault();
            });



            //And for the first simple table, which doesn't have TableTools or dataTables
            //select/deselect all rows according to table header checkbox
            var active_class = 'active';
            $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                var th_checked = this.checked;//checkbox inside "TH" table header

                $(this).closest('table').find('tbody > tr').each(function(){
                    var row = this;
                    if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                    else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                });
            });

            //select/deselect a row when the checkbox is checked/unchecked
            $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                var $row = $(this).closest('tr');
                if($row.is('.detail-row ')) return;
                if(this.checked) $row.addClass(active_class);
                else $row.removeClass(active_class);
            });



            /********************************/
            //add tooltip for small view action buttons in dropdown menu
            $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

            //tooltip placement on right or left
            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('table')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                //var w2 = $source.width();

                if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                return 'left';
            }




            /***************/
            $('.show-details-btn').on('click', function(e) {
                e.preventDefault();
                $(this).closest('tr').next().toggleClass('open');
                $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
            });
            /***************/





            /**
             //add horizontal scrollbars to a simple table
             $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
             {
               horizontal: true,
               styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
               size: 2000,
               mouseWheelLock: true
             }
             ).css('padding-top', '12px');
             */


        })
    </script>
@endsection