function previewImage() {
    document
        .getElementById("image_link")
        .addEventListener("change", function () {
            var file = this.files[0];

            document.getElementById("changeImage").style.display = "block";
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("previewImage").src = e.target.result;
                document.getElementById("previewImage").style.display = "block";

                document.getElementById("image_link").style.display = "none";
            };
            reader.readAsDataURL(file);
        });
}

function chooseAnotherImage() {
    document.getElementById("image_link").value = ""; // Reset input file

    document.getElementById("previewImage").style.display = "none"; // Hide preview image
    document.getElementById("changeImage").style.display = "none"; // Hide preview image
    document.getElementById("image_link").style.display = "block";
}

previewImage();
