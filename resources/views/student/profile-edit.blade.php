@extends('layouts.user')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="rounded-top"
                        style="background: url({{ asset('storage/upload/images/background/profile-bg.jpg') }}) no-repeat; background-size: cover; height: 100px">
                    </div>
                    <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                    <img src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                        class="avatar-xl rounded-circle border border-2 border-white img-uploaded"
                                        alt="avatar" />
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">
                                        {{ $userDetail->firstname }}
                                        {{ $userDetail->lastname }}
                                    </h2>
                                    <p class="mb-0 d-block current-email">{{ $user->email }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navbar -->
                    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
                        <!-- Menu -->
                        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                        <!-- Button -->
                        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
                            type="button" data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fe fe-menu"></span>
                        </button>
                        <!-- Collapse navbar -->
                        <div class="collapse navbar-collapse" id="sidenav">
                            <div class="navbar-nav flex-column">
                                <span class="navbar-header">Account Settings</span>
                                <!-- List -->
                                <ul class="list-unstyled ms-n2 mb-0">
                                    <!-- Nav item -->
                                    <li class="nav-item active">
                                        <a id="edit-profile-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-settings nav-icon"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="security-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-user nav-icon"></i>
                                            Security
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a id="delete-link" class="nav-link" style="width:233px" href="#">
                                            <i class="fe fe-trash nav-icon"></i>
                                            Delete Profile
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="nav-link" style="width:233px" style="width:278px; height:32px">
                                                <i class="fe fe-power nav-icon"></i>
                                                Sign Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card" id="profile-card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Profile Details</h3>
                            <p class="mb-0">You have full control to manage your own account setting.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <img src="{{ asset('storage/upload/images/avatar/' . $userDetail->avatar) }}"
                                        class="avatar-xl rounded-circle img-uploaded" alt="avatar" />
                                    <div class="ms-3">
                                        <h4 class="mb-0">Your avatar</h4>
                                        <p class="mb-0">PNG or JPG no bigger than 800px wide and tall.</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-secondary btn-sm"
                                        id="update-avatar-btn">Update</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm"
                                        id="delete-avatar-btn">Delete</a>
                                </div>
                            </div>

                            <!-- Hidden form for file upload -->
                            <form id="upload-avatar-form" style="display: none;" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="avatar-file" name="avatar" accept="image/*">
                            </form>

                            <hr class="my-5" />
                            <div>
                                <h4 class="mb-0">Personal Details</h4>
                                <p class="mb-4">Edit your personal information and address.</p>
                                <!-- Form -->
                                <form class="row gx-3 needs-validation"
                                    action="{{ route('post-student-profile', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @if (session('msg'))
                                        <div class="alert alert-{{ session('alert-type') }}">
                                            {{ session('msg') }}
                                        </div>
                                    @endif

                                    <!-- First name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="fname">First Name</label>
                                        <input type="text" id="fname" class="form-control" placeholder="First Name"
                                            required name="fname" value="{{ old('fname', $userDetail->firstname) }}" />
                                        @error('fname')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="lname">Last Name</label>
                                        <input type="text" id="lname" class="form-control"
                                            placeholder="Last Name" required name="lname"
                                            value="{{ old('lname', $userDetail->lastname) }}" />
                                        @error('lname')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Phone -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="text" id="phone" class="form-control" placeholder="Phone"
                                            required name="phone" value="{{ old('phone', $userDetail->phone) }}" />
                                        @error('phone')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" class="form-control" placeholder="Address"
                                            required name="address" value="{{ old('address', $userDetail->address) }}" />
                                        @error('address')
                                            <div style="color: #DB3030; font-size: 12.25px; margin-top: 4px; width: 100%;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card for Security -->
                    <div class="card d-none" id="security-card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Security</h3>
                            <p class="mb-0">Edit your account settings and change your password here.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form cập nhật email -->
                            <h4 class="mb-0">Địa chỉ Email</h4>
                            <p>
                                Địa chỉ email hiện tại của bạn là
                                <span class="text-success current-email" id="current-email">{{ $user->email }}</span>
                            </p>
                            <form class="row" novalidate id="update-email-form">
                                @csrf
                                <div class="mb-3 col-lg-6 col-md-12 col-12">
                                    <label class="form-label" for="email">Địa chỉ email mới</label>
                                    <input id="email" type="email" name="email" class="form-control"
                                        placeholder="" required />
                                    <button type="submit" class="btn btn-primary mt-2">Cập nhật thông tin</button>
                                </div>
                            </form>
                            <hr class="my-5" />
                            <div>
                                <h4 class="mb-0">Change Password</h4>
                                <p>We will email you a confirmation when changing your password, so please expect that email
                                    after submitting.</p>
                                <!-- Form -->
                                <div class="container mt-5">
                                    <form class="row needs-validation" method="POST"
                                        action="{{ route('change.password') }}" novalidate id="change-password-form">
                                        @csrf
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <!-- Mật khẩu hiện tại -->
                                            <div class="mb-3">
                                                <label class="form-label" for="currentpassword">Mật khẩu hiện tại</label>
                                                <input id="currentpassword" type="password" name="currentpassword"
                                                    class="form-control" placeholder="" required />
                                            </div>
                                            <!-- Mật khẩu mới -->
                                            <div class="mb-3 password-field">
                                                <label class="form-label" for="newpassword">Mật khẩu mới</label>
                                                <input id="newpassword" type="password" name="newpassword"
                                                    class="form-control mb-2" placeholder="" required />
                                            </div>
                                            <div class="mb-3">
                                                <!-- Xác nhận mật khẩu mới -->
                                                <label class="form-label" for="confirmpassword">Xác nhận mật khẩu
                                                    mới</label>
                                                <input id="confirmpassword" type="password" name="confirmpassword"
                                                    class="form-control mb-2" placeholder="" required />
                                            </div>
                                            <!-- Nút lưu -->
                                            <button type="submit" class="btn btn-primary">Lưu mật khẩu</button>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <p class="mb-0">
                                                Không nhớ mật khẩu hiện tại?
                                                <a href="{{ route('forget-password') }}">Đặt lại mật khẩu qua email</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>

                                <!-- CSRF Token -->
                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <!-- Modal -->
                                <div class="modal fade" id="successModal" tabindex="-1"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Thay đổi mật khẩu thành
                                                    công</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Đóng"></button>
                                            </div>
                                            <div class="modal-body">
                                                Mật khẩu của bạn đã được thay đổi thành công.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                    <!-- Card -->
                    <div class="card d-none" id="delete-card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Delete your account</h3>
                            <p class="mb-0">Delete or Close your account permanently.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-4">
                            <span class="text-danger h4">Warning</span>
                            <p>If you close your account, you will be unsubscribed from all your courses, and will lose
                                access forever.</p>
                            <form id="delete-account-form" method="POST" action="{{ route('delete.account') }}">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Close My
                                    Account</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
    <script>
        
    </script>
@endsection
