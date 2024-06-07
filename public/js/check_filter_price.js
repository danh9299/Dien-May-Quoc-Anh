
    document.getElementById('filterForm').addEventListener('submit', function(event) {
        var minPrice = parseFloat(document.getElementById('min_price').value);
        var maxPrice = parseFloat(document.getElementById('max_price').value);
        var errorDiv = document.getElementById('price-error');

        if (maxPrice < minPrice) {
            alert('[Lỗi bộ lọc] Giá cao nhất không được nhỏ hơn Giá thấp nhất');
            event.preventDefault();
        } 
    });
