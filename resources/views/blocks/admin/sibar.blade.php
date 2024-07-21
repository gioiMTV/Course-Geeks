<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('storage/upload/images/brand/logo/logo-inverse.svg')}}" alt="Geeks" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link " href="{{route('dashboard')}}" >
                    <i class="nav-icon fe fe-home me-2"></i>
                    Dashboard
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navCourses"
                    aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-book me-2"></i>
                    Courses
                </a>
                <div id="navCourses" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('courses')}}">All Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('category')}}">Courses Category</a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navProfile"
                    aria-expanded="false" aria-controls="navProfile">
                    <i class="nav-icon fe fe-user me-2"></i>
                    User
                </a>
                <div id="navProfile" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('instructors')}}">Instructor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('students')}}">Students</a>
                        </li>
                    </ul>
                </div>
            </li>

           
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <i class="nav-icon fe fe-lock me-2"></i>
                    Authentication
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('login')}}">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('signup')}}">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('forget-password')}}">Forget Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('404')}}">404 Error</a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- Nav item -->
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Apps</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <i class="nav-icon fe fe-message-square me-2"></i>
                    Chat
                </a>
            </li>
            
            
        </ul>
       
    </div>
</nav>
