

    <div class="form_container">
        <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
        @method('put')
        @csrf

            <div class="select-label_wrapper">
                <div>
                    <label class="select-label" for="equip_type">Type of equipment</label>
                </div>
                <div class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path d="M10.243,1.757a6,6,0,0,0-8.485,8.485,6,6,0,0,0,8.485-8.485ZM6,1.641A1.289,1.289,0,1,1,4.711,2.93,1.291,1.291,0,0,1,6,1.641Zm1.641,8.2H4.359v-.7h.7V5.625h-.7v-.7H6.937V9.141h.7Z" fill="#ff7e27"/></svg>
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </div>

            <div class="form_wrapper custom-select">
                <select id="equip_type" name="equip_type">
                    <option disabled selected>Select equipment type</option>
                    <option value="Jacket" {{ $equipment->equip_type == 'Jacket' ? 'selected' : '' }}>Jacket</option>
                    <option value="Tank" {{ $equipment->tank == 'equip_type' ? 'selected' : '' }}>Tank</option>
                    <option value="Regulator" {{ $equipment->equip_type == 'Regulator' ? 'selected' : '' }}>Regulator</option>
                    <option value="Dive_computer" {{ $equipment->equip_type == 'Dive_computer' ? 'selected' : '' }}>Dive Computer</option>
                    <option value="Dry-wetsuit" {{ $equipment->equip_type == 'Dry-wetsuit' ? 'selected' : '' }}>Drysuit/Wetsuit</option>
                    <option value="Cylinder-valves" {{ $equipment->equip_type == 'Cylinder-valves' ? 'selected' : '' }}>Cylinder valves</option>
                    <option value="Abc" {{ $equipment->equip_type == 'Abc' ? 'selected' : '' }}>Abc</option>
                    <option value="Others" {{ $equipment->equip_type == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('equip_type')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form_wrapper">
                <label for="equip-brand">Name of manufacturer or brand</label>
                <input type="text" id="equip-brand" name="brand" value="{{ $equipment->brand }}" placeholder="Brand">
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
                    <span class="tooltiptext">Tooltip text</span>
                </div>
            </div>

            <div class="form_wrapper custom-select">
                <select id="condition" name="condition">
                    <option disabled selected>Select current condition</option>
                    <option value="as-new" {{ $equipment->condition == 'as-new' ? 'selected' : '' }}>As new</option>
                    <option value="intact" {{ $equipment->condition == 'intact' ? 'selected' : '' }}>Intact</option>
                    <option value="has-seen-better-days" {{ $equipment->condition == 'has-seen-better-days' ? 'selected' : '' }}>Has seen better days</option>
                    <option value="not-complete" {{ $equipment->condition == 'not-complete' ? 'selected' : '' }}>Not complete (Missing or broken parts)</option>
                </select>
                @error('condition')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form_wrapper">
                <label for="equip-date">Date of purchase</label>
                <input type="date" id="equip-date" name="purchase" value="{{ $equipment->purchase }}">
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
                        <span class="tooltiptext">Tooltip text</span>
                    </span>
                </span>
                <input type="date" id="equip-maintenance" name="maintenance" value="{{ $equipment->maintenance->format('Y-d-m') }}">
                @error('maintenance')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form_wrapper">
                <label for="equip-info">Further Information (optional)</label>
                <textarea name="info" id="equip-info" cols="10" rows="1" value="">{{ $equipment->info }}</textarea>
                @error('info')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-btn_wrapper">
                <div> 
                    <button class="special-button" type="submit" >
                        <span class="paragraph-bright">Save </span>
                    </button>
                </div>
            </div>
            
        </form>
    </div>
