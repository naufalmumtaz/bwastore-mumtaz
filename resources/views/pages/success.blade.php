@extends('layouts.success')

@section('title')
    Checkout Success!
@endsection 

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
    <div class="container">
        <div class="row align-items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
            <img
            src="images/transaction-complete-icon.svg"
            alt="img"
            class="mb-4"
            />
            <h1>Transaction Processed!</h1>
            <p>
            Silahkan tunggu konfirmasi email dari kami dan kami akan
            menginformasikan resi secept mungkin!
            </p>
            <div>
            <a href="categories.html" class="btn btn-success w-50 mt-4"
                >Go To Shopping</a
            >
            <a href="dashboard.html" class="btn btn-signup w-50 mt-4"
                >My Dashboard</a
            >
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

