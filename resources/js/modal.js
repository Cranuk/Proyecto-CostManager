window.addEventListener('load', function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url = "http://progestorgastoslaravel/";
    var hacerFiltroEn = "";

    $('#filter-button').on('click', function(){
        hacerFiltroEn = ($(this).data('table'));
        var table = $(this).data('table');
        var action = url + 'filters/table';

        $('#table').val(table);
        $('#filter-form').attr('action', action);
        
        console.log(hacerFiltroEn);
        
        $.ajax({
            url: url + 'filters/date',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var years = response.years;
                var months = response.months;
    
                var yearSelect = $('#year');
                var monthSelect = $('#month');
    
                // NOTE: carga de datos al select año
                years.forEach(function(year) {
                    yearSelect.append($('<option>', {
                        value: year,
                        text: year
                    }).addClass('input-select'));
                });
    
                // NOTE: carga de datos al select mes
                $.each(months, function(key, value) {
                    monthSelect.append($('<option>', {
                        value: key,
                        text: value
                    }).addClass('input-select'));
                });

                $('#filter-modal').removeClass('hide-modal').addClass('open-modal');
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los select de fechas:', error);
            }
        });
    });

    $('#button-cancel').on('click', function() {
        $('#filter-modal').removeClass('open-modal').addClass('hide-modal');
    });
});
