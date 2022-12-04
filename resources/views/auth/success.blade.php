@extends('layouts.success')

@section('title')
    Register Success!
@endsection 

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img
                    src="{{ url('images/transaction-complete-icon.svg') }}"
                    alt="img"
                    class="mb-4"
                    />
                    <h1>Welcome to Store</h1>
                    <p>
                    Kamu sudah berhasil terdaftar<br />
                    bersama kami. Let’s grow up now.
                    </p>
                    <div>
                    <a href="categories.html" class="btn btn-success w-50 mt-4"
                        >My Dashboard</a
                    >
                    <a href="dashboard.html" class="btn btn-signup w-50 mt-4"
                        >Go To Shopping</a
                    >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

