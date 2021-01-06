<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            @can('user_management_access')                
            <li><a><i class="fa fa-users"></i> Utilisateurs <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('role_access')                    
                        <li><a href="{{route('admin.roles.index')}}"><i class="fa  fa-lock"></i> Roles</a></li>
                    @endcan
                    @can('permission_access')
                        <li><a href="{{route('admin.permissions.index')}}"><i class="fa  fa-key"></i> Permissions</a></li>
                    @endcan
                    @can('user_access')                    
                        <li><a href="{{route('admin.user.index')}}"><i class="fa fa-user"></i> Utilisateurs</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('role_create')
                <li><a href="{{route('admin.simulateur.index')}}"><i class="fa   fa-calculator"></i>Simulateur</a></li>
            @endcan
            <li><a href="{{route('admin.contact.index')}}"><i class="fa  fa-comment"></i>Rendez-vous</a></li>
            <li><a href="{{route('admin.agence.index')}}"><i class="fa   fa-institution (alias)"></i>Agence</a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
        </li>                  
        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i>Récharger la Page</a></li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->