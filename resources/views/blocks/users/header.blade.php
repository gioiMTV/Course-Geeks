  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
      <div class="container-fluid px-0">
          <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('storage/upload/images/brand/logo/logo.svg') }}"
                  alt="Geeks" /></a>
          <!-- Mobile view nav wrap -->
          <div class="ms-auto d-flex align-items-center order-lg-3">
              <div class="dropdown me-2">
                  <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button"
                      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                      <i class="bi theme-icon-active"></i>
                      <span class="visually-hidden bs-theme-text">Toggle theme</span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                      <li>
                          <button type="button" class="dropdown-item d-flex align-items-center"
                              data-bs-theme-value="light" aria-pressed="false">
                              <i class="bi theme-icon bi-sun-fill"></i>
                              <span class="ms-2">Light</span>
                          </button>
                      </li>
                      <li>
                          <button type="button" class="dropdown-item d-flex align-items-center"
                              data-bs-theme-value="dark" aria-pressed="false">
                              <i class="bi theme-icon bi-moon-stars-fill"></i>
                              <span class="ms-2">Dark</span>
                          </button>
                      </li>
                      <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active"
                            data-bs-theme-value="auto" aria-pressed="true">
                            <i class="bi theme-icon bi-circle-half"></i>
                            <span class="ms-2">Auto</span>
                        </button>
                    </li>
                  </ul>
              </div>
              @if (isset($userDetail))
                  <ul class="navbar-nav navbar-right-wrap ms-2 flex-row d-none d-md-block">
                      <li class="dropdown d-inline-block stopevent position-static">
                          <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary" href="#"
                              role="button" id="dropdownNotificationSecond" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-bell"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
                              aria-labelledby="dropdownNotificationSecond">
                              <div>
                                  <div class="border-bottom px-3 pb-3 d-flex align-items-center">
                                      <span class="h5 mb-0">Notifications</span>
                                  </div>
                                  <ul class="list-group list-group-flush" style="height: 300px" data-simplebar>
                                      <li class="list-group-item bg-light">
                                          <div class="row">
                                              <div class="col">
                                                  <a class="text-body" href="#">
                                                      <div class="d-flex">
                                                          <img src="{{ asset('storage/upload/images/avatar/avatar-1.jpg') }}"
                                                              alt="" class="avatar-md rounded-circle" />
                                                          <div class="ms-3">
                                                              <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                              <p class="mb-3 text-body">Krisitn Watsan like your comment
                                                                  on
                                                                  course Javascript
                                                                  Introduction!</p>
                                                              <span class="fs-6">
                                                                  <span>
                                                                      <span
                                                                          class="fe fe-thumbs-up text-success me-1"></span>
                                                                      2 hours ago,
                                                                  </span>
                                                                  <span class="ms-1">2:19 PM</span>
                                                              </span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </div>
                                              <div class="col-auto text-center me-2">
                                                  <a href="#" class="badge-dot bg-info" data-bs-toggle="tooltip"
                                                      data-bs-placement="top" title="Mark as read"></a>
                                                  <div>
                                                      <a href="#" class="bg-transparent" data-bs-toggle="tooltip"
                                                          data-bs-placement="top" title="Remove">
                                                          <i class="fe fe-x"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="list-group-item">
                                          <div class="row">
                                              <div class="col">
                                                  <a class="text-body" href="#">
                                                      <div class="d-flex">
                                                          <img src="{{ asset('storage/upload/images/avatar/avatar-2.jpg') }}"
                                                              alt="" class="avatar-md rounded-circle" />
                                                          <div class="ms-3">
                                                              <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                              <p class="mb-3 text-body">Just launched a new Courses
                                                                  React
                                                                  for
                                                                  Beginner.</p>
                                                              <span class="fs-6">
                                                                  <span>
                                                                      <span
                                                                          class="fe fe-thumbs-up text-success me-1"></span>
                                                                      Oct 9,
                                                                  </span>
                                                                  <span class="ms-1">1:20 PM</span>
                                                              </span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </div>
                                              <div class="col-auto text-center me-2">
                                                  <a href="#" class="badge-dot bg-secondary"
                                                      data-bs-toggle="tooltip" data-bs-placement="top"
                                                      title="Mark as unread"></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="list-group-item">
                                          <div class="row">
                                              <div class="col">
                                                  <a class="text-body" href="#">
                                                      <div class="d-flex">
                                                          <img src="{{ asset('storage/upload/images/avatar/avatar-3.jpg') }}"
                                                              alt="" class="avatar-md rounded-circle img-uploaded" />
                                                          <div class="ms-3">
                                                              <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                              <p class="mb-3 text-body">Krisitn Watsan like your
                                                                  comment on
                                                                  course Javascript
                                                                  Introduction!</p>
                                                              <span class="fs-6">
                                                                  <span>
                                                                      <span
                                                                          class="fe fe-thumbs-up text-info me-1"></span>
                                                                      Oct 9,
                                                                  </span>
                                                                  <span class="ms-1">1:56 PM</span>
                                                              </span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </div>
                                              <div class="col-auto text-center me-2">
                                                  <a href="#" class="badge-dot bg-secondary"
                                                      data-bs-toggle="tooltip" data-bs-placement="top"
                                                      title="Mark as unread"></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="list-group-item">
                                          <div class="row">
                                              <div class="col">
                                                  <a class="text-body" href="#">
                                                      <div class="d-flex">
                                                          <img src="{{ asset('storage/upload/images/avatar/avatar-4.jpg') }}"
                                                              alt="" class="avatar-md rounded-circle" />
                                                          <div class="ms-3">
                                                              <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                              <p class="mb-3 text-body">You earn new certificate for
                                                                  complete
                                                                  the Javascript Beginner
                                                                  course.</p>
                                                              <span class="fs-6">
                                                                  <span>
                                                                      <span
                                                                          class="fe fe-award text-warning me-1"></span>
                                                                      Oct 9,
                                                                  </span>
                                                                  <span class="ms-1">1:56 PM</span>
                                                              </span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </div>
                                              <div class="col-auto text-center me-2">
                                                  <a href="#" class="badge-dot bg-secondary"
                                                      data-bs-toggle="tooltip" data-bs-placement="top"
                                                      title="Mark as unread"></a>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                                  <div class="border-top px-3 pt-3 pb-0">
                                      <a href="pages/notification-history.html" class="text-link fw-semibold">See all
                                          Notifications</a>
                                  </div>
                              </div>
                          </div>
                      </li>

                      <li class="dropdown ms-2 d-inline-block position-static">
                          <a class="rounded-circle" href="#" data-bs-toggle="dropdown"
                              data-bs-display="static" aria-expanded="false">
                              <div class="avatar avatar-md avatar-indicators avatar-online">
                                  <img alt="avatar" src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                      class="rounded-circle img-uploaded" />
                              </div>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                              <div class="dropdown-item">
                                  <div class="d-flex">
                                      <div class="avatar avatar-md avatar-indicators avatar-online">
                                          <img alt="avatar"
                                              src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                              class="rounded-circle" />
                                      </div>
                                      <div class="ms-3 lh-1">
                                          <h5 class="mb-1">{{ $userDetail->firstname }} {{ $userDetail->lastname }}
                                          </h5>
                                          <p class="mb-0 current-email">{{ $user->email }}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="dropdown-divider"></div>
                              <ul class="list-unstyled">
                                  <li class="dropdown-submenu dropstart-lg">
                                      <a class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                          href="#">
                                          <i class="fe fe-circle me-2"></i>
                                          Status
                                      </a>
                                      <ul class="dropdown-menu">
                                          <li>
                                              <a class="dropdown-item" href="#">
                                                  <span class="badge-dot bg-success me-2"></span>
                                                  Online
                                              </a>
                                          </li>
                                          <li>
                                              <a class="dropdown-item" href="#">
                                                  <span class="badge-dot bg-secondary me-2"></span>
                                                  Offline
                                              </a>
                                          </li>
                                          <li>
                                              <a class="dropdown-item" href="#">
                                                  <span class="badge-dot bg-danger me-2"></span>
                                                  Busy
                                              </a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a class="dropdown-item"
                                          href="{{ $user->role == 0 ? route('student-profile', $user->id) : route('dashboard-user') }}">
                                          <i class="fe fe-settings me-2"></i>
                                          Settings
                                      </a>
                                  </li>
                              </ul>
                              <div class="dropdown-divider"></div>
                              <ul class="list-unstyled">
                                  <li>
                                      <form method="POST" action="{{ route('logout') }}">
                                          @csrf
                                          <button type="submit" class="dropdown-item">
                                              <i class="fe fe-power me-2"></i>
                                              Sign Out
                                          </button>
                                      </form>

                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              @else
                  <!-- Đăng ký -->
                  <a href="{{ route('signup') }}" class="btn btn-light btn-icon rounded-circle me-2"
                      data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Sign up">
                      <i class="fe fe-user-plus"></i>
                  </a>
                  <!-- Đăng nhập -->
                  <a href="{{ route('login') }}" class="btn btn-light btn-icon rounded-circle "
                      data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Login">
                      <i class="fe fe-log-in"></i>
                  </a>
              @endif
          </div>

          <div>
              <!-- Button -->
              <button class="navbar-toggler collapsed ms-2" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="icon-bar top-bar mt-0"></span>
                  <span class="icon-bar middle-bar"></span>
                  <span class="icon-bar bottom-bar"></span>
              </button>
          </div>
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="navbar-default" style="height:40px">
              <ul class="navbar-nav mt-3 mt-lg-0">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarBrowse" data-bs-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false" data-bs-display="static">Browse</a>
                      <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarBrowse">
                          @if (isset($courseCate))
                              <li class="dropdown-submenu dropend">
                                  <a class="dropdown-item dropdown-list-group-item"
                                      href="{{ route('course-category', 0) }}">All courses</a>
                              </li>
                              @foreach ($courseCate as $category)
                                  <li class="dropdown-submenu dropend">
                                      <a class="dropdown-item dropdown-list-group-item"
                                          href="{{ route('course-category', $category->id) }}">{{ $category->name }}</a>
                                  </li>
                              @endforeach
                          @endif
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link" href="{{ Auth::check() ? route('dashboard-user') : route('login') }}"
                          id="navbarAccount">Dashboard</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('blog-category')}}"
                        id="navbarAccount">Blogs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('help')}}"
                        id="navbarAccount">Help</a>
                </li>
              </ul>
              {{-- <form class="form-inline ms-lg-3 d-flex align-items-center">
                  <span class="position-absolute ps-3 search-icon">
                      <i class="fe fe-search"></i>
                  </span>
                  <label for="search" class="visually-hidden"></label>
                  <input type="search" id="search" class="form-control ps-6" placeholder="Search Courses" />
              </form> --}}
          </div>

      </div>
  </nav>
