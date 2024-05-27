function previewImage_banner1() {
    document
        .getElementById("image_link_banner1")
        .addEventListener("change", function () {
            var file = this.files[0];
            document.getElementById("changeImage_banner1").style.display =
                "block";
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image_link_check_banner1").value = "";
                document.getElementById("previewImage_banner1").src =
                    e.target.result;
                document.getElementById("previewImage_banner1").style.display =
                    "block";
                document.getElementById("image_link_banner1").style.display =
                    "none";
            };
            reader.readAsDataURL(file);
        });
}

function chooseAnotherImage_banner1() {
    document.getElementById("image_link_banner1").value = ""; // Reset input file
    document.getElementById("image_link_check_banner1").value = "";
    document.getElementById("previewImage_banner1").style.display = "none"; // Hide preview image
    document.getElementById("changeImage_banner1").style.display = "none"; // Hide preview image
    document.getElementById("image_link_banner1").style.display = "block";
}

function previewImage_banner2() {
    document
        .getElementById("image_link_banner2")
        .addEventListener("change", function () {
            var file = this.files[0];
            document.getElementById("changeImage_banner2").style.display =
                "block";
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image_link_check_banner2").value = "";
                document.getElementById("previewImage_banner2").src =
                    e.target.result;
                document.getElementById("previewImage_banner2").style.display =
                    "block";
                document.getElementById("image_link_banner2").style.display =
                    "none";
            };
            reader.readAsDataURL(file);
        });
}

function chooseAnotherImage_banner2() {
    document.getElementById("image_link_banner2").value = ""; // Reset input file
    document.getElementById("image_link_check_banner2").value = "";
    document.getElementById("previewImage_banner2").style.display = "none"; // Hide preview image
    document.getElementById("changeImage_banner2").style.display = "none"; // Hide preview image
    document.getElementById("image_link_banner2").style.display = "block";
}

function previewImage_banner3() {
    document
        .getElementById("image_link_banner3")
        .addEventListener("change", function () {
            var file = this.files[0];
            document.getElementById("changeImage_banner3").style.display =
                "block";
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image_link_check_banner3").value = "";
                document.getElementById("previewImage_banner3").src =
                    e.target.result;
                document.getElementById("previewImage_banner3").style.display =
                    "block";
                document.getElementById("image_link_banner3").style.display =
                    "none";
            };
            reader.readAsDataURL(file);
        });
}

function chooseAnotherImage_banner3() {
    document.getElementById("image_link_banner3").value = ""; // Reset input file
    document.getElementById("image_link_check_banner3").value = "";
    document.getElementById("previewImage_banner3").style.display = "none"; // Hide preview image
    document.getElementById("changeImage_banner3").style.display = "none"; // Hide preview image
    document.getElementById("image_link_banner3").style.display = "block";
}

function previewImage_banner4() {
    document
        .getElementById("image_link_banner4")
        .addEventListener("change", function () {
            var file = this.files[0];
            document.getElementById("changeImage_banner4").style.display =
                "block";
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("image_link_check_banner4").value = "";
                document.getElementById("previewImage_banner4").src =
                    e.target.result;
                document.getElementById("previewImage_banner4").style.display =
                    "block";
                document.getElementById("image_link_banner4").style.display =
                    "none";
            };
            reader.readAsDataURL(file);
        });
}

function chooseAnotherImage_banner4() {
    document.getElementById("image_link_banner4").value = ""; // Reset input file
    document.getElementById("image_link_check_banner4").value = "";
    document.getElementById("previewImage_banner4").style.display = "none"; // Hide preview image
    document.getElementById("changeImage_banner4").style.display = "none"; // Hide preview image
    document.getElementById("image_link_banner4").style.display = "block";
}

previewImage_banner1();
previewImage_banner2();
previewImage_banner3();
previewImage_banner4();
