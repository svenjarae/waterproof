@extends('layouts.app')

@section('content')

@if(Session::has('success-message-delete'))
    <script>
        swal('Service cancelled!', '{{ Session::get('sweetalert') }}', 'success');
    </script>
@endif

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="subnav-hover" href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('admin.assignments.index') }}">Assignments</a>
            </li>
            <li>
                <a class="active-sub" href="{{ route('admin.customer.index') }}">Customers</a>
            </li>
        </ul>
    </div>


    <h2 class="headline_withNav">customers</h2>

    <input type="text" class="shadow" id="myInput-filter-admin" onkeyup="myFunction()" placeholder="Search for ID.." title="Type in ID">

    <!-- display "no assignments" if assignments data from user is empty-->
    @if ($service->isEmpty()) 
        <div class="cero-data-container title">
            <div>
                <img src="{{url('/images/allert.png')}}" alt="Allert Image"/>
                <h3>You have no customers yet!</h3>
            </div>
        </div>
    @else

    <div class="table-overflow_container">
    
        <table id="myTable-filter-admin" class="admin-table">
            <tr class="header admin-table shadow">
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Customer since</th>
            </tr>
            
            @foreach($user as $singleUser)       
                <tr class="tr" onclick="document.location = '{{ route('admin.customer.show', $singleUser->id) }}';">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $singleUser->getUserID() }}</td>
                    <td>{{ $singleUser->name }} {{ $singleUser->surname }}</td>
                    <td>{{ $singleUser->email }}</td>
                    <td>{{ $singleUser->created_at->format('Y-d-m') }}</td>
                </tr>        
            @endforeach
            
        </table>
    </div>

    @endif

@endsection
