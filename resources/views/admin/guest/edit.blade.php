@section('title', 'Edit Guest')
@section('guest_active', 'active')
@section('title_breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="font-weight-bold">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('guest.index') }}" class="font-weight-bold">Guest</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

<x-app-layout>
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('guest.update', [$guest->id]) }}" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-lg-12">
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
                            <div class="form-group col-6">
                                <label>Title</label>
                                <select name="title" class="form-control">
                                    <option>- choose -</option>
                                    @foreach($honorifics as $data)
                                    <option value="{{ $data->value }}" @if ($data->value == $guest->title) selected="selected" @else @endif>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Full Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Type something" value="{{ $guest->name }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Type something" value="{{ $guest->email }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Type something" value="{{ $guest->phone }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Date of Birth</label>
                                <input name="date_of_birth" type="date" class="form-control" placeholder="Type something" value="{{ $guest->date_of_birth }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Country</label>
                                <select name="country" class="form-control">
                                    <option>- choose -</option>
                                    @foreach($countries as $data)
                                    <option value="{{ $data->nicename }}" @if ($data->nicename == $guest->country) selected="selected" @else @endif>{{ $data->nicename }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if ($data->status == $guest->status) selected="selected" @else @endif>Subscribe</option>
                                    <option value="0" @if ($data->status == $guest->status) selected="selected" @else @endif>Unsubscribe</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Submit</button>
                            <a href="{{ route('guest.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>