@extends('layouts.app')
@section('content')

<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile" style="background-image: url({{asset('demo11/assets/media/bg/bg-3.jpg')}}">
        <div class="kt-login__left">
            <div class="kt-login__wrapper">
                <div class="kt-login__content">
                    <a class="kt-login__logo" href="#">
                        <img src="{{asset('demo11/assets/media/logos/logo-5.png')}}">
                    </a>
                    <h3 class="kt-login__title">JOIN OUR GREAT COMMUNITY</h3>
                    <span class="kt-login__desc">
                        The ultimate Bootstrap & Angular 6 admin theme framework for next generation web apps.
                    </span>
                    <div class="kt-login__actions">
                        <button type="button" id="kt_login_signup" class="btn btn-outline-brand btn-pill">Get An Account</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-login__divider">
            <div></div>
        </div>
        <div class="kt-login__right">
            <div class="kt-login__wrapper">
                <div class="kt-login__signin">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Login To Your Account</h3>
                    </div>
                    <div class="kt-login__form">
                        <form class="kt-form" method="POST" action="{{ route('login') }}">
                            <div class="form-group">
                                @csrf
                                <input class="form-control" type="email" placeholder="Username" autocomplete="off" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row kt-login__extra">
                                <div class="col kt-align-left">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember"> Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col kt-align-right">
                                    <a href="javascript:;" id="kt_login_forgot" class="kt-link">Forget Password ?</a>
                                </div>
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate" type="submit" class="btn btn-primary">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="kt-login__forgot">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Forgotten Password ?</h3>
                        <div class="kt-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <div class="kt-login__form">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="kt_email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_forgot_submit" type="submit" class="btn btn-brand btn-pill btn-elevate">Request</button>
                                <button id="kt_login_forgot_cancel" class="btn btn-outline-brand btn-pill">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
 var KTLoginGeneral = function() {
        var login = $('#kt_login');

        var showErrorMsg = function(form, type, msg) {
            var alert = $('<div class="alert alert-' + type + ' alert-dismissible" role="alert">\
                <div class="alert-text">'+msg+'</div>\
                <div class="alert-close">\
                    <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
                </div>\
            </div>');

            form.find('.alert').remove();
            alert.prependTo(form);
            //alert.animateClass('fadeIn animated');
            KTUtil.animateClass(alert[0], 'fadeIn animated');
            alert.find('span').html(msg);
        }

        // Private Functions
        var displaySignUpForm = function() {
            login.removeClass('kt-login--forgot');
            login.removeClass('kt-login--signin');

            login.addClass('kt-login--signup');
            KTUtil.animateClass(login.find('.kt-login__signup')[0], 'flipInX animated');
        }

        var displaySignInForm = function() {
            login.removeClass('kt-login--forgot');
            login.removeClass('kt-login--signup');

            login.addClass('kt-login--signin');
            KTUtil.animateClass(login.find('.kt-login__signin')[0], 'flipInX animated');
            //login.find('.kt-login__signin').animateClass('flipInX animated');
        }

        var displayForgotForm = function() {
            login.removeClass('kt-login--signin');
            login.removeClass('kt-login--signup');

            login.addClass('kt-login--forgot');
            //login.find('.kt-login--forgot').animateClass('flipInX animated');
            KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');

        }

        var handleFormSwitch = function() {
            $('#kt_login_forgot').click(function(e) {
                e.preventDefault();
                displayForgotForm();
            });

            $('#kt_login_forgot_cancel').click(function(e) {
                e.preventDefault();
                displaySignInForm();
            });

            $('#kt_login_signup').click(function(e) {
                e.preventDefault();
                displaySignUpForm();
            });

            $('#kt_login_signup_cancel').click(function(e) {
                e.preventDefault();
                displaySignInForm();
            });
        }

        var handleSignInFormSubmit = function() {
            $('#kt_login_signin_submit').click(function(e) {
                e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');

                form.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }

                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                login = $("#form-login").attr('action');
                form.ajaxSubmit({
                    url: login,
                    success: function(response, status, xhr, $form) {
                        location.reload();
                        // similate 2s delay

                    },error:function(response, status, xhr,$form){
                        setTimeout(function() {
                            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
                        }, 2000);
                    },
                });
            });
        }

        var handleSignUpFormSubmit = function() {
            $('#kt_login_signup_submit').click(function(e) {
                e.preventDefault();

                var btn = $(this);
                var form = $(this).closest('form');

                form.validate({
                    rules: {
                        fullname: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        },
                        rpassword: {
                            required: true
                        },
                        agree: {
                            required: true
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }

                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                register = $("#form-register").attr('action');
                form.ajaxSubmit({
                    url: register,
                    success: function(response, status, xhr, $form) {
                        location.reload();
                        setTimeout(function() {
                            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                            form.clearForm();
                            form.validate().resetForm();

                            // display signup form
                            displaySignInForm();
                            var signInForm = login.find('.kt-login__signin form');
                            signInForm.clearForm();
                            signInForm.validate().resetForm();

                            showErrorMsg(signInForm, 'success', 'Thank you. To complete your registration please check your email.');
                        }, 2000);
                    }
                });
            });
        }

        var handleForgotFormSubmit = function() {
            $('#kt_login_forgot_submit').click(function(e) {
                e.preventDefault();

                var btn = $(this);
                var form = $(this).closest('form');

                form.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }

                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                forgot = $("#form-forgot").attr('action');
                form.ajaxSubmit({
                    url:forgot,
                    success: function(response, status, xhr, $form) {
                        // similate 2s delay
                        setTimeout(function() {

                            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
                            form.clearForm(); // clear form
                            form.validate().resetForm(); // reset validation states

                            // display signup form
                            displaySignInForm();
                            var signInForm = login.find('.kt-login__signin form');
                            signInForm.clearForm();
                            signInForm.validate().resetForm();

                            showErrorMsg(signInForm, 'success', 'Instruksi pemulihan kata sandi telah dikirim ke email Anda.');
                        }, 2000);
                    }
                });
            });
        }

    // Public Functions
    return {
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleSignUpFormSubmit();
            handleForgotFormSubmit();
        }
    };
    }();
    jQuery(document).ready(function() {
        KTLoginGeneral.init();
    });
</script>
@endpush
