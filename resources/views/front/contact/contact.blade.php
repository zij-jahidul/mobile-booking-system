@extends('layouts.front_layout.front_layout')

@section('style')
<style>
    .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>
@endsection
@section('content')
<!-- Breadcrumb Area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Contact Page</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
<!-- contact area start -->
<div class="contact-area mtb-60px">
    <div class="container">
        {{-- <div class="contact-map mb-10">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.305935303!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1605025898797!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
        </div> --}}
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>+0987732264</p>
                            {{-- <p>+012 345 678 102</p> --}}
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="#">haquetelecom75@gmail.com</a></p>
                            {{-- <p><a href="#">urwebsitenaem.com</a></p> --}}
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Address goes here,</p>
                            <p>30 Rue de Turbigo, 75003 Paris, France</p>
                        </div>
                    </div>
                    <div class="contact-social">
                        <h3>Follow Us</h3>
                        <div class="social-info">
                            <ul>
                                @if (!empty(facebook()))
                                <li>
                                    <a href="{{ facebook() }}"><i class="ion-social-facebook"></i></a>
                                </li>
                                @endif

                                @if (!empty(instagram()))
                                <li>
                                    <a href="{{ instagram() }}"><i class="ion-social-instagram"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Get In Touch</h2>
                        @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success_message') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <form class="contact-form-style" id="contact-form" action="{{ url('customer/contact-us/post') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name*" type="text" />
                            </div>
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email*" type="email" />
                            </div>
                            <div class="col-lg-12">
                                <input name="subject" placeholder="Subject*" type="text" />
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Message*"></textarea>
                                <button class="submit" type="submit">SEND</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->
@endsection
