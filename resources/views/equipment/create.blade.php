@extends('layouts.app')

@section('content')

    <div class="sub_nav_container">
        <ul class="sub_nav">
            <li>
                <a class="subnav-hover" href="{{ url('equipment') }}">
                    <span>Equipment Overview</span>
                </a>
            </li>
            <li>
                <a class="active-sub" href="{{ url('equipment/add') }}">Add Equipment</a>
            </li>
        </ul>
    </div>
    <div class="headline-search_container">
        <div>
            <h2 class="headline_withNav">add equipment</h2>
        </div>
    </div>

    <div class="form_container shadow content-animate">
        <form action="/equipment" method="POST">
        @csrf

            <div class="select-label_wrapper">
                <div>
                    <label class="select-label" for="equip_type">Type of equipment</label>
                </div>
                <div class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                    <span class="tooltiptext">Simply select one of the listed assets!</span>
                </div>
            </div>

            <div class="form_wrapper custom-select">
                <select id="equip_type" name="equip_type">
                    <option disabled selected>Select equipment type</option>
                    <option value="Jacket" {{ old('equip_type') == 'Jacket' ? 'selected' : '' }}>Jacket</option>
                    <option value="Tank" {{ old('equip_type') == 'Tank' ? 'selected' : '' }}>Tank</option>
                    <option value="Regulator" {{ old('equip_type') == 'Regulator' ? 'selected' : '' }}>Regulator</option>
                    <option value="Dive-computer" {{ old('equip_type') == 'Dive_computer' ? 'selected' : '' }}>Dive Computer</option>
                    <option value="Dry-wetsuit" {{ old('equip_type') == 'Dry-wetsuit' ? 'selected' : '' }}>Drysuit/Wetsuit</option>
                    <option value="Cylinder-valves" {{ old('equip_type') == 'Cylinder-valves' ? 'selected' : '' }}>Cylinder valves</option>
                    <option value="Abc" {{ old('equip_type') == 'Abc' ? 'selected' : '' }}>Abc</option>
                    <option value="Others" {{ old('equip_type') == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('equip_type')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form_wrapper">
                <label for="equip-brand">Name of manufacturer or brand</label>
                <input type="text" id="equip-brand" name="brand" value="{{ old('brand') }}" placeholder="Brand">
                @error('brand')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="select-label_wrapper">
                <div>
                    <label class="select-label" for="condition">Condition of equipment</label>
                </div>
                <div class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                    <span class="tooltiptext">Please use the info input for more details.</span>
                </div>
            </div>

            <div class="form_wrapper custom-select">
                <select id="condition" name="condition">
                    <option disabled selected>Select current condition</option>
                    <option value="as-new" {{ old('condition') == 'as-new' ? 'selected' : '' }}>As new</option>
                    <option value="intact" {{ old('condition') == 'intact' ? 'selected' : '' }}>Intact</option>
                    <option value="has-seen-better-days" {{ old('condition') == 'has-seen-better-days' ? 'selected' : '' }}>Has seen better days</option>
                    <option value="not-complete" {{ old('condition') == 'not-complete' ? 'selected' : '' }}>Not complete (Missing or broken parts)</option>
                </select>
                @error('condition')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
  
            <div class="form_wrapper">
                <label for="equip-date">Date of purchase</label>
                <input type="date" id="equip-date" name="purchase" value="{{ old('purchase') }}">
                @error('purchase')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form_wrapper">
                <span class="select-label_wrapper">
                    <label for="equip-maintenance">Maintenance reference</label>
                    <span class="tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                        <span class="tooltiptext">The upkeep can be found in the user manual</span>
                    </span>
                </span>
                <input type="date" id="equip-maintenance" name="maintenance">
                @error('maintenance')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form_wrapper">
                <label for="equip-info">Further Information (optional)</label>
                <textarea name="info" id="equip-info" cols="10" rows="1" value="{{ old('info') }}" placeholder="Info"></textarea>
                @error('info')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form_wrapper_small">
                <small>*All inputs are required accept the ones which are labeled 'optional'</small>
            </div>

            <div class="form-btn_wrapper">
                <div> 
                    <button class="special-button" type="submit" >
                        <span class="paragraph-bright">Save </span>
                    </button>
                </div>
                <div class="form-btn-cancel_container">
                    <a href="{{ url('equipment') }}">
                        Cancel
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10" viewBox="0 0 10 10"><defs><style>.a{fill:#fff;stroke:#707070;}.b{clip-path:url(#a);}</style><clipPath id="a"><rect class="a" width="10" height="10" transform="translate(270 1115)"/></clipPath></defs><g class="b" transform="translate(-270 -1115)"><path d="M6.2,5.248l4.083-4.083A.679.679,0,0,0,9.326.2L5.243,4.288,1.16.2A.679.679,0,0,0,.2,1.166L4.282,5.248.2,9.331a.679.679,0,1,0,.961.961L5.243,6.209l4.083,4.083a.679.679,0,0,0,.961-.961Zm0,0" transform="translate(270 1114.994)"/></g></svg>
                    </a>
                </div>
            </div>
            
        </form>
    </div>

    @include('layouts.service')
    

@endsection