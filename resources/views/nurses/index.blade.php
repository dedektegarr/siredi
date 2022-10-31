@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="nurses_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group flex-wrap"> <button
                                    class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>Copy</span></button> <button
                                    class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>CSV</span></button> <button
                                    class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>Excel</span></button> <button
                                    class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                    aria-controls="example1" type="button"><span>PDF</span></button> <button
                                    class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
                                    type="button"><span>Print</span></button>
                                <div class="btn-group"><button
                                        class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                        tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"
                                        aria-expanded="false"><span>Column visibility</span><span
                                            class="dt-down-arrow"></span></button></div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12 col-md-6">
                            <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="example1"></label></div>
                        </div> --}}
                    {{-- </div>  --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="nurses_table" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="nurses_table_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="nurses_table"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">Rendering
                                            engine</th>
                                        <th class="sorting" tabindex="0" aria-controls="nurses_table" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Browser
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="nurses_table" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Platform(s)</th>
                                        <th class="sorting" tabindex="0" aria-controls="nurses_table" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            Engine version</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>

                                    </tr>
                                    <tr class="even">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Rendering engine</th>
                                        <th rowspan="1" colspan="1">Browser</th>
                                        <th rowspan="1" colspan="1">Platform(s)</th>
                                        <th rowspan="1" colspan="1">Engine version</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@section('custom_script')
<script>
    $(function () {
        $("#nurses_table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#nurses_table_wrapper .col-md-6:eq(0)');
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
    });

</script>
@endsection
@endsection
