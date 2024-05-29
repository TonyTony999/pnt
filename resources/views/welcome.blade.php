@extends('layouts.layout')
@section('content')
<section id="intro my-5">
    <div class="container-lg">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 text-center text-md-start">
                <h1>
                    <div class="purple text-fluid display-3 ">Colombian Thongs and G-Strings</div>
                    <div class="display-6 text-muted">For Sale</div>
                </h1>
                <p class="lead my-4 text-muted">
                    We sell heavy worn thongs from amateur colombian women
                </p>
                <a href="http://localhost:8000/panties" target="_blank" class="btn btn-secondary btn-lg">Buy Now</a>
            </div>
            <div class="col-md-5 text-center">
                <img class="img-fluid" src="/images/thong.jpg" alt="colombian thong">
            </div>
        </div>
        <p class="message">{{session("msg")}}</p>
        <!-- This will output the thankyou message once an order is submitedd from panties/create -->
    </div>
</section>
@endsection
