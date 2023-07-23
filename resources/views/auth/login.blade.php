<x-layout-front>


    <div class="container py-4 py-lg-5 my-4" style="text-align: left;">
        <div class="mx-auto __max-w-620">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <h2 class="h4 mb-1">{{ __('Sign in')}}</h2>
                    <form class="needs-validation mt-2" autocomplete="off" action="{{ route('login') }}"
                        method="post" id="form-id">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> {{ __('Alert!')}}</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="si-email">{{ __('Email address')}}
                                / {{ __('Phone')}}</label>
                            <input class="form-control" type="text" name="email" id="si-email"
                                style="text-align: left;" value=""
                                placeholder="Enter email address or phone number" required>
                            <div class="invalid-feedback">{{ __('Please provide valid email or phone number')}}
                                .
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="si-password">{{ __('Password')}}</label>
                            <div class="password-toggle">
                                <input class="form-control" name="password" type="password" id="si-password"
                                    style="text-align: left;" required>
                                <label class="password-toggle-btn">
                                    <input class="custom-control-input" type="checkbox"><i
                                        class="czi-eye password-toggle-indicator"></i><span class="sr-only">{{ __('Show Password')}} </span>
                                </label>
                            </div>
                        </div>

                        <div id="recaptcha_element" class="w-100" data-type="image"></div>
                        <br />
                        <button class="btn btn--primary btn-block btn-shadow" type="submit">{{ __('Sign in')}}</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 d-flex flex-wrap justify-content-around justify-content-md-between align-items-center __gap-15"
                            style="direction: ltr">
                            <div class="ml-2">
                                <h6 class="m-0">{{ __('No account Sign up now')}}</h6>
                            </div>
                            <div class="">
                                <a class="btn btn-outline-primary"
                                    href="{{ route('register')}}">
                                    <i class="fa fa-user-circle"></i> {{ __('Sign up')}}
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout-front>
