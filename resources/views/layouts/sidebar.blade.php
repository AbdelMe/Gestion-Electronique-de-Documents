<div>
    <nav class="sidebar sidebar-offcanvas" style="background: linear-gradient(180deg, #496683 0%, #131d27 100%)" id="sidebar">
        <!-- Brand and profile sections remain the same -->
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="#"><img src={{ asset('assets/images/Untitled-1.png') }}
                    alt="logo"  /></a>
            <a class="sidebar-brand brand-logo-mini" href="#"><img src={{ asset('assets/images/Untitled-12png.png') }}
                    alt="logo"/></a>
        </div>
        
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://via.placeholder.com/150' }}" alt="">
                            <span class="count bg-success"></span>
                        </div> 
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->first_name }} </h5>
                            <span>{{Auth::user()->getRoleNames()->first()}}</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                            class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                        style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);"
                        aria-labelledby="profile-dropdown">
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li> --}}
        <ul class="nav pt-0">
            <!-- Profile section remains the same -->
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            
            <!-- Regular menu items -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/icons/dash.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/icons/dash.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Users</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <img src="{{ asset('assets/images/icons/dash.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Roles</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('permitions.index') }}">
                    <img src="{{ asset('assets/images/icons/dash.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Permitions</span>
                </a>
            </li>
            
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('entreprise.index') }}">
                    <img src="{{ asset('assets/images/icons/office.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Entreprise</span>
                </a>
            </li>
            
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('classe.index') }}">
                    <img src="{{ asset('assets/images/icons/menu.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Classes</span>
                </a>
            </li>
            
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('dossiers.index') }}">
                    <img src="{{ asset('assets/images/icons/folder.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Dossier</span>
                </a>
            </li>
            
            <!-- Documents menu with sub-items -->
            <li class="nav-item menu-items">
                <a class="nav-link menu-toggle" data-target="#documents-menu">
                    <img src="{{ asset('assets/images/icons/file.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Documents</span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav sub-menu" id="documents-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('documents.index') }}">Documents</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('type_documents.index') }}">Type Document</a></li>
                </ul>
            </li>
            
            <!-- Rubriques menu with typeRubrique & rubriqueDocument -->
            <li class="nav-item menu-items">
                <a class="nav-link menu-toggle" data-target="#rubriques-menu">
                    <img src="{{ asset('assets/images/icons/align.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Rubriques</span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav sub-menu" id="rubriques-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('rubrique.index') }}">Rubriques</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('type_rubrique.index') }}">Type Rubrique</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('rubrique_document.index') }}">Rubrique Document</a></li>
                </ul>
            </li>

            {{-- <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('versions.index') }}">
                    <img src="{{ asset('assets/images/icons/dash.png') }}" width="24px" style="margin-right: 8px" alt="">
                    <span class="menu-title">Version</span>
                </a>
            </li> --}}
        </ul>
    </nav>
    <style>
/* Submenu styling */
.sub-menu {
    display: none;
    padding-left: 20px;
    list-style: none;
}

.sub-menu.show {
    display: block;
}

/* Menu arrow rotation */
.menu-arrow {
    float: right;
    transition: transform 0.2s ease;
    transform: rotate(-90deg);
}

/* Active state styling */
.nav-item.active > .nav-link {
    background-color: rgba(255, 255, 255, 0.1);
    border-left: 3px solid #fff;
}

.nav-link.active {
    font-weight: bold;
}
    </style>
</div>

