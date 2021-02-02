@extends('layouts.app')

@section('content')

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="active-sub" href="{{ url('equipment') }}">Equipment Overview</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ url('equipment/add') }}">
                    <span>Add Equipment</span>
                </a>
            </li>
        </ul>
    </div>

    @if(Session::has('success-message'))
        <script>
            swal('Equipment created!', '{{ Session::get('sweetalert') }}', 'success');
        </script>
    @endif

    @if(Session::has('success-message-delete'))
        <script>
            swal('Equipment deleted!', '{{ Session::get('sweetalert') }}', 'success');
        </script>
    @endif

    <div class="headline-search_container app-margin">
        <div>
            <h2 class="headline_withNav search-and-headline">equipment overview</h2>
        </div>
        <div class="search-container">
            <input class="shadow" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
        </div>
    </div>

    <!-- display "no equipment" if equipment data from user is empty-->
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

        <!-- Start Loop -->
        @foreach($equipment as $singleEquipment)

                <ul class="myUL special-hover">
                    <li class="shadow round list-margin select-li">
                        <a class="special-hover" href="{{ route('equipment.show', $singleEquipment->id, $singleEquipment->status) }}">
                            <p class="block-around-inline">
                                <span>{{ $singleEquipment->equip_type }}</span>   
                            </p>
                            <ul class="sub-ul-flex">
                                <!-- FIXME: Count numbers of equipment from user (loop iteration)-->
                                <li>No.</li>
                                <li>{{ $loop->iteration }}</li>
                                <li>ID</li>
                                <li>{{ $singleEquipment->getEquipmentID() }}</li>
                                <li>Status</li>
                                @if ($singleEquipment->status === 'expired')
                                <li><button class="dot_red"></button> {{ $singleEquipment->status }}</li>
                                @elseif ($singleEquipment->status === 'warning')
                                <li><button class="dot_orange"></button> {{ $singleEquipment->status }}</li>
                                @else
                                <li><button class="dot_green"></button> {{ $singleEquipment->status }}</li>
                                @endif
                                <li>Time left to maintenance</li>
                                @if ($singleEquipment->status === 'expired')
                                <li>-{{ $singleEquipment->diff_in_days }} days</li>
                                @else
                                <li>{{ $singleEquipment->diff_in_days }} days</li>
                                @endif
                            </ul>
                        </a>
                    </li>
                </ul>
            
        @endforeach
        @endif
        <!-- End Loop -->

    @include('layouts.service')
                    
@endsection
