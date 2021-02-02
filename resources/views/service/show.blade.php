@extends('layouts.app')

@section('content')

<!-- display equipment only from logged in user -->
@if(Auth::user()->id == $service->user_id) 

<ul class="breadcrumb margin-top-100">
  <li>
      <a href="{{ route('service.assignments') }}">Assignemnts Overview</a>
    </li>
  <li>Singleview {{ $service->getServiceID() }}</li>
</ul>

<h2>singleview assignment</h2>

<div class="singleview-container shadow">

    <h3 class="margin-bottom-20">{{ $service->getServiceID() }}</h3>

    <ul>
        <li>Status</li>
        <li>{{ $service->status }}</li>

        <li>Cost estimate</li>
        <li>{{ $service->cost }}</li>

        <li>Operator</li>
        <li>Name of operator</li>
        
        <li>Equipment Type</li>
        <li class="service-equipment-link">
            <a href="{{ route('equipment.show', $service->equipment->id) }}">
                {{ $service->equipment_type }}
            </a>
        </li>
        
        <li>Service Type</li>
        <li>{{ $service->service_type }}</li>
        
        <li>Submission</li>
        <li>{{ $service->service_submission }}</li>

        <li>Creation Date</li>
        <li>{{ $service->created_at->format('Y-d-m') }}</li>
        
        <li>Info</li>
        <li>{{ $service->info }}</li>
    </ul>

    <div class="options-container">

        <form method="post" action="{{ route('service.destroy', $service->id) }}" autocomplete="off" class="confirm-action">

            @method('delete')
            @csrf
            
            <button type="submit" class="delete-btn special-hover special-delete">
                    <span>Cancel Service assignment</span>
            </button>
        </form>
    </div>
    
</div>    

@else

    <ul class="breadcrumb margin-top-100">
        <li>
            <a href="{{ route('service.assignments') }}">Assignments Overview</a>
        </li>
    </ul>

    <h2 class="margin-top-80">this assignment does not exist</h2>

@endif

@include('layouts.service')   

@endsection


