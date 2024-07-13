// Nhận diện sự kiện scroll của window
window.onscroll = function () {
    myFunction();
};

var categories = document.getElementById("category-to-sticky");

// Lấy vị trí offset trên TOP của danh mục
var sticky = categories.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        categories.classList.add("sticky");
    } else {
        categories.classList.remove("sticky");
    }
}
