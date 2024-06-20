$(document).ready(function () {
    // Sử dụng class để xử lý sự kiện submit của tất cả các form có class là 'add-to-cart-form'
    $(document).on("submit", ".add-to-cart-form", function (e) {
        e.preventDefault();

        var formData = $(this).serialize(); // Serialize form data của form hiện tại

        $.ajax({
            url: "/cart/add", // Đặt URL cụ thể tại đây
            method: "POST", // Đặt method POST
            data: formData, // Dữ liệu gửi đi là formData đã được serialize

            success: function (response) {
                alert(response); // Hiển thị thông báo thành công từ server
                // Không chuyển hướng tới trang giỏ hàng ngay tại đây
            },
            error: function (xhr, status, error) {
                var err = JSON.parse(xhr.responseText); // Parse JSON response từ server
                if (err.error) {
                    alert(err.error); // Hiển thị thông báo lỗi từ server
                } else {
                    alert("Có lỗi xảy ra. Vui lòng thử lại sau!");
                }
            },
        });
    });
});
