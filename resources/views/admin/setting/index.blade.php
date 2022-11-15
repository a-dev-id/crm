@section('title', 'Setting')
@section('setting_active', 'active')
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
@endpush
@push('js')
<script src="https://cdn.tiny.cloud/1/d8ys6zcfcgiv1bwe4den7z48yndrj1ruw5r57ujbg366mut6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#benefit_experience',
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
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Preset 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Preset 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Preset 3</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="row">
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
                                                    <p>The quoted rate is for up to 2 guests per villa / per night. Full pre-payment is required at the time of booking and is non-refundable. In the event of no-show (i.e should you One ther use or cancel your reservation), a fee equivalent to your entire stay will be charged. All fees are inclusive of service charge and government tax. Use of drone is strictly prohibited within Hanging Gardens of Bali.
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>