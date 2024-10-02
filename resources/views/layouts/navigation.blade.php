<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-monitor') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('org.chart') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-briefcase') }}"></use>
            </svg>
            {{ __('Organizational Chart') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('team.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-address-book') }}"></use>
            </svg>
            {{ __('My Subordinate') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('job.level') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-bar-chart') }}"></use>
            </svg>
            {{ __('Job Level') }}
        </a>
    </li>
    
    <hr>
    <li class="text-center">
        <h4>HR Settings</h4>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('hr.attendance.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-task') }}"></use>
            </svg>
            {{ __('Attendance Encoding') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('employee.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-people') }}"></use>
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
        <a class="nav-link" href="{{ route('ugroup.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-industry') }}"></use>
            </svg>
            {{ __('Department') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ugroup.orgchart.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-industry') }}"></use>
            </svg>
            {{ __('Department Orgcharts') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('designation.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-task') }}"></use>
            </svg>
            {{ __('Designation') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('role.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-featured-playlist') }}"></use>
            </svg>
            {{ __('Permission') }}
        </a>
    </li>
    
    {{-- <li class="nav-item">
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
    </li> --}}
</ul>