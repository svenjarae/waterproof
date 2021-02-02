@extends('layouts.app')

@section('content')

    <h2 class="headline_contact no-subnav_margin">your contact options</h2>

    <div class="contact_container">
        <div class="contact_cart_container shadow content-animate">
            <div class="cart_headline_wrapper">
                <img src="{{url('/images/contact_phone-icon.png')}}" alt="Contact Phone Icon"/>
                <h4>By Phone</h4>
            </div>
            <div class="cart_wrapper">
                <a href="tel:+431234567890">+43 123 456 789 0</a> <br>
                <a href="tel:+431234567890">+43 123 456 789 0</a>
            </div>
            <div>
                <p>Mo-Fr. 11am-06pm </p>
                <p>Sa 09am-02pm</p>
            </div>
        </div>

        <div class="contact_cart_container shadow content-animate">
            <div class="cart_headline_wrapper">
                <img src="{{url('/images/contact_mail-icon.png')}}" alt="Contact Mail Icon"/>
                <h4>By Email</h4>
            </div>

            <div>
                <a href="mailto:xample@info.com">xample@info.com</a> <br>
                <a href="mailto:xample@info.com">xample@info.com</a>
            </div>
        </div>

        <div class="contact_cart_container shadow content-animate">
            <div class="cart_headline_wrapper">
                <img src="{{url('/images/contact_address-icon.png')}}" alt="Contact Address Icon"/>
                <h4>Visit Us</h4>
            </div>
            <div class="cart_wrapper">
                <a href="http://www.umex.at/Webseite/index.php/home/zufahrtsplankontakt-mainmenu-43">
                    Umex Tauchsport <br>
                    xample street 16 / 18 <br>
                    Vienna, Austria
                </a>
            </div>
            <div>
                <p>Mo-Fr. 11am-06pm </p>
            </div>
        </div>

        <div class="contact_cart_container shadow content-animate">
            <div class="cart_headline_wrapper">
                <img src="{{url('/images/contact_info-icon.png')}}" alt="Contact Phone Icon"/>
                <h4>FAQ/Service-Community</h4>
            </div>
            <div>
                <p>Find answers to your question or ask a question yourself in our service community </p>
            </div>
        </div>
    </div>
    
@include('layouts.service')

@endsection
