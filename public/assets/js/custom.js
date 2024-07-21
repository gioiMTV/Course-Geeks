//categories
document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('.course-category-checkbox');
    var newCategory;
    var newLevel;
    var newRate;

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                checkboxes.forEach(function (cb) {
                    if (cb !== checkbox) {
                        cb.checked = false;
                    }
                });
                newCategory = this.value;
                updateUrl(true); // Pass true to indicate category change
            }
        });
    });

    var checkLevel = document.querySelectorAll('.course-level-checkbox');

    checkLevel.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                checkLevel.forEach(function (cb) {
                    if (cb !== checkbox) {
                        cb.checked = false;
                    }
                });
                newLevel = this.value;
                updateUrl(true);
            } else {
                newLevel = '';
                updateUrl(true);
            }
        });
    });

    var ratingRadios = document.querySelectorAll('input[name="customRadio"]');

    ratingRadios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            newRate = this.value;
            updateUrl(true);
        });
    });

    document.getElementById('sortCourses').addEventListener('change', function () {
        updateUrl();
    });

    function updateUrl(resetPage = false) {
        var sortValue = document.getElementById('sortCourses').value;
        var currentUrl = window.location.href.split('?')[0];
        var params = new URLSearchParams(window.location.search);

        if (newCategory !== undefined) {
            params.set('newCategory', newCategory);
        }
        if (newRate !== undefined) {
            params.set('newRate', newRate);
        }
        if (newLevel !== undefined) {
            params.set('newLevel', newLevel);
        }
        if (sortValue) {
            params.set('sort', sortValue);
        }

        // Remove the page parameter to reset to page 1 only when changing category
        if (resetPage) {
            params.delete('page');
        }

        window.location.href = currentUrl + '?' + params.toString();
        setTimeout(function () {
            document.getElementById('course-container').scrollIntoView({
                behavior: 'smooth'
            });
        }, 1000);
    }
});


// Bookmarks


$(function () {
    // Khởi tạo tooltip cho các button
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Lắng nghe sự kiện mouseenter và mouseleave trên các button
    var bookmarkButtons = document.querySelectorAll('.bookmark-button');
    bookmarkButtons.forEach(function (button) {
        button.addEventListener('mouseenter', function () {
            var isBookmarked = button.querySelector('i').classList.contains(
                'bi-bookmark-fill');
            var tooltipText = isBookmarked ? 'Delete from Bookmark' : 'Add to Bookmark';

            // Cập nhật nội dung của tooltip
            var tooltip = bootstrap.Tooltip.getInstance(button);
            if (tooltip) {
                tooltip._config.title = tooltipText;
            } else {
                tooltip = new bootstrap.Tooltip(button, {
                    title: tooltipText,
                    placement: 'top',
                    animation: false
                });
            }

            // Hiển thị tooltip
            tooltip.show();
        });

        button.addEventListener('mouseleave', function () {
            var tooltip = bootstrap.Tooltip.getInstance(button);
            if (tooltip) {
                tooltip.hide();
            }
        });
    });
});

// JavaScript code to handle bookmark click
document.addEventListener('DOMContentLoaded', function () {
    // Lấy danh sách các nút bookmark
    var bookmarkButtons = document.querySelectorAll('.bookmark-button');

    // Đăng ký sự kiện click cho từng nút bookmark
    bookmarkButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Lấy course_id và student_id từ thuộc tính data
            var courseId = button.getAttribute('data-course-id');
            var studentId = button.getAttribute('student-id');

            // Gửi AJAX request để cập nhật bookmark
            $.ajax({
                type: 'POST',
                url: '/bookmark',
                data: {
                    'course_id': courseId,
                    'student_id': studentId,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log('Bookmark updated successfully:', response);

                    // Cập nhật trạng thái biểu tượng bookmark trên nút
                    var isBookmarked = button.querySelector('i').classList
                        .contains('bi-bookmark-fill');
                    if (isBookmarked) {
                        button.querySelector('i').classList.remove(
                            'bi-bookmark-fill');

                        // Xóa phần tử khóa học khỏi DOM nếu đang ở trang bookmark
                        if (window.location.pathname === '/Dashboard') {
                            var courseCard = button.closest('.col-md-3');
                            courseCard.remove();
                        }
                    } else {
                        button.querySelector('i').classList.add(
                            'bi-bookmark-fill');
                    }

                    // Cập nhật tooltip
                    var tooltipText = isBookmarked ? 'Add to Bookmark' :
                        'Delete from Bookmark';
                    var tooltip = bootstrap.Tooltip.getInstance(button);
                    if (tooltip) {
                        tooltip._config.title = tooltipText;
                    } else {
                        tooltip = new bootstrap.Tooltip(button, {
                            title: tooltipText,
                            placement: 'top',
                            animation: false
                        });
                    }
                },
                error: function (error) {
                    console.error('Error updating bookmark:', error);
                }
            });
        });
    });
});


// edit profile student




document.addEventListener('DOMContentLoaded', function () {
    // Lấy các liên kết và thẻ card tương ứng
    var editProfileLink = document.querySelector('#edit-profile-link');
    var securityLink = document.querySelector('#security-link');
    var deleteLink = document.querySelector('#delete-link');
    var dashboardLink = document.querySelector('#dashboard-link');
    var courseLink = document.querySelector('#course-link');
    var studentLink = document.querySelector('#student-link');
    var payoutLink = document.querySelector('#payout-link');
    var dashboardCard = document.querySelector('#dashboard-card');
    var courseCard = document.querySelector('#course-card');
    var studentCard = document.querySelector('#student-card');
    var payoutCard = document.querySelector('#payout-card');
    var profileCard = document.querySelector('#profile-card');
    var securityCard = document.querySelector('#security-card');
    var deleteCard = document.querySelector('#delete-card');
    // Tạo một mảng các cặp liên kết và thẻ card
    var linksAndCards = [{
        link: editProfileLink,
        card: profileCard
    },
    {
        link: securityLink,
        card: securityCard
    },
    {
        link: dashboardLink,
        card: dashboardCard
    },
    {
        link: courseLink,
        card: courseCard
    },
    
    {
        link: payoutLink,
        card: payoutCard
    },
  
    {
        link: deleteLink,
        card: deleteCard
    },

    ];

    // Duyệt qua từng cặp liên kết và thẻ card để bắt sự kiện click
    linksAndCards.forEach(function (item) {
        item.link.addEventListener('click', function (event) {
            event.preventDefault();
            // Ẩn tất cả các card và hiển thị card tương ứng với liên kết được click
            linksAndCards.forEach(function (pair) {
                pair.card.classList.add('d-none');
            });
            item.card.classList.remove('d-none');
            // Đánh dấu liên kết được chọn là active
            setActiveLink(item.link);
        });
    });

    // Hàm thiết lập liên kết được chọn là active và loại bỏ active của các liên kết khác
    function setActiveLink(activeElement) {
        var navLinks = document.querySelectorAll('.nav-item');
        navLinks.forEach(function (link) {
            link.classList.remove('active');
        });
        activeElement = activeElement.closest('.nav-item');
        activeElement.classList.add('active');
    }
});

// update avatar
document.getElementById('update-avatar-btn').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('avatar-file').click();
});

document.getElementById('avatar-file').addEventListener('change', function () {
    let formData = new FormData(document.getElementById('upload-avatar-form'));

    $.ajax({
        url: "/update-avatar", // Đường dẫn đến route xử lý upload ảnh
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                document.querySelectorAll('.img-uploaded').forEach((i) => {
                    i.src = response.avatar_url;
                });
                alert('Avatar updated successfully.');
            } else {
                alert('An error occurred while updating the avatar.');
            }
        },
        error: function (xhr) {
            if (xhr.responseJSON && xhr.responseJSON.error) {
                alert(xhr.responseJSON.error); // Hiển thị thông báo lỗi
            } else {
                alert('An error occurred. Please try again.'); // Hiển thị thông báo lỗi chung
            }
        }
    });
});

// delete avatar
document.getElementById('delete-avatar-btn').addEventListener('click', function (e) {
    e.preventDefault();

    if (confirm('Are you sure you want to delete your avatar?')) {
        $.ajax({
            url: "/delete-avatar", // Đường dẫn đến route xử lý xóa ảnh
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.success) {
                    document.querySelectorAll('.img-uploaded').forEach((i) => {
                        i.src =
                            "{{ asset('/storage/upload/images/avatar/avatar-00.jpg') }}";
                    });
                    alert('Avatar deleted successfully.');
                } else {
                    alert('An error occurred while deleting the avatar.');
                }
            },
            error: function (response) {
                alert('An error occurred. Please try again.');
            }
        });
    }
});

//change password

$(document).ready(function () {
    $('#change-password-form').on('submit', function (event) {
        event.preventDefault();
        let form = event.target;
        let formData = new FormData(form);

        $.ajax({
            url: form.action,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $('#successModal').modal('show'); // Hiển thị modal thành công
                    // form.reset(); // Tùy chọn: Đặt lại form sau khi thành công
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON;
                if (errors.error) {
                    alert(errors.error); // Hiển thị thông báo lỗi cụ thể
                } else {
                    $('#failModal').modal('show'); // Hiển thị modal thành công
                    // form.reset();
                }
            }
        });
    });
});

//change email
$(document).ready(function () {
    $('#update-email-form').on('submit', function (event) {
        event.preventDefault();
        let form = event.target;
        let formData = new FormData(form);

        $.ajax({
            url: "{{ route('update.email') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    document.querySelectorAll('.current-email').forEach((i) => {
                        i.textContent = response.email;
                    });
                    alert('Email đã được cập nhật thành công.');
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON;
                if (errors.error) {
                    alert(errors.error); // Hiển thị thông báo lỗi cụ thể
                } else {
                    alert(
                        'Đã xảy ra lỗi. Vui lòng thử lại.'
                    ); // Hiển thị thông báo lỗi chung
                }
            }
        });
    });
});

function confirmDelete() {
    if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
        document.getElementById('delete-account-form').submit();
    }
}

// search in instructor profile
