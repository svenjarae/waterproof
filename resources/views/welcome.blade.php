@extends('layouts.app')

@section('content')

@if(Auth::user())
    <div class="container_opener-content-loggedIn shadow">
@else
    <div class="container_opener-content shadow">
@endif  
        <img id="welcome-fish" src="{{url('/images/welcome-fish.png')}}" alt="">

        <div class="container-phone">
            <img src="{{url('/images/welcome_phone.png')}}" alt="">
        </div>
        <div>
            <h1 class="keyheadline"> Your 
                <span class="keyword">
                    safety. 
                </span><br>
                    Made simple.
            </h1>
            <p class="welcome-phrase"> 
                Waterproof provides an online system for divers, divingschools and all kind of oceanlovers to receive a modern service handling and organization of Equipment. <br> <br>
                The mobile friendly web application includes equipment management and the ability to process service and maintenance inquiries online.
            </p>
            <div class="get-started_btn">
                <a class="special-button" href="{{ route('home') }}">
                    <span class="paragraph-bright">Get started</span>
                </a>
            </div>
        </div>
    </div>


    <div class="welcome-features-container">

        <h2 class="headline-center feature-headline">features</h2>
        <div class="features-wrapper">
            <div class="feature-card">
                <img src="{{url('/images/welcome-equipment.png')}}" alt="">
                <h3>Equipment management system</h3>
                <p>Document and manage your entire equipment with waterproof and never miss a deadline.</p>
            </div>

            <div class="feature-card">
                <img src="{{url('/images/welcome-service.png')}}" alt="">
                <h3>Online service</h3>
                <p>Process maintenance and service inquiries online and save some of your valuable time.</p>
            </div>

            <div class="feature-card">
                <img src="{{url('/images/welcome-24-7.png')}}" alt="">
                <h3>Communication</h3>
                <p>Experience an efficient exchange of information and a simplified communication.</p>
            </div>

            <div class="feature-card">
                <img src="{{url('/images/welcome-knowledge.png')}}" alt="">
                <h3>Knowledge</h3>
                <p>Increase your safety by expanding your knowledge and inform about preservation.</p>
            </div>
        </div>
    </div>

    @endsection