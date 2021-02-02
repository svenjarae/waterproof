@extends('layouts.app')

@section('content')
    <div class="container register-margin-top">
        <div class="content">

            <h2 class="auth-form-header">{{ __('Register') }}</h2>

            <!-- Multistep Form -->
            <div class="main">

                <!-- Progressbar -->
                <ul id="progressbar">
                        <li id="active1">
                            Main Details
                            <span id="dot-first"></span>
                        </li>
                        <li>
                            <hr> 
                        </li>
                        <li id="active2">
                            Personal Information
                            <span id="dot-second"></span>
                        </li>
                        <li>
                            <hr>
                        </li>
                        <li id="active3">
                            Educational Level
                            <span id="dot-third"></span>
                        </li>
                    </ul>

                <form class="regform create-acc-form content-animate shadow" method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                    <!-- Fieldsets -->
                    <fieldset id="first" class="content-animate">
                        
                        <div class="flex-row-space">
                            <!-- name -->
                            <div class="register-wrapper">
                                <label for="name">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name">

                                    @error('name')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- surname -->
                            <div class="register-wrapper">
                                <label for="surname">{{ __('Surname') }}</label>

                                <div>
                                    <input id="surname" type="text" name="surname" value="{{ old('surname') }}" placeholder="Surname">

                                    @error('surname')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex-row-space">
                            <!-- gender -->
                            <div id="gender-group" class="register-wrapper form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender">Gender</label>

                                <div class="wrapper-flex">
                                    <div>
                                        <input id="female" type="radio" name="gender" value="Female" {{ (old('gender') == 'Female') ? 'checked' : '' }} >
                                                
                                        <label for="female">Female</label>
                                    </div>
                                    <div>
                                        <input id="male" type="radio" name="gender" value="Male" {{ (old('gender') == 'Male') ? 'checked' : '' }} >
                                        <label for="male">Male</label>
                                    </div> 
                                    <div>
                                        <input id="other" type="radio" name="gender" value="Others" {{ (old('gender') == 'Others') ? 'checked' : '' }} >
                                        <label for="other">Other</label>
                                    </div>
                                </div>

                                @if ($errors->has('gender'))
                                    <span class="error-form">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- email -->
                            <div class="register-wrapper">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="example@mail.com">

                                    @error('email')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>    

                        <div class="flex-row-space">
                            <!-- password -->
                            <div class="register-wrapper">
                                <label for="password">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" name="password" placeholder="Password">

                                    @error('password')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- password confirm-->
                            <div class="register-wrapper">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm password">
                                </div>

                                @error('password-confirm')
                                    <span class="error-form">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                        </div>

                        <div class="flex-row-space register-display-column">
                            @if (Route::has('password.request'))
                                
                                <a class="question-form" href="{{ route('login') }}">
                                    <span>Already have an account?</span> 
                                    <span class="underline">Log in.</span>
                                </a>
                            @endif

                            <div id="next_btn1-container">
                                <button class="next-btn_form special-hover" id="next_btn1" onclick="next_step1()" type="button">
                                   <span class="paragraph-bright">Next</span> 
                                </button>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset id="second" class="content-animate">
                        <div class="flex-row-space">
                            <!-- date of birth --> 
                            <div class="register-wrapper" >
                                <label for="dob">{{ __('Date Of Birth') }}</label>

                                <div>
                                    <input id="dob" type="date" name="dob" value="{{ old('dob') }}">

                                    @error('dob')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- tel number --> 
                            <div class="register-wrapper" >
                                <label for="phone">{{ __('Phone number') }}</label>

                                <div>
                                    <input type="tel" id="phone" name="phone" placeholder="Phone number" value="{{ old('phone') }}">

                                    @error('phone')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex-row-space">
                            <!-- Address -->
                            <!-- Country -->
                            <div class="register-wrapper" >
                                <label for="country_register">{{ __('Country') }}</label>

                                <div>
                                    <input type="text" id="country_register" name="country" placeholder="Country" value="{{ old('country') }}">

                                    @error('country')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="register-wrapper" >
                                <label for="city_register">{{ __('City') }}</label>

                                <div>
                                    <input type="text" id="city_register" name="city" placeholder="City" value="{{ old('city') }}">

                                    @error('city')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex-row-space">
                            <div class="register-wrapper" >
                                <label for="zip_register">{{ __('ZIP') }}</label>

                                <div>
                                    <input type="text" id="zip_register" name="zip" placeholder="ZIP" value="{{ old('zip') }}">

                                    @error('zip')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="register-wrapper">
                                <label for="street_register">{{ __('Street') }}</label>

                                <div>
                                    <input type="text" id="street_register" name="street" placeholder="Street" value="{{ old('street') }}">

                                    @error('street')
                                        <span class="error-form">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="btn-flex">
                            <input class="prev-btn_form" id="pre_btn1" onclick="prev_step1()" type="button" value="Previous">
                            <button class="next-btn_form special-hover" id="next_btn2" onclick="next_step2()" type="button">
                                <span class="paragraph-bright">Next</span> 
                            </button>
                        </div>

                    </fieldset>

                    <fieldset id="third" class="content-animate">
                        <!-- certification select--> 
                        <div id="cert-group" class="register-wrapper">

                            <label for="certification">Dive Certification</label>

                            <div class="custom-select">

                                <select id="certification" name="certification">
                                    <option disabled selected>Select dive certification</option>
                                    <option value="No dive certification yet" {{ old('certification') == 'No dive certification yet' ? 'selected' : '' }}>No dive certification yet</option>
                                    <option value="Open Water Diver" {{ old('certification') == 'Open Water Diver' ? 'selected' : '' }}>Open Water Diver</option>
                                    <option value="Advanced Open Water Diver" {{ old('certification') == 'Advanced Open Water Diver' ? 'selected' : '' }}>Advanced Open Water Diver</option>
                                    <option value="Rescue Diver" {{ old('certification') == 'Rescue Diver' ? 'selected' : '' }}>Rescue Diver</option>
                                    <option value="Dive Master" {{ old('certification') == 'Dive Master' ? 'selected' : '' }}>Dive Master</option>
                                    <option value="Dive Instructor" {{ old('certification') == 'Dive Instructor' ? 'selected' : '' }}>Dive Instructor</option>
                                    <option value="Higher Level" {{ old('certification') == 'Higher Level' ? 'selected' : '' }}>Higher Level</option>
                                </select>

                            </div>

                            @if ($errors->has('certification'))
                                <span class="error-form">
                                    <strong>{{ $errors->first('certification') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Number of dives select--> 

                        <div id="no-of-dives-group" class="register-wrapper">
                            <label for="no-of-dives" class="">Number of Dives</label>

                            <div class="custom-select">
                                <select id="no-of-dives" name="noofdives">
                                    <option disabled selected>Select number of dives</option>
                                    <option value="Less than 10" {{ old('noofdives') == 'Less than 10' ? 'selected' : '' }}>Less than 10</option>
                                    <option value="10-20 Dives" {{ old('noofdives') == '10-20 Dives' ? 'selected' : '' }}>10-20 Dives</option>
                                    <option value="20-60 Dives" {{ old('noofdives') == '20-60 Dives' ? 'selected' : '' }}>20-60 Dives</option>
                                    <option value="60-100 Dives" {{ old('noofdives') == '60-100 Dives' ? 'selected' : '' }}>60-100 Dives</option>
                                    <option value="More than 100 Dives" {{ old('noofdives') == 'More than 100 Dives' ? 'selected' : '' }}>More than 100 Dives</option>
                                </select>
                            </div>

                            @error('noofdives')
                                <span class="error-form">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="register-wrapper">
                            <input class="margin-bottom-20" type="checkbox" name="terms" id="terms" onchange="activateButton(this)">  I agree to Terms & Coditions!
                        </div>
                        
                        <div class="btn-flex">
                            <input class="prev-btn_form" id="pre_btn2" onclick="prev_step2()" type="button" value="Previous">

                            <button type="submit" id="submit" class="submit-btn_form special-button">
                                <span class="paragraph-bright">{{ __('Register') }}</span>
                            </button>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection
