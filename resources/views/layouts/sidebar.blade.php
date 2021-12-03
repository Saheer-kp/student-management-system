        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ Route::is('students.*') ? 'active' : '' }}" href="/students"><i class="fa fa-fw fa-user-circle"></i>Students</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ Route::is('student-marks.*') ? 'active' : '' }}" href="/student-marks"><i class="fa fa-fw fa-pencil-alt"></i>Student Marks</a>
                            </li>
                           
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>