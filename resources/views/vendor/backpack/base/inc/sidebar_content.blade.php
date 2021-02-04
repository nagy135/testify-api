<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('test') }}'><i class='nav-icon la la-question'></i> Tests</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('school') }}'><i class='nav-icon la la-question'></i> Schools</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('subject') }}'><i class='nav-icon la la-question'></i> Subjects</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('class') }}'><i class='nav-icon la la-question'></i> Classes</a></li>
