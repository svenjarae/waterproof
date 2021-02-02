

@extends('layouts.app')

@section('content')

<!-- display equipment only from logged in user -->
@if(Auth::user()->id == $equipment->user_id) 

@if(Session::has('success-message'))
    <script>
        swal('Equipment updated!', '{{ Session::get('sweetalert') }}', 'success');
    </script>
@endif

<ul class="breadcrumb margin-top-100">
  <li>
      <a href="{{ route('equipment.index') }}">Equipment Overview</a>
    </li>
  <li>Singleview {{ $equipment->getEquipmentID() }}</li>
</ul>

<h2>singleview equipment</h2>

<div class="singleview-container shadow">
    
    <h3 class="margin-bottom-20">{{ $equipment->getEquipmentID() }} {{ $equipment->equip_type }}</h3>

    <ul>
        <li>Equipment Type</li>
        <li>{{ $equipment->equip_type }}</li>
        
        <li>Status:</li>
        <li>{{ $equipment->status }}</li>

        <li>Brand:</li>
        <li>{{ $equipment->brand}}</li>
        
        <li>Date of purchase:</li>
        <li>{{ $equipment->purchase}}</li>
        
        <li>Maintenance recommendation:</li>
        <li>{{ $equipment->maintenance->format('Y-d-m') }}</li>

        @if ($equipment->status === 'expired')
            <li>Time left to maintenance</li>
            <li>-{{ $equipment->diff_in_days }} days</li>
        @else
            <li>Time left to maintenance</li>
            <li>{{ $equipment->diff_in_days }} days</li>
        @endif

        <li>Creation Date</li>
        <li>{{ $equipment->created_at->format('Y-d-m') }}</li>
        
        <li>Last update:</li>
        <li>{{ $equipment->updated_at->format('Y-d-m')}}</li>
    </ul>

    <div class="options-container">
        <button id="myBtn-editEquip" class="edit-btn special-hover special-edit">
                <span>Edit Equipment</span>
        </button>
        
        <form method="post" action="{{ route('equipment.destroy', $equipment->id) }}" autocomplete="off" class="confirm-action">
            @method('delete')
            @csrf
            <button type="submit" class="delete-btn special-hover special-delete">
                    <span>Delete Equipment</span>
            </button>
        </form>
    </div>

    
</div>    

<!--Modal edit equipment -->
<div id="myModal-editEquip" class="modal-editEquip">
    <!--content -->
    <div class="modal-content-editEquip shadow">
        <span class="close-editEquip">&times;</span>
        <!-- load edit form  -->
        <p>@include('equipment.edit')</p>
    </div>
</div>

@else

    <ul class="breadcrumb margin-top-100">
        <li>
            <a href="{{ route('equipment.index') }}">Equipment Overview</a>
        </li>
    </ul>

    <h2 class="margin-top-80">this equipment does not exist</h2>

@endif

@include('layouts.service')   

@endsection




