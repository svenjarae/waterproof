<!-- route('account.passwordUpdate') -->
<form method="POST" class="padding-mid">
    @method('put')
    @csrf

    <div class="flex-row-space">
        <div class="register-wrapper">
            <label for="password">Password</label>

            <div>
                <input id="password" type="password" name="password" autocomplete="new-password" value="{{ $user->password }}">

                @error('password')
                    <span class="error-form">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="register-wrapper">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <div>
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
            </div>

            @error('password-confirm')
                <span class="error-form">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div>
        <div class="box-wrapper">
            <button type="submit" class="submit-btn_form special-button">
                <span class="paragraph-bright">{{ __('Update Password') }}</span>
            </button>
        </div>
    </div>
</form>