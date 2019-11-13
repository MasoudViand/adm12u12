@extends('adminlte::page')

@section('title', config('app.name'))

@section('content_header')
    <h1>Symptoms List</h1>
    <div class="container">
        <a href="{{--{{ url('admin/symptom/add') }}--}}"><button class="btn btn-info btn-lg pull-right"><i class="far fa-plus-square"></i> Add New</button></a>
        <div class="clearfix"></div>
    </div>


@stop

@section('content')


    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Done!</h4>
                {{ \Session::get('success') }}
            </div><br />
        @endif

        <div class="box box-primary" style="padding: 15px;">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                <div id="filter"></div>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Full Name</th>
                    <th>Severity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot class="text-primary">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-12 text-center">
            {{--{{ $symptoms->links() }}--}}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
               // processing: true,
               // serverSide: true,
                ajax: '{{ route('serverSide') }}',
                type: 'POST',
                columns: [
                    { "data": "_id" },
                    { "data": "name" },
                    { "data": "displayname" },
                    { "data": "severity", "defaultContent": "<i>Not set</i>" },
                    { "data": "status", "defaultContent": "<i>Not set</i>" },
                    { "data": 'action', "orderable": false, "searchable": false}
                ],
                initComplete: function () {
                    this.api().columns([3,4]).every( function () {
                        var column = this;
                        var select = $('<select><option value="">All</option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });
        });
    </script>

@stop

