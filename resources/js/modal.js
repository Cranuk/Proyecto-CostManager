import MicroModal from 'micromodal';

document.addEventListener('DOMContentLoaded', function() {
    MicroModal.init();

    const openFilterModalBtn = document.getElementById('filter-button');
    if (openFilterModalBtn) {
        openFilterModalBtn.addEventListener('click', () => {
            MicroModal.show('filter-modal');
        });
    }

    // Lógica para el modal de borrado
    let formToDelete = null;

    document.querySelectorAll('.delete-button').forEach(btn => {
        btn.addEventListener('click', function () {
            formToDelete = this.closest('form');
            MicroModal.show('delete-modal');
        });
    });

    document.getElementById('confirm-delete').addEventListener('click', function () {
        if (formToDelete) {
            formToDelete.submit();
            formToDelete = null;
        }
    });
});