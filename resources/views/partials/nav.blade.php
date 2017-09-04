<div class="headerLogo">
    <img src="{{ url('/assets/images/logo.svg') }}" alt="header-logo">
</div>
<div class="headerContent">
    @if(Auth::check())
        <div class="headerProfile">
            <div class="headerProfile__profile">
                <div class="headerProfile__image">
                    <img src="{{ url('/') . Auth::user()->avatar_path }}" alt="avatar">
                </div>
                <div class="headerProfile__name">
                    {{ Auth::user()->full_name }}
                </div>
                <div class="headerProfile__navArrow"></div>
            </div>
            <div class="headerProfile__list">
                <div class="headerProfile__listArrow"></div>
                <ul class="headerProfile__listItems">
                    <li>
                        <a href="{{ route('account.edit', Auth::user()) }}">@lang('partials/nav.account_settings')</a>
                    </li>
                    <li>
                        {{ Form::open(['route' => 'logout', 'method' => 'POST']) }}
                            {{ Form::button(trans('partials/nav.log_out'), ['type' => 'submit', 'class' => 'logoutButton']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    @else
        <div class="headerLogin">
            <a href="{{ route('login') }}">@lang('partials/nav.sign_in')</a>
            <a href="{{ route('register') }}">@lang('partials/nav.register')</a>
        </div>
    @endif
</div>