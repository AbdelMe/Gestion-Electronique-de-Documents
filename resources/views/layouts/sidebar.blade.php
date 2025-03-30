<div>
    <nav class="sidebar sidebar-offcanvas" style="background: linear-gradient(180deg, #496683 0%, #131d27 100%)" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background: linear-gradient(180deg, #223446 0%, #496683 100%)">
            <a class="sidebar-brand brand-logo" href="index.html"><img src={{ asset('assets/images/Archivi.png') }}
                    alt="logo"  /></a>
            <a class="sidebar-brand brand-logo-mini" href="index.html"><img src={{ asset('assets/images/A.png') }}
                    alt="logo"/></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                            <span class="count bg-success"></span>
                        </div> 
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">MOHAMMED</h5>
                            <span>Administrator</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                            class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
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
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link d-flex align-items-center" href="{{ route('dashboard') }}">
                    <span class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/icons/dash.png') }}" width="24px" style="margin-right: 8px" alt="Dashboard Icon">
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Entrprise</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> 
                            <a class="nav-link" href="pages/ui-features/buttons.html">Create Entreprise</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/dropdowns.html">Dropdowns</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link"
                                href="pages/ui-features/typography.html">Typography</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('entreprise.index') }}">
                    <span>
                        <img src="{{ asset('assets/images/icons/office.png') }}" width="24px" style="margin-right: 8px" alt="Dashboard Icon">
                    </span>
                    <span class="menu-title">Entreprise</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('classe.index') }}">
                    <span>
                        <img src="{{ asset('assets/images/icons/menu.png') }}" width="24px" style="margin-right: 8px" alt="Dashboard Icon">
                    </span>
                    <span class="menu-title">Classes</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('dossiers.index') }}">
                    <span>
                        <img src="{{ asset('assets/images/icons/folder.png') }}" width="24px" style="margin-right: 8px" alt="Dashboard Icon">
                    </span>
                    <span class="menu-title">Dossier</span>
                </a>
            </li>
            {{-- <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-contacts"></i>
                    </span>
                    <span class="menu-title">Documents</span>
                </a>
            </li> --}}
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                    aria-controls="auth">
                    <span>
                        <img src={{ asset('assets/images/icons/file.png') }} width="24px" style="margin-right: 10px" alt="">
                    </span>
                    <span class="menu-title">Documents</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href={{ route('documents.index') }}>Documents</a></li>
                        <li class="nav-item"> <a class="nav-link" href={{ route('type_documents.index') }}>Type Document</a></li>
                    </ul>
                </div>
            </li>
            {{-- <li class="nav-item menu-items">
                <a class="nav-link"
                    href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span class="menu-title">Rubrique</span>
                </a>
            </li> --}}
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                    aria-controls="auth">
                    <span>
                        <img src="{{ asset('assets/images/icons/align.png') }}" width="24px" style="margin-right: 8px" alt="Dashboard Icon">
                    </span>
                    <span class="menu-title">Rubriques</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href={{ route('rubrique.index') }}>Rubriques</a></li>
                        <li class="nav-item"> <a class="nav-link" href={{ route('type_rubrique.index') }}>Type Rubrique</a></li>
                        <li class="nav-item"> <a class="nav-link" href={{ route('rubrique_document.index') }}>Rubrique Document</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

</div>