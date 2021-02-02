@extends('layouts.app')

@section('content')

@if(Session::has('success-message'))
    <script>
        swal('User updated!', '{{ Session::get('sweetalert') }}', 'success');
    </script> 
@endif

    <div class="headline-search_container">
        <div>
            <h2 class="headline_withNav no-subnav_margin">account details</h2>
        </div>
    </div>
            <div class="long-cart">
                <a id="myBtn-editAcc" class="special-hover special-edit">
                    <span>Main Details</span>
                    <ul class="long-cart_list">
                        <li>Name</li>
                        <li>{{ Auth::user()->name }} {{ Auth::user()->surname }}</li>

                        <li>Date of Birth</li>
                        <li>{{ Auth::user()->dob }}</li>
                        
                        <li>Gender</li>
                        <li>{{ Auth::user()->gender }}</li>

                        <li>Phone</li>
                        <li>{{ Auth::user()->phone }}</li>

                        <li>Email</li>
                        <li>{{ Auth::user()->email }}</li>

                        <li>Number of dives</li>
                        <li>{{ Auth::user()->noofdives }}</li>

                        <li>Dive Certification</li>
                        <li>{{ Auth::user()->certification }}</li>
                    </ul>
                </a>
            </div>

            <div class="long-cart">
                <a id="myBtn-password" class="special-hover special-edit">
                    <span>Password</span>
                    <ul class="long-cart-pw">
                        <li>Password</li>
                        <li>***</li>
                    </ul>
                </a>
            </div>

            <div class="long-cart">
                <a id="myBtn-editAdd" class="special-hover special-edit">
                    <span>Shipping Information</span>
                    <ul class="long-cart_list">
                        <li>Street</li>
                        <li>{{ $user->address->street }}</li>

                        <li>ZIP</li>
                        <li>{{ $user->address->zip }}</li>
                        
                        <li>City</li>
                        <li>{{ $user->address->city }}</li>
                        
                        <li>Country</li>
                        <li>{{ $user->address->country }}</li>
                    </ul>
                </a>
            </div>

<form method="post" action="{{ route('account.destroy', $user->id) }}" autocomplete="off" class="confirm-action delete-btn-form">

    @method('delete')
    @csrf

    <button type="submit" class="delete-btn">
        <span class="special-hover special-delete">
            <span>Delete Account</span>
        </span>
    </button>

</form>
    
    <!--Modal edit account details -->
    <div id="myModal-editAcc" class="modal-editAcc">
        <!--content -->
        <div class="modal-content-editAcc shadow">
            <span class="close-editAcc">&times;</span>
            <!-- load edit form  -->
            <p>@include('account.edit')</p>
        </div>
    </div>

    <!--Modal edit password -->
    <div id="myModal-password" class="modal-password">
        <!--content -->
        <div class="modal-content-password shadow">
            <span class="close-password">&times;</span>
            <!-- load edit form  -->
            <p>@include('account.passwordUpdate')</p>
        </div>
    </div>

    <!--Modal edit address -->
    <div id="myModal-editAdd" class="modal-editAdd">
        <!--content -->
        <div class="modal-content-editAdd shadow">
            <span class="close-editAdd">&times;</span>
            <!-- load edit form  -->
            <p>@include('account.editAddress')</p>
        </div>
    </div>

@include('layouts.service')   

@endsection
