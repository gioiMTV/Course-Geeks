@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">Courses Category</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('category') }}">Courses</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Courses Category</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCatgory">Add
                            New Category</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom-0">
                        <!-- Form -->
                        <form class="d-flex align-items-center">
                            <span class="position-absolute ps-3 search-icon">
                                <i class="fe fe-search"></i>
                            </span>
                            <input type="search" class="form-control ps-6" placeholder="Search Course Category">
                        </form>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox">
                            <thead class="table-light">
                                <tr>
                                    <th>Category</th>
                                    <th>Course</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $category->id }}">
                                        <td>
                                            <a href="#" class="text-inherit position-relative">
                                                <h5 class="mb-0 text-primary-hover">{{ $category->name }}</h5>
                                            </a>
                                        </td>
                                        <td>{{ $category->courses_count }}</td>
                                        <td>{{ $category->created_at->format('d M, Y') }}</td>
                                        <td>{{ $category->updated_at->format('d M, Y') }}</td>
                                        <td>
                                            <span class="dropdown dropstart">
                                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                    role="button" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                                    aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu">
                                                    <span class="dropdown-header">Action</span>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#editCategory{{ $category->id }}">
                                                        <i class="fe fe-inbox dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-action="delete"
                                                        data-form-id="deleteForm{{ $category->id }}">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Delete
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal: Create Category -->
    <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">Create New Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="name">
                                Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="Write a Category" id="name"
                                name="name" required>
                            <small>Field must contain a unique value</small>
                            <div class="invalid-feedback">Please enter category.</div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add New Category</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($categories as $category)
        <!-- Modal: Edit Category -->
        <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editCategoryLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="editCategoryLabel{{ $category->id }}">Edit Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate method="POST"
                            action="{{ route('category.update', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 mb-2">
                                <label class="form-label" for="name">
                                    Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="Write a Category" id="name"
                                    name="name" value="{{ $category->name }}" required>
                                <small>Field must contain a unique value</small>
                                <div class="invalid-feedback">Please enter category.</div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form: Delete Category -->
        <form id="deleteForm{{ $category->id }}" action="{{ route('category.delete', $category->id) }}" method="POST"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.dropdown-item[data-action="delete"]').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this category?')) {
                        const formId = this.getAttribute('data-form-id');
                        const form = document.getElementById(formId);
                        if (form) {
                            form.submit();
                        }
                    }
                });
            });
        });
    </script>
@endsection
