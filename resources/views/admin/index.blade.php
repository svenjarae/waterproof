@extends('layouts.app')

@section('content')

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="active-sub" href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('admin.assignments.index') }}">Assignments</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('admin.customer.index') }}">Customers</a>
            </li>
        </ul>
    </div>

    <div class="admin-news_container">
        <div class="admin-news_wrapper">
            <div class="admin-news_cart shadow">
                <h4>Open Assignments ({{ $openStatus->count() }})</h4>
            </div>
            <a class="acc_wrapper_edit special-hover" href="{{ route('admin.assignments.index') }}">
               <span>Go to all assignments</span>
            </a>
        </div>

        <div class="admin-news_wrapper">
            <div class="admin-news_cart shadow">
                <h4>Currently ({{ $user->count() }}) Customers</h4>
            </div>
            <a class="acc_wrapper_edit special-hover" href="{{ route('admin.customer.index') }}">
                <span>Go to all customers</span>
            </a>
        </div>

        <div class="admin-news_wrapper">
            <div class="admin-news_cart shadow">
                <h4>New Messages (0)</h4>
            </div>
            <a class="acc_wrapper_edit special-hover" href="">
                <span>Go to messages</span>
            </a>
        </div>
    </div>

    <h2 class="admin-h2" >recent (10) assignments</h2>

    <!-- display "no assignments" if assignments data from user is empty-->
    @if ($service->isEmpty()) 
        <div class="cero-data-container title">
            <div>
                <img src="{{url('/images/allert.png')}}" alt="Allert Image"/>
                <h3>You have not received a service request yet!</h3>
            </div>
        </div>
    @else
    <!-- php Datenausgabe / Start Loop -->

    <div class="table-overflow_container">
        <table class="admin-table shadow">
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Mail</th>
                <th>Status</th>
                <th>Equipment ID</th>
            </tr>
            
            @foreach($service as $singleService)
                <tr class="tr" onclick="document.location = '{{ route('admin.assignments.show', $singleService->id) }}';">
                    <!-- Count numbers of service -->
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $singleService->getServiceID() }}</a>
                    </td>
                    <td>{{ $singleService->user->email }}</td>
                    <td>{{ $singleService->status }}</td>
                    <td>{{ $singleService->equipment->getEquipmentID() }} </td>
                </tr>
            @endforeach

        </table>
    </div>
    

<!-- php Datenausgabe / End Loop -->
@endif

@endsection
