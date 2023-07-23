<x-layout-front>

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

  <style>
    .__shop-apply {
    max-width: 900px;
    margin: 0 auto;
}
  </style>





    <div class="container py-4 py-lg-5 my-4" style="text-align: left;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                         <div class="text-center mb-4">
                            <button class="btn btn-primary btn-lg" style="background: #3b71de;border-color: #3b71de;" onclick="showUserForm()">{{ __('Register as User')}}</button>
                            <button class="btn btn-primary btn-lg" style="background: #3b71de;border-color: #3b71de;" onclick="showSellerForm()">{{ __('Register as Seller')}}</button>
                        </div>

                        {{-- User Register --}}
                        <div id="userRegisterForm">
                            {{-- User Register --}}
                            <div class="container py-4 py-lg-5 my-4 __inline-7" style="text-align: left;">
                                    <div class="row justify-content-center">
                                        <div class="col-md-11">
                                            <div class="card border-0 box-shadow">
                                                <div class="card-body">
                                                    <h2 class="h4 mb-1">{{ __('Sign up')}}</h2>
                                                    <p class="font-size-sm text-muted mb-4">{{ __('No Account ? Register control your order')}}
                                                        .</p>



                                                    <form class="needs-validation_" id="form-id"
                                                        action="{{ route('register')}}" method="post" id="sign-up-form">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reg-fn">{{ __('First name')}}</label>
                                                                    <input class="form-control" value="{{old('first_name') }}" type="text" name="first_name"
                                                                        style="text-align: left;" required>
                                                                    <div class="invalid-feedback">{{ __('Please enter your first name!')}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reg-ln">{{ __('Last name')}}</label>
                                                                    <input class="form-control" type="text" value="{{ old('last_name')}}" name="last_name"
                                                                        style="text-align: left;">
                                                                    <div class="invalid-feedback">{{ __('Please enter your last name!')}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reg-email">{{ __('Email address')}}</label>
                                                                    <input class="form-control" type="email" value="{{ old('email')}}" name="email"
                                                                        style="text-align: left;" required>
                                                                    <div class="invalid-feedback">{{ __('Please enter valid email address!')}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reg-phone">{{ __('Phone number')}}
                                                                        <small class="text-primary">( {{ __('* Country code is must Like for BD 880')}}
                                                                            )</small></label>
                                                                    <input class="form-control" type="number" value="{{ old('phone')}}" name="phone"
                                                                        style="text-align: left;" required>
                                                                    <div class="invalid-feedback">{{ __('Please enter your phone number!')}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="si-password">{{ __('Password')}}</label>
                                                                    <div class="password-toggle">
                                                                        <input class="form-control" name="password" type="password" id="si-password"
                                                                            style="text-align: left;" placeholder="{{ __('Minimum 8 characters long')}}"
                                                                            required>
                                                                        <label class="password-toggle-btn">
                                                                            <input class="custom-control-input" type="checkbox"><i
                                                                                class="czi-eye password-toggle-indicator"></i><span
                                                                                class="sr-only">{{ __('Show Password')}} </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="si-password">{{ __('Confirm password')}}</label>
                                                                    <div class="password-toggle">
                                                                        <input class="form-control" name="password_confirmation" type="password"
                                                                            style="text-align: left;" placeholder="{{ __('Minimum 8 characters long')}}"
                                                                            id="si-password" required>
                                                                        <label class="password-toggle-btn">
                                                                            <input class="custom-control-input" type="checkbox"
                                                                                style="text-align: left;"><i
                                                                                class="czi-eye password-toggle-indicator"></i><span
                                                                                class="sr-only">{{ __('Show Password')}} </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group d-flex flex-wrap justify-content-between">
                                                            <label class="form-group mb-1 d-flex align-items-center">
                                                                <strong>
                                                                    <input type="checkbox" class="mr-1"   id="inputCheckd">
                                                                </strong>
                                                                <span class="mb-4px d-block w-0 flex-grow pl-1"> <span>{{ __('I agree to Your')}}</span> <a
                                                                        class="font-size-sm" target="_blank"
                                                                        href="https://6valley.6amtech.com/terms">
                                                                        {{ __('Terms and conditions')}}
                                                                    </a></span>
                                                            </label>
                                                        </div>
                                                        <div id="recaptcha_element" class="w-100" data-type="image"></div>
                                                        <br />
                                                        <div class="flex-between row" style="direction: ltr">
                                                            <div class="mx-1">
                                                                <div class="text-right">
                                                                    <button class="btn btn--primary" id="sign-up" type="submit" >

                                                                        {{ __('Sign up')}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="mx-1">
                                                                <a class="btn btn-outline-primary"
                                                                    href="{{ route('login') }}">
                                                                    <i class="fa fa-sign-in"></i> {{ __('Sign in')}}
                                                                </a>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <div class="row">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        {{-- Seller Register --}}
                        <div id="sellerRegisterForm" style="display: none;">
                            {{-- Seller Register --}}
                            <div class="container py-5 rtl" style="text-align: left;">
                                <form class="__shop-apply" action="{{ route('register.seller') }}" id="form-id" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card __card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title m-0">
                                                <svg width="20" height="20" x="0" y="0" viewBox="0 0 482.9 482.9"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M239.7,260.2c0.5,0,1,0,1.6,0c0.2,0,0.4,0,0.6,0c0.3,0,0.7,0,1,0c29.3-0.5,53-10.8,70.5-30.5
                                                                    c38.5-43.4,32.1-117.8,31.4-124.9c-2.5-53.3-27.7-78.8-48.5-90.7C280.8,5.2,262.7,0.4,242.5,0h-0.7c-0.1,0-0.3,0-0.4,0h-0.6
                                                                    c-11.1,0-32.9,1.8-53.8,13.7c-21,11.9-46.6,37.4-49.1,91.1c-0.7,7.1-7.1,81.5,31.4,124.9C186.7,249.4,210.4,259.7,239.7,260.2z
                                                                    M164.6,107.3c0-0.3,0.1-0.6,0.1-0.8c3.3-71.7,54.2-79.4,76-79.4h0.4c0.2,0,0.5,0,0.8,0c27,0.6,72.9,11.6,76,79.4
                                                                    c0,0.3,0,0.6,0.1,0.8c0.1,0.7,7.1,68.7-24.7,104.5c-12.6,14.2-29.4,21.2-51.5,21.4c-0.2,0-0.3,0-0.5,0l0,0c-0.2,0-0.3,0-0.5,0
                                                                    c-22-0.2-38.9-7.2-51.4-21.4C157.7,176.2,164.5,107.9,164.6,107.3z"
                                                                    fill="#000000" data-original="#000000" class=""></path>
                                                                <path
                                                                    d="M446.8,383.6c0-0.1,0-0.2,0-0.3c0-0.8-0.1-1.6-0.1-2.5c-0.6-19.8-1.9-66.1-45.3-80.9c-0.3-0.1-0.7-0.2-1-0.3
                                                                    c-45.1-11.5-82.6-37.5-83-37.8c-6.1-4.3-14.5-2.8-18.8,3.3c-4.3,6.1-2.8,14.5,3.3,18.8c1.7,1.2,41.5,28.9,91.3,41.7
                                                                    c23.3,8.3,25.9,33.2,26.6,56c0,0.9,0,1.7,0.1,2.5c0.1,9-0.5,22.9-2.1,30.9c-16.2,9.2-79.7,41-176.3,41
                                                                    c-96.2,0-160.1-31.9-176.4-41.1c-1.6-8-2.3-21.9-2.1-30.9c0-0.8,0.1-1.6,0.1-2.5c0.7-22.8,3.3-47.7,26.6-56
                                                                    c49.8-12.8,89.6-40.6,91.3-41.7c6.1-4.3,7.6-12.7,3.3-18.8c-4.3-6.1-12.7-7.6-18.8-3.3c-0.4,0.3-37.7,26.3-83,37.8
                                                                    c-0.4,0.1-0.7,0.2-1,0.3c-43.4,14.9-44.7,61.2-45.3,80.9c0,0.9,0,1.7-0.1,2.5c0,0.1,0,0.2,0,0.3c-0.1,5.2-0.2,31.9,5.1,45.3
                                                                    c1,2.6,2.8,4.8,5.2,6.3c3,2,74.9,47.8,195.2,47.8s192.2-45.9,195.2-47.8c2.3-1.5,4.2-3.7,5.2-6.3
                                                                    C447,415.5,446.9,388.8,446.8,383.6z"
                                                                    fill="#000000" data-original="#000000" class=""></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                {{ __('Seller Info')}}
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                        name="fname" value="" placeholder="{{ __('First name')}}" required="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                        name="lname" value="" placeholder="{{ __('Last name')}}" required="">
                                                </div>
                                                <div class="col-sm-6 mt-4">
                                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                        name="email" value="" placeholder="{{ __('Email address')}}" required="">
                                                </div>
                                                <div class="col-sm-6"><small class="text-danger">( {{ __('* Country code is must Like for BD 880')}}
                                                        )</small>
                                                    <input type="number" class="form-control form-control-user" id="exampleInputPhone"
                                                        name="phone" value="" placeholder="{{ __('Phone number')}}" required="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user" minlength="6"
                                                        id="exampleInputPassword" name="{{ __('password')}}" placeholder="{{ __('Password')}}" required="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                                        minlength="6" id="exampleRepeatPassword" placeholder="{{ __('Repeat password')}}" required="">
                                                    <div class="pass invalid-feedback">{{ __('Repeat Password Not match')}} .</div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <center>
                                                        <img class="__img-125px object-cover" id="viewer"
                                                            src="https://6valley.6amtech.com/public\assets\back-end\img\400x400\img2.jpg"
                                                            alt="banner image">
                                                    </center>
                                                    <div class="custom-file mt-3">
                                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFileUpload">{{ __('Upload Image')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card __card">
                                        <div class="card-header">
                                            <h5 class="card-title m-0">
                                                <svg width="22" height="22" x="0" y="0" viewBox="0 0 128 128"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                    <g>
                                                        <g>
                                                            <path id="_x38_"
                                                                d="m94.581 96.596c0-1.106.907-1.984 2.013-1.984s1.984.878 1.984 1.984v29.392c0 1.105-.879 2.013-1.984 2.013h-85.178c-1.105 0-1.984-.907-1.984-2.013v-50.537c0-1.106.878-1.984 1.984-1.984s2.013.878 2.013 1.984v48.552h81.152z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                            <path id="_x37_"
                                                                d="m29.104 120.8c0 1.105-.907 2.013-2.013 2.013s-1.983-.907-1.983-2.013v-25.537c0-3.798 1.53-7.256 4.053-9.75 2.495-2.494 5.953-4.054 9.751-4.054s7.256 1.56 9.75 4.054c2.495 2.494 4.054 5.952 4.054 9.75v25.537c0 1.105-.907 2.013-2.012 2.013-1.106 0-1.985-.907-1.985-2.013v-25.537c0-2.692-1.105-5.131-2.891-6.915-1.786-1.786-4.224-2.892-6.917-2.892s-5.159 1.105-6.944 2.892c-1.758 1.784-2.863 4.223-2.863 6.915z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                            <path id="_x36_"
                                                                d="m65.584 104.843h18.367v-13.974h-18.367zm20.38 3.997h-22.364c-1.105 0-2.013-.879-2.013-1.984v-17.999c0-1.105.907-1.984 2.013-1.984h22.364c1.105 0 2.013.879 2.013 1.984v17.998c0 1.106-.908 1.985-2.013 1.985z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                            <path id="_x35_" clip-rule="evenodd"
                                                                d="m42.256 110.058c1.077 0 1.984-.906 1.984-1.983 0-1.105-.907-2.013-1.984-2.013-1.105 0-2.013.907-2.013 2.013 0 1.076.907 1.983 2.013 1.983z"
                                                                fill-rule="evenodd" fill="#000000" data-original="#000000" class="">
                                                            </path>
                                                            <path id="_x34_"
                                                                d="m44.58 61.959v-.114l1.333-24.744h-7.683l-4.535 24.971c.028 1.587.624 3.005 1.616 4.054.963 1.021 2.324 1.644 3.826 1.644 1.475 0 2.834-.623 3.798-1.644 1.021-1.077 1.616-2.551 1.616-4.167zm5.301-24.857-1.304 24.857c0 1.616.624 3.09 1.616 4.167.964 1.021 2.324 1.644 3.826 1.644 1.474 0 2.834-.623 3.798-1.644 1.021-1.077 1.616-2.551 1.616-4.167h.028l-.681-12.471c-.057-1.105.794-2.041 1.9-2.098 1.105-.057 2.041.794 2.097 1.899l.652 12.556v.114h.028c0 1.616.624 3.09 1.616 4.167.963 1.021 2.324 1.644 3.826 1.644 1.104 0 1.983.907 1.983 2.012s-.879 2.013-1.983 2.013c-2.636 0-5.018-1.134-6.718-2.919-.255-.283-.51-.566-.737-.879-.226.313-.481.596-.736.879-1.701 1.785-4.083 2.919-6.69 2.919-2.636 0-5.017-1.134-6.718-2.919-.255-.283-.51-.566-.737-.879-.227.313-.481.596-.736.879-1.701 1.785-4.082 2.919-6.69 2.919-2.636 0-5.017-1.134-6.718-2.919-.255-.283-.51-.566-.737-.879-.227.313-.482.596-.737.879-1.701 1.785-4.082 2.919-6.689 2.919-2.636 0-5.018-1.134-6.718-2.919-.255-.283-.51-.566-.737-.879-.227.313-.482.596-.737.879-1.7 1.785-4.081 2.919-6.689 2.919-2.239 0-4.28-.822-5.896-2.154-1.616-1.331-2.807-3.23-3.289-5.413-.169-.708-.226-1.389-.169-2.069.056-.68.227-1.36.51-2.041l8.277-20.181c.85-2.098 2.239-3.798 3.94-4.988 1.729-1.191 3.77-1.843 5.981-1.843h36.565c1.105 0 2.012.907 2.012 2.013 0 1.077-.907 1.984-2.012 1.984h-5.413zm-15.675 0h-8.107l-7.284 25.084c.057 1.531.652 2.92 1.616 3.94s2.324 1.644 3.827 1.644c1.474 0 2.834-.623 3.798-1.644 1.021-1.077 1.616-2.551 1.616-4.167h.028c0-.114 0-.255.028-.369zm-12.245 0h-3.231c-1.389 0-2.665.396-3.713 1.134-1.077.765-1.956 1.842-2.522 3.231l-8.278 20.152c-.113.283-.198.567-.227.851 0 .283 0 .567.085.878.283 1.304.992 2.438 1.956 3.231.935.766 2.069 1.19 3.345 1.19 1.474 0 2.834-.623 3.798-1.644 1.021-1.077 1.616-2.551 1.616-4.167h.028c0-.199.028-.369.057-.567z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                            <path id="_x33_"
                                                                d="m60.624 115.585c-1.105 0-2.013-.878-2.013-1.983s.908-2.013 2.013-2.013h28.316c1.104 0 1.983.907 1.983 2.013s-.879 1.983-1.983 1.983z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                            <path id="_x32_"
                                                                d="m124.003 46.767-25.736 43.536c-.567.963-1.786 1.275-2.722.708-.312-.17-.566-.425-.736-.736l-25.71-43.508c-.028-.057-.057-.113-.085-.142-1.247-2.268-2.211-4.733-2.891-7.284-.652-2.551-.992-5.187-.992-7.908 0-8.673 3.515-16.524 9.184-22.221 5.697-5.698 13.548-9.212 22.25-9.212 8.673 0 16.525 3.514 22.223 9.211s9.212 13.549 9.212 22.222c0 2.721-.368 5.357-1.021 7.908-.681 2.607-1.673 5.073-2.948 7.369zm-27.438-34.41c5.271 0 10.034 2.126 13.492 5.583 3.458 3.458 5.584 8.22 5.584 13.492s-2.126 10.034-5.584 13.492-8.221 5.612-13.492 5.612c-5.273 0-10.063-2.154-13.521-5.612-3.43-3.458-5.583-8.22-5.583-13.492s2.153-10.034 5.583-13.492c3.459-3.457 8.248-5.583 13.521-5.583zm10.658 8.418c-2.721-2.749-6.491-4.422-10.657-4.422-4.167 0-7.937 1.673-10.687 4.422-2.721 2.721-4.422 6.491-4.422 10.657 0 4.167 1.701 7.937 4.422 10.686 2.75 2.721 6.52 4.393 10.687 4.393 4.166 0 7.937-1.672 10.657-4.393 2.722-2.749 4.423-6.519 4.423-10.686 0-4.166-1.702-7.935-4.423-10.657zm-10.658 64.596 24.008-40.645c1.105-1.984 1.956-4.138 2.551-6.406.567-2.183.879-4.479.879-6.888 0-7.567-3.09-14.427-8.049-19.387-4.962-4.96-11.821-8.049-19.389-8.049-7.597 0-14.456 3.089-19.416 8.049-4.962 4.96-8.022 11.82-8.022 19.387 0 2.409.283 4.705.85 6.888.596 2.239 1.446 4.365 2.523 6.349l.028.057z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                            <path id="_x31_"
                                                                d="m96.565 22.278c2.495 0 4.79 1.049 6.462 2.693 1.645 1.644 2.665 3.939 2.665 6.462s-1.021 4.818-2.665 6.462c-1.672 1.672-3.938 2.693-6.462 2.693-2.522 0-4.819-1.021-6.492-2.693-.028-.028-.057-.085-.113-.113-1.586-1.644-2.55-3.883-2.55-6.349 0-2.522 1.021-4.818 2.663-6.462.057-.028.085-.085.142-.114 1.644-1.587 3.885-2.579 6.35-2.579zm3.628 5.498c-.935-.907-2.21-1.474-3.628-1.474-1.389 0-2.636.539-3.571 1.417-.028.028-.057.057-.085.085-.937.936-1.504 2.211-1.504 3.628 0 1.389.539 2.636 1.419 3.572.028.028.057.057.085.085.936.907 2.211 1.502 3.656 1.502 1.418 0 2.693-.595 3.628-1.502.936-.936 1.502-2.211 1.502-3.657 0-1.417-.566-2.692-1.502-3.628z"
                                                                fill="#000000" data-original="#000000" class=""></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                {{ __('Shop Info')}}
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-6 ">
                                                    <input type="text" class="form-control form-control-user" id="shop_name"
                                                        name="shop_name" placeholder="{{ __('Shop name')}}" value="" required="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <textarea name="shop_desc" class="form-control" id="shop_address" rows="1" placeholder="{{ __('Shop Description')}}"></textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="pb-3">
                                                        <center>
                                                            <img class="__img-125px object-cover" id="viewerLogo"
                                                                src="https://6valley.6amtech.com/public\assets\back-end\img\400x400\img2.jpg"
                                                                alt="banner image">
                                                        </center>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <div class="custom-file">
                                                            <input type="file" name="logo_image" id="LogoUpload" class="custom-file-input"
                                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                            <label class="custom-file-label" for="LogoUpload">{{ __('Upload Logo')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="pb-3">
                                                        <center>
                                                            <img class="__img-125px object-cover" id="viewerBanner"
                                                                src="https://6valley.6amtech.com/public\assets\back-end\img\400x400\img2.jpg"
                                                                alt="banner image">
                                                        </center>
                                                    </div>
{{ __('                                                    <div class="form-group">')}}                                                        <div class="custom-file">
                                                            <input type="file" name="cover_image" id="BannerUpload"
                                                                class="custom-file-input overflow-hidden __p-2p"
                                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                            <label class="custom-file-label" for="BannerUpload">{{ __('Upload Banner')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="recaptcha_element" class="w-100" data-type="image">
                                                    <div style="width: 304px; height: 78px;">
                                                        <div><iframe title="reCAPTCHA"
                                                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfMARoeAAAAAAITvA-le6X9IElSWX6CncicwEfY&amp;co=aHR0cHM6Ly82dmFsbGV5LjZhbXRlY2guY29tOjQ0Mw..&amp;hl=ar&amp;type=image&amp;v=khH7Ei3klcvfRI74FvDcfuOo&amp;size=normal&amp;cb=snbaqwg51sdj"
                                                                width="304" height="78" role="presentation" name="a-n4peo3f3k31b"
                                                                frameborder="0" scrolling="no"
                                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                                        </div>
                                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"
                                                            style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                                    </div><iframe style="display: none;"></iframe>
                                                </div>
                                                <br>
                                                <div class="col-sm-12">
                                                    <div class="form-group mb-0 d-flex flex-wrap justify-content-between">
                                                        <label class="form-group mb-1 d-flex align-items-center">
                                                            <strong>
                                                                <input type="checkbox" class="mr-1" name="remember" id="inputCheckd">
                                                            </strong>
                                                            <span class="mb-4px d-block w-0 flex-grow pl-1">
                                                                <span>{{ __('I agree to Your terms')}}</span>
                                                                <a class="font-size-sm" target="_blank"
                                                                    href="https://6valley.6amtech.com/terms">
                                                                    {{ __('Terms and conditions')}}
                                                                </a>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn--primary btn-user btn-block" id="apply">{{ __('Apply Shop')}} </button>
                                                    <div class="text-center">
                                                        <a class="small" href="https://6valley.6amtech.com/seller/auth/login">{{ __('Already have an account login.')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showUserForm() {
            document.getElementById('userRegisterForm').style.display = 'block';
            document.getElementById('sellerRegisterForm').style.display = 'none';
        }

        function showSellerForm() {
            document.getElementById('userRegisterForm').style.display = 'none';
            document.getElementById('sellerRegisterForm').style.display = 'block';
        }
    </script>

</x-layout-front>
