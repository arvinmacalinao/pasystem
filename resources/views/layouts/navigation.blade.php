<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('team.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('My Team') }}
        </a>
    </li>
    <hr>
    <li class="text-center">
        <h4>HR Settings</h4>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('employee.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
            </svg>
            {{ __('Employees') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('company.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-building') }}"></use>
            </svg>
            {{ __('Companies') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('company.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-building') }}"></use>
            </svg>
            {{ __('Groups') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('About us') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            HR Admin Settings
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                    Child menu
                </a>
            </li>
        </ul>
    </li>
</ul>