@extends('layouts.app')

@section('content')

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="subnav-hover" href="{{ route('service.index') }}">Service Offer</a>
            </li>
            <li>
                <a class="active-sub" href="{{ route('service.create') }}">Service Request</a>
            </li>
            <li>
                <a class="subnav-hover" href="{{ route('service.assignments') }}">Assignments</a>
            </li>
        </ul>
    </div>
    <div class="headline-search_container">
        <div>
            <h2 class="headline_withNav">service request</h2>
        </div>
    </div>

    <div class="form_container shadow">
        <form action="/service/assignments" method="POST">
        @csrf

            <div class="select-label_wrapper">
                <div>
                    <label class="select-label" for="equipment_type">Type of equipment</label>
                </div>
                <div class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </div>

            @if ($countEquipmentUser == 0)
                <div class="margin-bottom-40">
                    <p class="margin-bottom-20">You have not created equipment yet.</p>
                    <a href="{{ route('equipment.create') }}" class="help-link special-hover">
                        <span class="paragraph-bright">Add Equipment</span>   
                    </a>
                </div>
            @else

            <div class="form_wrapper custom-select">

                <select id="equipment_type" name="equipment_type">
                        <option disabled selected>Select equipment type</option>
                    <!-- php Datenausgabe / Start Loop -->

                    @foreach($equipment as $singleEquipment)
                            <option value="{{ $singleEquipment->getEquipmentID() }} {{ $singleEquipment->equip_type }} {{ $singleEquipment->brand }}">{{ $singleEquipment->getEquipmentID() }} {{ $singleEquipment->equip_type }} {{ $singleEquipment->brand }}</option>
                    @endforeach
                </select>

                @error('equipment_type')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror 
            </div>
            @endif
            
            <div class="select-label_wrapper">
                <div>
                    <label class="select-label" for="service_type">Type of service</label>
                </div>
                <div class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </div>

            <div class="form_wrapper custom-select">
                <select id="service_type" name="service_type">
                    <option disabled selected>Select service type</option>
                    <option value="maintenance" {{ old('service_type') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    <option value="repair" {{ old('service_type') == 'repair' ? 'selected' : '' }}>Repair</option>
                    <option value="others" {{ old('service_type') == 'others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('service_type')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        
            <div class="form_wrapper form_radio">
                @error('service_submission')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                <span class="select-label_wrapper">
                    <label for="service_submission">Submission</label>
                    <span class="tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                        <span class="tooltiptext">Tooltip text</span>
                    </span>
                </span>

                <div>
                    <input type="radio" id="service_shipping" name="service_submission" value="service_shipping" {{ (old('service_submission') == 'service_shipping') ? 'checked' : '' }}>
                    <label for="service_shipping">Request shipping label</label>
                </div>

                <div>
                    <input type="radio" id="service_deliver" name="service_submission" value="service_deliver" {{ (old('service_submission') == 'service_deliver') ? 'checked' : '' }}>
                    <label for="service_deliver">deliver equipment by yourself</label>
                </div>
            </div>


            <div class="form_wrapper">
                <label for="service-info">Further Information (optional)</label>
                <textarea name="info" id="service-info" cols="10" rows="1"></textarea>
            </div>

            <div class="form_wrapper_small">
                <small>*All inputs are required accept the ones which are labeled 'optional'</small>
            </div>

            <div class="form-btn_wrapper">
                <div> 
                    <button class="special-button" type="submit" >
                        <span class="paragraph-bright">Send</span>
                    </button>
                </div>
                <div class="form-btn-cancel_container">
                    <a href="{{ route('service.assignments') }}">
                        Cancel
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10" viewBox="0 0 10 10"><defs><style>.a{fill:#fff;stroke:#707070;}.b{clip-path:url(#a);}</style><clipPath id="a"><rect class="a" width="10" height="10" transform="translate(270 1115)"/></clipPath></defs><g class="b" transform="translate(-270 -1115)"><path d="M6.2,5.248l4.083-4.083A.679.679,0,0,0,9.326.2L5.243,4.288,1.16.2A.679.679,0,0,0,.2,1.166L4.282,5.248.2,9.331a.679.679,0,1,0,.961.961L5.243,6.209l4.083,4.083a.679.679,0,0,0,.961-.961Zm0,0" transform="translate(270 1114.994)"/></g></svg>
                    </a>
                </div>
            </div>
            
        </form>

        
    </div>

@include('layouts.service')

@endsection

