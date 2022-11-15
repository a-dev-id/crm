@section('title', 'Confirmation Letter')
@section('confirmation_letter_active', 'active')
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
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@push('js')
<script src="https://cdn.tiny.cloud/1/d8ys6zcfcgiv1bwe4den7z48yndrj1ruw5r57ujbg366mut6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
<!-- Select2 -->
<script src="{{ asset('vendors/adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
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
<script>
    $('.guest').select2({
    theme: 'bootstrap4'
    })
</script>
<script>
    tinymce.init({
      selector: '#benefit_experience',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
<script>
    tinymce.init({
      selector: '#check_in_check_out',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
<script>
    tinymce.init({
      selector: '#terms_conditions',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@endpush

<x-app-layout>

    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('confirmation-letter.store') }}" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Booking Details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label>Confirmation No</label>
                                <input name="confirmation_no" type="text" class="form-control" placeholder="Type something" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Villa Type</label>
                                <select name="villa_id" class="form-control" required>
                                    <option>- choose -</option>
                                    @foreach ($villas as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Currency</label>
                                <input name="currency" type="text" class="form-control" placeholder="Type something" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control" placeholder="Type something" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Arrival</label>
                                <input name="arrival" type="date" class="form-control" placeholder="Type something" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Departure</label>
                                <input name="departure" type="date" class="form-control" placeholder="Type something" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Adults</label>
                                <select name="adult" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Children</label>
                                <select name="child" class="form-control" required>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Benefits & Experiences</label>
                                    <textarea class="form-control" name="benefit_experience" id="benefit_experience" rows="10">
                                        <ul>
                                            <li>Complimentary Breakfast</li>
                                            <li>Complimentary Afternoon Tea From 3.00pm To 4.00pm At The Spa Cafe</li>
                                            <li>Complimentary In Room Daily Local Fruit Bowl</li>
                                            <li>Complimentary Wi-Fi</li>
                                            <li>Complimentary Resort Scheduled Shuttle Service To Ubud</li>
                                            <li>Complimentary In-Villa Coffee/Tea Making Facilities</li>
                                        </ul>
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Check-in / check-out</label>
                                    <textarea class="form-control" name="check_in_check_out" id="check_in_check_out" rows="10">
                                        <p>Early check-in and late check-out, when possible subject to availability<br>
                                            A half-day room charge is available before 12:00 noon and late check-out<br>
                                            Villas occupied beyond 6pm will be charged at full night rate</p>
                                        </textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Terms & Conditions</label>
                                    <textarea class="form-control" name="terms_conditions" id="terms_conditions" rows="10">
                                        <p>The quoted rate is for up to 2 guests per villa / per night. Full pre-payment is required at the time of booking and is non-refundable. In the event of no-show (i.e should you One ther use or cancel your reservation), a fee equivalent to your entire stay will be charged. All fees are inclusive of service charge and government tax. Use of drone is strictly prohibited within Hanging Gardens of Bali.</p>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Guest Name</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <select name="guest_id" class="form-control guest" required>
                                <option>- choose -</option>
                                @foreach ($guests as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">SEND</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>