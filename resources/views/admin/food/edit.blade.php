@section('title', 'Edit Food List')
@section('food', 'menu-open')
@section('food_active', 'active')
@section('food_list_active', 'active')
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
                        <li class="breadcrumb-item"><a href="{{ route('food.index') }}" class="font-weight-bold">Food</a></li>
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
    </script>
@endpush

<x-app-layout>
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('food.update', [$food->id]) }}" enctype="multipart/form-data" class="row">
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
                                <input name="title" type="text" class="form-control" placeholder="Type something" value="{{ $food->title }}">
                            </div>
                            <div class="form-group">
                                <label>Excerpt</label>
                                <textarea name="excerpt" class="form-control" rows="4" id="excerpt" placeholder="Type something">
                                    {{ $food->excerpt }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4" id="description" placeholder="Type something">
                                    {{ $food->description }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
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
                                <label>Price</label>
                                <input name="price" type="text" class="form-control" placeholder="Type something" value="{{ $food->price }}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="food_category_id" class="form-control">
                                    <option>Choose</option>
                                    @foreach ($food_categories as $fc)
                                        <option value="{{ $fc->id }}" @if ($food->food_category_id == $fc->id) selected @else @endif>{{ $fc->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if ($food->status == '1') selected @else @endif>Published</option>
                                    <option value="0" @if ($food->status == '0') selected @else @endif>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a href="{{ route('food.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
