@extends('layouts.app')

@section('content')               

<!-- Welcome User when first login TODO --> 
    <div class="salutation_container ">
        <div class="salutation_wrapper shadow content-animate">
            <div class="wrapper-welcome">
                <div>
                    <p class="salutation_flex">Hello,</p>
                    <div class="textcontainer">
                        <span class="particletext bubbles">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="salutation_wrapper home_wrapper shadow content-animate">
            <div class="salutation_flex">
                <div class="advice_container">
                    <div class="padi-logo_container">
                        <a href="">
                            <img src="{{url('/images/padi_logo.png')}}" alt="Image"/>
                        </a>
                    </div>
                    <div>
                        <p class="salutation_advised-by">You are advised by</p>
                        <p>
                            <a href="http://www.umex.at/Webseite/index.php">Tauchschule Umex</a>
                        </p>
                        <a href="tel:+4368184851108">+43 681 84 85 110</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="slideshow-container">

        <div class="mySlides fade-slider">
            <div class="numbertext">1 / 3</div>
            <div class="slider-content_container sliderOne-img-container">
                <div class="container_slider_headline">
                    <h3 class="headline_slider">Become a PADI member and receive 20% off equipment for PADI professionals.</h3>
                </div>
                <div class="slider_wrapper_button special-hover">
                    <button>Become a PADI Member</button>
                </div>
            </div>
        </div>

        <div class="mySlides fade-slider">
            <div class="numbertext">2 / 3</div>
            <div class="slider-content_container sliderTwo-img-container">
                
            </div>
        </div>

        <div class="mySlides fade-slider">
            <div class="numbertext">3 / 3</div>
            <div class="slider-content_container sliderThree-img-container">
            </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>

    <div class="container-dots-slider">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    <div class="home-news_container">
        <h2 class="margin-top-40">upcoming maintenance</h2>

        <!-- display "no equipment" if equipment data with status warning from user is empty-->
        @if ($countEquipmentUser == 0) 
            <div class="cero-data-container">
                <div>
                    <img src="{{url('/images/allert.png')}}" alt="Allert Image"/>

                <h3>You have not created any equipment yet!</h3>
                <p>If you need some help feel free to read our 
                    <a class="link-underline" href="{{ route('help') }}">App Instructions</a>    
                    or 
                    <a class="link-underline" href="{{ route('contact') }}">contact us</a>.
                    
                </p>
                </div>
                <div class="margin-top-40">
                    <a href="{{ route('equipment.create') }}" class="help-link special-hover">
                        <span class="paragraph-bright">Add Equipment</span>   
                    </a>
                </div>
            
            </div>
            @else 

        <!-- php Datenausgabe / Start Loop -->
        @foreach($equipment as $singleEquipment)
            
            <!-- display equipment only with status warning -->
            @if ($singleEquipment->status === 'warning')
        
                <ul class="myUL special-hover">
                    <li class="shadow round list-margin select-li">
                        <a class="special-hover" href="{{ route('equipment.show', $singleEquipment->id, $singleEquipment->status) }}">
                            <p class="block-around-inline">
                                <span>{{ $singleEquipment->equip_type }}</span>   
                            </p>
                            <ul class="sub-ul-flex">
                                <!-- FIX ME: Count numbers of equipment from user (loop iteration)-->
                                <li>No.</li>
                                <li>{{ $loop->iteration }}</li>
                                <li>Creation Date</li>
                                <li>{{ $singleEquipment->created_at }}</li>
                                <li>Status</li>
                                <li>
                                    <button class="dot_orange"></button> 
                                    {{ $singleEquipment->status }}
                                </li>
                                <li>Time left to maintenance</li>
                                <li>{{ $singleEquipment->diff_in_days }} days</li>
                            </ul>
                        </a>
                    </li>
                </ul>

            @endif
        @endforeach
        <!-- php Datenausgabe / End Loop -->

        <a class="home-optional_link special-hover" href="{{ route('equipment.index') }}">
            <span>See all equipment</span>
        </a>
        @endif    

        <h2 class="margin-top-40">recent assignments</h2>

                <!-- display "no assignments" if assignments data from user is empty-->
                @if ($countAssignmentsUser == 0) 
                <div class="cero-data-container title">
                    <div>
                        <img src="{{url('/images/allert.png')}}" alt="Allert Image"/>

                    <h3>You have not requested a service offer yet!</h3>
                    <p>If you need some help feel free to read our 
                        <a class="link-underline" href="{{ route('help') }}">App Instructions</a>    
                        or 
                        <a class="link-underline" href="{{ route('contact') }}">contact us</a>.
                    </p>
                    </div>
                    <div class="margin-top-40">
                        <a href="{{ route('service.create') }}" class="help-link special-hover">
                            <span class="paragraph-bright">Make Service Request</span>   
                        </a>
                    </div>
                
                </div>
            @else 

        <!-- php Datenausgabe / Start Loop -->
        @foreach($service as $singleService)
            
            <!-- display equipment only from logged in user -->
            @if(Auth::user()->id == $singleService->user_id)
         
                <ul class="myUL-ass special-hover">
                    <li class="shadow round list-margin select-li">
                        <a class="special-hover" href="{{ route('service.show', $singleService->id) }}">
                            <p class="block-around-inline">
                                <span>{{ $singleService->id }}</span>   
                            </p>
                            <ul class="sub-ul-flex">
                                <li>Assignment Date</li>
                                <li>{{ $singleService->created_at }}</li>
                                <li>Status</li>
                                <li>{{ $singleService->status }}</li>
                                <li>Cost estimate</li>
                                <li>{{ $singleService->cost }}</li>
                                <li>Type of request</li>
                                <li>{{ $singleService->service_type }}</li>
                            </ul>
                        </a>
                    </li>
                </ul>

            @endif
        @endforeach
        <!-- php Datenausgabe / End Loop -->
        <a class="home-optional_link special-hover" href="{{ route('service.assignments') }}">
            <span>See all assignments </span>
        </a>
            
        @endif

@include('layouts.service')

@endsection
