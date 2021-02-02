    <div class="form_container">
        <form method="POST">
        @method('put')
        @csrf
        
            <div class="flex-row-space">
                <div class="register-wrapper">
                    <label for="country">{{ __('Country') }}</label>

                    <div>
                        <input id="country" type="text" name="country" value="{{ $user->address->country }}">

                        @error('country')
                            <span class="error-form">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="register-wrapper">
                    <label for="city">{{ __('City') }}</label>

                    <div>
                        <input id="city" type="text" name="city" value="{{ $user->address->city }}">

                        @error('city')
                            <span class="error-form">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="flex-row-space">

                <div class="register-wrapper">
                    <label for="zip">{{ __('ZIP') }}</label>

                    <div>
                        <input id="zip" type="text" name="zip" value="{{ $user->address->zip }}">

                        @error('zip')
                            <span class="error-form">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="register-wrapper">
                    <label for="street">{{ __('Street') }}</label>

                    <div>
                        <input id="street" type="text" name="street" value="{{ $user->address->street }}">

                        @error('street')
                            <span class="error-form">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <div class="box-wrapper">
                    <button type="submit" class="submit-btn_form special-button">
                        <span class="paragraph-bright">{{ __('Update') }}</span>
                    </button>
                </div>
            </div>
                
        </form>
    </div>  
