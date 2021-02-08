<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon">
                    <img src="images/logo/doudhal.png"  style="width:50px;height:50px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Doudhal</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php" target="_blank">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Se rendre sur le site</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?p=orders.index">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Commandes</span></a>
            </li>

            <!-- Nav Item - Course Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
                    aria-expanded="true" aria-controls="collapseCourse">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Formations</span>
                </a>
                <div id="collapseCourse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="admin.php?p=courses.index"><i class="fas fa-fw fa-book"></i> Cours</a>
                        <a class="collapse-item" href="admin.php?p=lessons.index"><i class="fas fa-fw fa-book-open"></i> Leçons</a>
                        <a class="collapse-item" href="admin.php?p=quizzes.index"><i class="fas fa-fw fa-check-double"></i> Quizzes</a>
                        <a class="collapse-item" href="admin.php?p=questions.index"><i class="fas fa-fw fa-question"></i> Questions</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Medias Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedias"
                    aria-expanded="true" aria-controls="collapseMedias">
                    <i class="fas fa-fw fa-photo-video"></i>
                    <span>Medias</span>
                </a>
                <div id="collapseMedias" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                        <a class="collapse-item" href="admin.php?p=medias.index"><i class="fas fa-fw fa-copy"></i> Tous les médias</a>
                        <a class="collapse-item" href="admin.php?p=medias.add""><i class="fas fa-fw fa-file-upload"></i> Ajouter</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                        <a class="collapse-item" href="admin.php?p=users.index"><i class="fas fa-fw fa-users"></i> Tous les utilisateurs</a>
                        <a class="collapse-item" href="admin.php?p=users.add"><i class="fas fa-fw fa-user-plus"></i> Ajouter</a>
                        <a class="collapse-item" href="admin.php?p=users.edit&id=1"><i class="fas fa-fw fa-user-edit"></i> Votre profil</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Extensions
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <p class="text-center mb-2"><strong>Doudhal</strong> est Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim veritatis libero fuga delectus!</p>
                <a class="btn btn-success btn-sm" href="#">Visitez le site web</a>
            </div>
        </ul>
        <!-- End of Sidebar -->
