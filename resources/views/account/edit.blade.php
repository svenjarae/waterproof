    <div class="form_container">
    <!-- Returned Fehler route('users.update') -->
        <form method="POST">
            @method('put')
            @csrf
            <div class="register-wrapper-edit">
                <label for="name">{{ __('Name') }}</label>

                <div>
                    <input id="name" type="text" name="name" value="{{ $user->name }}">

                    @error('name')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="register-wrapper-edit">
                <label for="surname">{{ __('Surname') }}</label>

                <div>
                    <input id="surname" type="text" name="surname" value="{{ $user->surname }}">

                    @error('surname')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <!-- radio gender -->  
            <div id="gender-group" class="register-wrapper-edit form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                <label for="gender">Gender</label>

                <div class="wrapper-flex">
                    <div>
                        <input id="female" type="radio" name="gender" value="Female" {{ ($user->gender) == 'Female' ? 'checked' : '' }} >
                                    
                        <label for="female">Female</label>
                    </div>
                    <div>
                        <input id="male" type="radio" name="gender" value="Male" {{ ($user->gender) == 'Male' ? 'checked' : '' }} >
                        <label for="male">Male</label>
                    </div> 
                    <div>
                        <input id="other" type="radio" name="gender" value="Others" {{ ($user->gender) == 'Others' ? 'checked' : '' }} >
                        <label for="other">Other</label>
                    </div>
                </div>

                @if ($errors->has('gender'))
                    <span>
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
                        

            <!-- date of birth --> 
            <div class="register-wrapper-edit" >
                <label for="dob">{{ __('Date Of Birth') }}</label>

                <div>
                    <input id="dob" type="date" name="dob" value="{{ $user->dob }}">

                    @error('dob')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- tel number --> 
            <div class="register-wrapper-edit" >
                <label for="phone">{{ __('Phone number') }}</label>

                <div>
                    <input type="tel" id="phone" name="phone" placeholder="" value="{{ $user->phone }}">

                    @error('phone')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- certification select--> 
            <div id="cert-group" class="register-wrapper-edit">

                <label for="certification">Dive Certification</label>

                <div class="custom-select">
                            
                    <select id="certification" name="certification">
                        <option disabled selected>Select dive certification</option>
                        <option value="No dive certification yet" {{ $user->certification == 'No dive certification yet' ? 'selected' : '' }}>No dive certification yet</option>
                        <option value="Open Water Diver" {{ $user->certification == 'Open Water Diver' ? 'selected' : '' }}>Open Water Diver</option>
                        <option value="Advanced Open Water Diver" {{ $user->certification == 'Advanced Open Water Diver' ? 'selected' : '' }}>Advanced Open Water Diver</option>
                        <option value="Rescue Diver" {{ $user->certification == 'Rescue Diver' ? 'selected' : '' }}>Rescue Diver</option>
                        <option value="Dive Master" {{ $user->certification == 'Dive Master' ? 'selected' : '' }}>Dive Master</option>
                        <option value="Dive Instructor" {{ $user->certification == 'Dive Instructor' ? 'selected' : '' }}>Dive Instructor</option>
                        <option value="Higher Level" {{ $user->certification == 'Higher Level' ? 'selected' : '' }}>Higher Level</option>
                    </select>
                            
                </div>

                @if ($errors->has('certification'))
                    <span class="error-form">
                        <strong>{{ $errors->first('certification') }}</strong>
                    </span>
                @endif
            </div>


            <!-- Number of dives select--> 
            <div id="no-of-dives-group" class="register-wrapper-edit">

                <label for="no-of-dives" class="">Number of Dives</label>

                <div class="custom-select">
                            
                    <select id="no-of-dives" name="noofdives">
                        <option disabled selected>Select number of dives</option>
                        <option value="Less than 10" {{ $user->noofdives == 'Less than 10' ? 'selected' : '' }}>Less than 10</option>
                        <option value="10-20 Dives" {{ $user->noofdives == '10-20 Dives' ? 'selected' : '' }}>10-20 Dives</option>
                        <option value="20-60 Dives" {{ $user->noofdives == '20-60 Dives' ? 'selected' : '' }}>20-60 Dives</option>
                        <option value="60-100 Dives" {{ $user->noofdives == '60-100 Dives' ? 'selected' : '' }}>60-100 Dives</option>
                        <option value="More than 100 Dives" {{ $user->noofdives == 'More than 100 Dives' ? 'selected' : '' }}>More than 100 Dives</option>
                    </select>
                            
                </div>

                @error('no-of-dives')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror         
            </div>


            <div class="register-wrapper-edit">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" name="email" value="{{ $user->email }}" autocomplete="email">

                    @error('email')
                        <span class="error-form">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="register-wrapper-edit">
                <div class="box-wrapper">
                    <button type="submit" class="submit-btn_form special-button">
                        <span class="paragraph-bright">{{ __('Update') }}</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
