document.addEventListener("DOMContentLoaded", function() {
    var alerta = document.querySelector('.alert-box');
    var anio = $("#yearNow");
    anio.text(new Date().getFullYear());

    setTimeout(() => {
        if (alerta && alerta.textContent.trim() !== '') {
            alerta.style.transition = 'opacity 0.5s ease';
            alerta.style.opacity = '0';
            setTimeout(() => alerta.remove(), 500);
        }
    }, 3000);
});

