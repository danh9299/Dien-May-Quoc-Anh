$(document).ready(function () {
    $(".add-to-cart-form").on("submit", function (e) {
        e.preventDefault(); // Ngăn chặn hành vi submit mặc định của form

        var formData = $(this).serialize(); // Serialize form data của form hiện tại

        $.ajax({
            url: $(this).attr("action"), // Lấy action của form
            method: "POST", // Đặt method POST
            data: formData, // Dữ liệu gửi đi là formData đã được serialize
            success: function (response) {
                alert(response.message); // Hiển thị thông báo thành công từ server
                location.reload(); // Làm mới lại trang sau khi xóa thành công
                // Có thể thêm logic để cập nhật giao diện giỏ hàng sau khi xóa sản phẩm
            },
            error: function () {
                alert("Có lỗi xảy ra. Vui lòng thử lại sau!");
            },
        });
    });
});
