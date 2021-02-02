@extends('layouts.app')

@section('content')

    @if(Session::has('success-message'))
        <script>
            swal('Assignment updated!', '{{ Session::get('sweetalert') }}', 'success');
        </script> 
    @endif

    <!-- breadcrumb -->
    <ul class="breadcrumb margin-top-100">
        <li>
            <a href="{{ route('admin.customer.index') }}">Customer Overview</a>
            </li>
        <li>Singleview {{ $user->getUserID() }}</li>
    </ul>

    <h2>singleview customer</h2>

    <div class="singleview-container shadow margin-bottom-40">

        <h3 class="margin-bottom-20">Customer Details - {{ $user->getUserID() }}</h3>

        <ul>
            <li>Name</li>
            <li>{{ $user->name }}</li>
           
            <li>Surname</li>
            <li>{{ $user->surname }}</li>
            
            <li>Gender</li>
            <li>{{ $user->gender }}</li>

            <li>Email</li>
            <li>{{ $user->noofdives }}</li>

            <li>Phone</li>
            <li>{{ $user->phone }}</li>

            <li>Day of birth</li>
            <li>{{ $user->dob }}</li>

            <li>Certification</li>
            <li>{{ $user->certification }}</li>

            <li>Customer since</li>
            <li>{{ $user->created_at }}</li>

            <li>Amount of Equipment</li>
            <li>{{ $user->equipment->count() }}</li>

            <li>Amount of Service Assignments</li>
            <li>{{ $user->service->count() }}</li>
        </ul>

    </div>    

    <div class="singleview-container shadow margin-bottom-40">

        <h3 class="margin-bottom-20">Address Details</h3>

        <ul>
            <li>Street</li>
            <li>{{ $user->address->street }}</li>

            <li>ZIP</li>
            <li>{{ $user->address->zip }}</li>
                        
            <li>City</li>
            <li>{{ $user->address->city }}</li>
                        
            <li>Country</li>
            <li>{{ $user->address->country }}</li>
        </ul>

    </div>

    
    

@endsection
