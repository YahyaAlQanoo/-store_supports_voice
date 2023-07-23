<div class="topbar-text dropdown disable-autohide  __language-bar text-capitalize">
    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
        {{-- <img class="mr-2" width="20"
            src="https://6valley.6amtech.com/public/assets/front-end/img/flags/en.png"
            alt="Eng"> --}}
        {{ __('Language')}}

    </a>
    <ul class="dropdown-menu dropdown-menu-left" style="text-align: left;">
         @foreach ($locales as $code =>$locale)
        <li>
            <a class="dropdown-item pb-1" href="{{LaravelLocalization::getLocalizedURL($code) }}">
                @if ($locale['name'] === 'Arabic')
                    <img class="mr-2" width="20" src="https://6valley.6amtech.com/public/assets/front-end/img/flags/sa.png" alt="arabic" />
                @else
                    <img class="mr-2" width="20" src="https://6valley.6amtech.com/public/assets/front-end/img/flags/en.png" alt="english" />
                @endif
                <span style="text-transform: capitalize">{{$locale['name']}}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>  
