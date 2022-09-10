@section('title', 'Edit News Information')
@section('news_information_active', 'active')
@section('title_breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title') "<span class="font-weight-bold">{{ $news_information->title }}</span>"</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="font-weight-bold">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news-information.index') }}" class="font-weight-bold">News Information</a></li>
                        <li class="breadcrumb-item active">@yield('title') - {{ $news_information->title }}</li>
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
        $('#excerpt').summernote({
            tabsize: 2,
            height: 200,
        });
        $('#description').summernote({
            tabsize: 2,
            height: 200,
        });
        $('#term_condition').summernote({
            tabsize: 2,
            height: 200,
        });
    </script>
@endpush

<x-app-layout>
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('news-information.update', [$news_information->id]) }}" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" placeholder="Type something" value="{{ $news_information->title }}">
                            </div>
                            <div class="form-group">
                                <label>Excerpt</label>
                                <textarea name="excerpt" class="form-control" rows="4" id="excerpt" placeholder="Type something">{{ $news_information->excerpt }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4" id="description" placeholder="Type something">{{ $news_information->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Banner Image</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $news_information->banner_image) }}" class="w-100">
                        </div>
                    </div>

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Detail</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Banner Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="banner_image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <input name="old_banner_image" type="hidden" value="{{ $news_information->banner_image }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if ($news_information->status == '1') selected @else @endif>Published</option>
                                    <option value="0" @if ($news_information->status == '0') selected @else @endif>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a href="{{ route('news-information.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
