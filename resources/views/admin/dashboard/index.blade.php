@section('title', 'Dashboard')
@section('dashboard_active', 'active')
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
            $("#list").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#list_wrapper .col-md-6:eq(0)');
        });
</script>
@endpush

<x-app-layout>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Guest 2022</span>
                            <span class="info-box-number">
                                {{ $guests_2022 }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="far fa-times-circle text-white"></i></button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <table id="list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th style="width: 200px">Status</th>
                                        <th style="width: 150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arrival_today as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            @if ($data->status == '1')
                                            <span class="badge badge-success"><i class="fas fa-check-circle"></i> Published</span>
                                            @else
                                            <span class="badge badge-secondary"><i class="fas fa-minus-circle"></i> Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('food.show', [$data->id]) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-images"></i>
                                            </a>
                                            <a href="{{ route('food.edit', [$data->id]) }}" class="btn btn-sm btn-warning">
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
                                                            Are you sure want to delete this <strong>"{{ $data->title }}"</strong> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                                                            <form method="POST" action="{{ route('food.destroy', [$data->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>