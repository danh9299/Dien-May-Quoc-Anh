function previewImage() {
document.getElementById("image_link").addEventListener("change", function () {
    var file = this.files[0];
    if (this.files.length >0){
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('image_link_check').value = ''; 
        document.getElementById("previewImage").src = e.target.result;
        document.getElementById("previewImage").style.display = "block";
        document.getElementById("changeImage").style.display = "block";
      

    };
    reader.readAsDataURL(file);}
    else{
        document.getElementById('image_link_check').value = ''; 
        document.getElementById("previewImage").style.display = "none";
        document.getElementById("changeImage").style.display = "none";
        alert('Không có ảnh đại diện được chọn');
    }
    
});
}

function previewImages(){
    document.getElementById('image_list').addEventListener('change', function() {
        var files = this.files;
        var imagePreviewContainer = document.getElementById('imagePreviewContainer');
        
        

        document.getElementById('changeImages').style.display = 'block'; 

        if (this.files.length >0){
        var maxFiles = 5; // Số lượng tệp tối đa
        // Kiểm tra số lượng tệp được chọn
        if (files.length > maxFiles) {
            alert("Chỉ được phép chọn tối đa " + maxFiles + " ảnh.");
            this.value = ''; // Reset input file
            return;
        }
        // Xóa tất cả các preview hiện tại
        imagePreviewContainer.innerHTML = '';
        
        // Hiển thị preview cho từng file ảnh được chọn
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
                imagePreviewContainer.appendChild(img);
                document.getElementById('image_list_check').value = ''; 
            };
            reader.readAsDataURL(file);
        }}
        else{
            document.getElementById('image_list_check').value = ''; 
            document.getElementById("imagePreviewContainer").style.display = "none";
            document.getElementById("changeImages").style.display = "none";
            alert('Không có ảnh nào được chọn');
        }
    });
}



function chooseAnotherImage() {
        document.getElementById('image_link').value = ''; // Reset input file
        document.getElementById('image_link_check').value = ''; 
        document.getElementById('previewImage').style.display = 'none'; // Hide preview image
        document.getElementById('changeImage').style.display = 'none'; // Hide preview image
    }
    function chooseOtherImages() {
        document.getElementById('image_list').value = ''; // Reset input file
        imagePreviewContainer.innerHTML = '';
        document.getElementById('image_list_check').value = ''; 
        document.getElementById('changeImages').style.display = 'none'; // Hide preview image
    }


previewImage();
previewImages()
