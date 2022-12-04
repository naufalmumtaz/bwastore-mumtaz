@extends('layouts.dashboard')

@section('title')
Add Products
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Product</h2>
            <p class="dashboard-subtitle">Create your own product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('dashboard-product-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                aria-describedby="storeHelp"
                                                name="name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                aria-describedby="storeHelp"
                                                name="price"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kategori Product</label>
                                            <select name="categories_id" id="categories_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea
                                                name="description"
                                                id="editor"
                                                cols="30"
                                                rows="10"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <input
                                                type="file"
                                                name="photos"
                                                class="form-control-file"
                                                aria-describedby="storeHelp"
                                                multiple
                                            />
                                            <p class="text-muted">
                                                Kamu dapat memilih lebih dari
                                                satu file
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <button
                                            type="submit"
                                            class="btn btn-success btn-block px-5"
                                        >
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    AOS.init({
        once: true,
    });

    $("#menu-toggle").click(function (e) {
        event.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    CKEDITOR.replace("editor");
</script>
@endpush
