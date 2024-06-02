$(document).ready(function() {
    $('.btn-quick-edit').on('click', function() {
        var productId = $(this).data('id');

        $.ajax({
            url: '/admin/products/' + productId + '/quick-edit',
            method: 'GET',
            success: function(response) {
                $('#quickEditProductId').val(response.id);
                $('#quickEditProductName').val(response.name);
                $('#quickEditProductPrice').val(response.price);
                $('#quickEditProductModel').val(response.model);
                $('#quickEditModal').modal('show');
            }
        });
    });

    $('#quickEditForm').on('submit', function(e) {
        e.preventDefault();

        var productId = $('#quickEditProductId').val();
        var formData = $(this).serialize();

        $.ajax({
            url: '/admin/products/' + productId + '/quick-update',
            method: 'PUT',
            data: formData,
            success: function(response) {
                alert(response.message);
                $('#quickEditModal').modal('hide');
                location.reload(); // Reload the page to see the updated data
            }
        });
    });
});