<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('settings')  || Request::is('settings/*')? 'active' : '') }}" aria-current="page" href="{{route('settings')}}">
                    <span data-feather="home"></span>
                    <i class="mx-1 fas fa-cogs "></i>
                    {{trans('app.settings')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('services')  || Request::is('services/*')? 'active' : '') }}" aria-current="page" href="{{route('services')}}">
                    <span data-feather="home"></span>
                    <i class="mx-1 fas fa-clipboard-list"></i>
                    {{trans('app.services')}}
                </a>
            </li>
            <li class="nav-item mt-3">
                <hr style="height: 0.1px; " class="mx-3 my-2">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mx-1 fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>