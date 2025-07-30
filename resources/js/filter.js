document.addEventListener('DOMContentLoaded', function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const url = import.meta.env.VITE_APP_URL;
    let filtroEn = "";

    console.log('URL de la aplicación:', url); // NOTE: Verifica la URL de la aplicación

    $('#filter-button').on('click', function(){
        filtroEn = $(this).data('table');
        let action = url + '/filters/table';

        $('#table').val(filtroEn);
        $('#filter-form').attr('action', action);
        
        console.log(filtroEn); // NOTE: Verifica el valor del filtro
        
        $.ajax({
            url: url + '/filters/date',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                let years = response.years;
                let months = response.months;
    
                let yearSelect = $('#year');
                let monthSelect = $('#month');
    
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
            error: function(error) {
                console.error('Error al cargar los select de fechas:', error);
                console.error(action);
            }
        });
    });

    $('#button-cancel').on('click', function() {
        $('#filter-modal').removeClass('open-modal').addClass('hide-modal');
    });
});
