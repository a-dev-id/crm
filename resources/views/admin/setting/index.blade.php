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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="font-weight-bold">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#gofood_description').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });

        $('#news_informations_description').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });

        $('#spa_service_excerpt').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });

        $('#spa_service_description').summernote({
            tabsize: 2,
            height: 200,
            placeholder: 'Type something'
        });
    </script>
    <script>
        setTimeout(() => {
            const box = document.getElementById('alert');
            box.style.display = 'none';
        }, 3000);
    </script>
@endpush

<x-app-layout>

    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('setting.update', [$setting->id]) }}" enctype="multipart/form-data" class="row">
                @method('PUT')
                @csrf
                <div class="col-lg-12">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible" id="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="far fa-times-circle text-white"></i></button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body text-right p-2">
                            <button type="submit" class="btn btn-success px-4"><i class="fas fa-save pr-1"></i> Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-secondary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Homepage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-general-tab" data-toggle="pill" href="#custom-tabs-four-general" role="tab" aria-controls="custom-tabs-four-general" aria-selected="false">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="true">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Video Header</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="homepage_video_url" value="{{ $setting->homepage_video_url }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">GoFood</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="gofood_title" value="{{ $setting->gofood_title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Logo</label>
                                                        <div class="custom-file">
                                                            <input name="gofood_logo" type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Current Logo</label>
                                                        <img src="{{ asset($setting->gofood_logo) }}" width="150px" class="ml-4">
                                                        <input name="old_gofood_logo" type="hidden" value="{{ $setting->gofood_logo }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" rows="3" id="gofood_description" name="gofood_description" placeholder="Type something">{!! $setting->gofood_description !!}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="gofood_button_text" value="{{ $setting->gofood_button_text }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Button Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="gofood_button_link" value="{{ $setting->gofood_button_link }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Banner</label>
                                                        <div class="custom-file">
                                                            <input name="gofood_banner" type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Current Banner</label>
                                                        <img src="{{ asset($setting->gofood_banner) }}" width="150px" class="ml-4">
                                                        <input name="old_gofood_banner" type="hidden" value="{{ $setting->gofood_banner }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Banner Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="gofood_banner_link" value="{{ $setting->gofood_banner_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">News & Informations</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="news_informations_title" value="{{ $setting->news_informations_title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" rows="3" id="news_informations_description" name="news_informations_description" placeholder="Type something">{!! $setting->news_informations_description !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Spa Service</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Excerpt</label>
                                                        <textarea class="form-control" rows="3" id="spa_service_excerpt" name="spa_service_excerpt" placeholder="Type something">{!! $setting->spa_service_excerpt !!}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" rows="3" id="spa_service_description" name="spa_service_description" placeholder="Type something">{!! $setting->spa_service_description !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-general" role="tabpanel" aria-labelledby="custom-tabs-four-general-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Social Media</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Instagram Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="instagram_url" value="{{ $setting->instagram_url }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Facebook Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="facebook_url" value="{{ $setting->facebook_url }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Youtube Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="youtube_url" value="{{ $setting->youtube_url }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tripadvisor Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="tripadvisor_url" value="{{ $setting->tripadvisor_url }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Google Link</label>
                                                        <input type="text" class="form-control" placeholder="Type something" name="google_url" value="{{ $setting->google_url }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </form>
        </div>
    </section>

</x-app-layout>
