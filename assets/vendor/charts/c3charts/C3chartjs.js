(function(window, document, $, undefined) {
    "use strict";
    $(function() {
        // Mengambil data dari getData.php
        $.ajax({
            url: 'lineGraph.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Mengubah data yang diperoleh menjadi array kolom untuk digunakan dalam grafik
                var categoryData = response.map(function(item) {
                    return item.category_name;
                });

                var soldData = response.map(function(item) {
                    return item.total_sold;
                });

                // Panggil fungsi untuk menggambar grafik
                drawChart(categoryData, soldData);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        // Fungsi untuk menggambar grafik
        function drawChart(categoryData, soldData) {
            // Membuat grafik C3 menggunakan data dari getData.php
            var chart = c3.generate({
          
                data: {
                    columns: [
                        ['Category'].concat(categoryData),
                        ['Products Sold'].concat(soldData)
                    ],
                    type: 'area',
                    colors: {
                        'Products Sold': '#5969ff'
                    }
                },
                axis: {
                    y: {
                        show: true
                    },
                    x: {
                        show: true,
                        tick: {
                            format: function(x) {
                                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                return months[x];
                            }
                        }
                    }
                }
            });
        }
    });
})(window, document, jQuery);
