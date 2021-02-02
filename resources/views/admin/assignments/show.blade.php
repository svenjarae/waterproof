@extends('layouts.app')

@section('content')

    @if(Session::has('success-message'))
        <script>
            swal('Assignment updated!', '{{ Session::get('sweetalert') }}', 'success');
        </script> 
    @endif

    <ul class="breadcrumb margin-top-100">
        <li>
            <a href="{{ route('service.assignments') }}">Assignemnts Overview</a>
            </li>
        <li>Singleview {{ $service->getServiceID() }}</li>
    </ul>

    <h2>singleview assignment</h2>

    <!-- <a href="">Back to ASSIGNMENT Overview</a> or bread crumbs-->

    <div class="singleview-container shadow">

        <h3 class="margin-bottom-20">Assignment Details - {{ $service->getServiceID() }}</h3>

        <ul>
            <li>Status</li>
            <li>{{ $service->status }}</li>

            <li>Cost estimate</li>
            <li>{{ $service->cost}}</li>

            <li>From Customer</li>
            <li>
                <a href="{{ route('admin.customer.show', $service->user->id) }}">{{ $service->user->getUserID() }}</a>
            </li>
                

            <li>Equipment Type</li>
            <li>{{ $service->equipment_type }}</li>
            
            <li>Service Type</li>
            <li>{{ $service->service_type }}</li>
            
            <li>Submission</li>
            <li>{{ $service->service_submission }}</li>

            <li>Creation Date</li>
            <li>{{ $service->created_at }}</li>
            
            <li>Info</li>
            <li>{{ $service->info }}</li>
        </ul>

    </div>    

    <div class="flex-row-space">
        <div class="singleview-container admin-form-equipment shadow">
            <h3 class="margin-bottom-20"> Equipment Details - {{ $service->equipment->getEquipmentID() }}</h3>

            <ul>
                <li>Type of equipment</li>
                <li>{{ $service->equipment->equip_type }}</li>

                <li>Name of manufacturer or brand</li>
                <li>{{ $service->equipment->brand}}</li>

                <li>Condition of equipment</li>
                <li>{{ $service->equipment->condition }}</li>

                <li>Date of purchase</li>
                <li>{{ $service->equipment->purchase }}</li>
                    
                <li>Maintenance reference</li>
                <li>{{ $service->equipment->maintenance }}</li>
                    
                <li>Further Information</li>
                <li>{{ $service->equipment->info }}</li>

                <li>Creation Date</li>
                <li>{{ $service->equipment->created_at }}</li>
                    
                <li>Last Updated at</li>
                <li>{{ $service->equipment->updated_at }}</li>
            </ul>
        </div>

        <div class="admin-form shadow">

            <form class="change-value-admin" action="{{ route('admin.assignments.update', $service->id) }}" method="POST">
                @method('put')
                @csrf
                    <div class="select-label_wrapper">
                        <div>
                            <label class="select-label" for="assignment_status">Change status</label>
                        </div>
                        <div class="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                            <span class="tooltiptext">Tooltip text</span>
                        </div>
                    </div>
                    
                    <div class="custom-select admin-form-container">
                        <select id="assignment_status" name="status">
                            <option disabled selected>{{ $service->status }}</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Open</option>
                            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Processing</option>
                            <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Closed</option>
                        </select>
                        @error('status')
                            <span class="error-form">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form_wrapper admin-form-container">
                        <label for="service_cost">Cost estimate</label>
                        <input type="text" id="service_cost" name="cost" placeholder="Cost" value="{{ $service->cost }}">
                    </div>

                    <div>
                        <div> 
                            <button class="special-button" type="submit" >
                                <span class="paragraph-bright">Save </span>
                            </button>
                        </div>
                    </div>
            </form>

            <form class="admin-form-delete confirm-action" method="POST" action="{{ route('admin.assignments.destroy', $service->id) }}">

                    @method('delete')
                    @csrf
                    
                    <button type="submit" class="delete-btn special-hover special-delete">
                            <span>Cancellation</span>
                    </button>
            </form>

        </div>
    </div>
    

@endsection
