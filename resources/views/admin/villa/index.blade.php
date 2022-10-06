@section('title', 'Villa')
@section('villa_active', 'active')
@section('title_breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" class="font-weight-bold">Home</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@push('js')
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
            $("#arrival").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#list_wrapper .col-md-6:eq(0)');
        });
</script>
<script>
    $(function() {
            $("#departure").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#list_wrapper .col-md-6:eq(0)');
        });
</script>
@endpush
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#excerpt').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });
        $('#description').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });
        $('#term_condition').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });
</script>
@endpush

<x-app-layout>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Villa List</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="arrival" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Villa name</th>
                                        <th>Image</th>
                                        @if(Auth::user()->email == "admin@admin.com")
                                        <th></th>
                                        @else
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($villas as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td><img src="{{ asset($data->image) }}" style="width: 150px"></td>
                                        @if(Auth::user()->email == "admin@admin.com")
                                        <td class="text-center">
                                            <a href="{{ route('villa.edit', [$data->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{ $data->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <div class="modal fade" id="modal_delete_{{ $data->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Warning!</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            Are you sure want to delete this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                                                            <form method="POST" action="{{ route('villa.destroy', [$data->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @else
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Villa name</th>
                                        <th>Image</th>
                                        @if(Auth::user()->email == "admin@admin.com")
                                        <th></th>
                                        @else
                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>


                <form method="POST" action="{{ route('villa.store') }}" enctype="multipart/form-data" class="col-lg-4">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-12">
                                <label>Villa Name</label>
                                <input name="title" type="text" class="form-control" placeholder="Type something">
                            </div>
                            <div class="form-group col-12">
                                <label>Image</label>
                                <input name="image" type="file" class="form-control" placeholder="Type something">
                            </div>
                            <div class="form-group col-4">
                                <label>Wide</label>
                                <input name="wide" type="text" class="form-control" placeholder="Type something">
                            </div>
                            <div class="form-group col-4">
                                <label>Pool Type</label>
                                <input name="pool_type" type="text" class="form-control" placeholder="Type something">
                            </div>
                            <div class="form-group col-4">
                                <label>View</label>
                                <input name="view" type="text" class="form-control" placeholder="Type something">
                            </div>
                            <div class="form-group col-12">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Type something"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a href="{{ route('villa.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-app-layout>