@extends('layouts.app')

@section('content')

    @if(Session::has('success-message'))
        <script>
            swal('Your service request is being processed!', '{{ Session::get('sweetalert') }}', 'success');
        </script>
    @endif

    @if(Session::has('success-message-delete'))
        <script>
            swal('Service assignment canceled!', '{{ Session::get('sweetalert') }}', 'success');
        </script>
    @endif

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="subnav-hover" href="{{ route('service.index') }}">Service Offer</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('service.create') }}">Service Request</a>
            </li>
            <li>
                <a class="active-sub" href="{{ route('service.assignments') }}">Assignments</a>
            </li>
        </ul>
    </div>

    <div class="headline-search_container app-margin">
        <div>
            <h2 class="headline_withNav search-and-headline">assignments</h2>
        </div>
        <div class="search-container">
            <input class="shadow" type="text" id="myInput-ass" onkeyup="myFunction()" placeholder="Search for assignment.." title="Type in a name">
        </div>
    </div>

    <!-- display "no assignments" if assignments data from user is empty-->
    @if ($countAssignmentsUser == 0) 
        <div class="cero-data-container">
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
                    <span class="paragraph-bright">Make service request</span>   
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
                                <li>{{ $singleService->created_at->format('Y-d-m') }}</li>
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
    @endif

@include('layouts.service')

@endsection

