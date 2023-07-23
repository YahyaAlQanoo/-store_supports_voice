<x-menu-setting>
        <x-slot:header>
        <div class="container rtl">
            <h3 class="py-3 m-0 text-center headerTitle">{{ __('Profile  Info')}}</h3>
        </div>
    </x-slot:header>
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


         <section class="col-lg-9 col-md-9 __customer-profile">
                <div class="card box-shadow-sm">
                    <div class="card-header">
                        <form class="mt-3 px-sm-2 pb-2" action="{{ route('front.profiles.update',$user->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row photoHeader g-3">

                                <div class="d-flex mb-3 mb-md-0 align-items-center">
                                    <img id="blah" class="rounded-circle border __inline-48"
                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                        src="https://6valley.6amtech.com/storage/app/public/profile/def.png">
                                    <div class="pl-2">
                                        <h5 class="font-name">{{ $user->name }}</h5>
                                        <label for="files" style="cursor: pointer; color:#3b71de;"
                                            class="spandHeadO m-0">
                                            {{ __('Change your profile')}}
                                        </label>
                                        <span class="text-danger __text-10px">( {{ __('* Image ratio should be 1:1')}} )</span>
                                        <input id="files" name="image" hidden type="file">
                                    </div>
                                </div>
                                <div class="card-body mt-md-3 p-0">
                                    <h3 class="font-nameA">{{ __('Account information')}} </h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="firstName">{{ __('First name')}} </label>
                                            <input type="text" class="form-control" id="f_name" name="first_name"
                                                value="{{ old('first_name',$user->first_name)}}" required>
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="lastName"> {{ __('Last name')}} </label>
                                            <input type="text" class="form-control" id="l_name" name="last_name"
                                                value="{{ old('last_name',$user->last_name)}}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="inputEmail4">{{ __('Email')}} </label>
                                            <input type="email" class="form-control" name="email" id="account-email"
                                                value="{{ old('email',$user->email)}}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="phone">{{ __('Phone number')}} </label>
                                            <small class="text-primary">(
                                                {{ __('* Country code is must Like for BD 880')}}
                                                )</small></label>
                                            <input type="number" class="form-control" type="text" id="phone"
                                                name="phone" value="{{ old('phone',$user->phone)}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="si-password">{{ __('New password')}}</label>
                                            <div class="password-toggle">
                                                <input class="form-control" name="password" type="password"
                                                    id="password">
                                                <label class="password-toggle-btn">
                                                    <input class="custom-control-input" type="checkbox"
                                                        style="display: none">
                                                    <i class="czi-eye password-toggle-indicator"
                                                        onChange="checkPasswordMatch()"></i>
                                                    <span class="sr-only">{{ __('Show Password')}} </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="newPass">{{ __('Confirm password')}} </label>
                                            <div class="password-toggle">
                                                <input class="form-control" name="password_confirmation" type="password"
                                                    id="confirm_password">
                                                <div>
                                                    <label class="password-toggle-btn">
                                                        <input class="custom-control-input" type="checkbox"
                                                            style="display: none">
                                                        <i class="czi-eye password-toggle-indicator"
                                                            onChange="checkPasswordMatch()"></i><span
                                                            class="sr-only">{{ __('Show Password')}} </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id='message'></div>
                                        </div>
                                        <div
                                            class="col-12 d-flex flex-wrap justify-content-between __gap-15 __profile-btns">
                                            <a class="btn btn-danger" href="javascript:"
                                                onclick="route_alert('https://6valley.6amtech.com/account-delete/10','Want to delete this account ')">
                                                {{ __('Delete account')}}
                                            </a>
                                            <button type="submit" class="btn btn--primary">{{ __('Update')}} </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>


        </x-menu-setting>
