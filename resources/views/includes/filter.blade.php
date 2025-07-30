<section class="modal micromodal-slide" id="filter-modal" aria-hidden="true">
    <div class="modal__overlay box-modal" tabindex="-1" data-micromodal-close>
        <div class="modal__container form-modal" role="dialog" aria-modal="true" aria-labelledby="filter-modal-title">
            <header class="modal__header">
                <div class="subtitle underlined center " id="filter-modal-title">
                    Filtrar por fecha
                </div>
            </header>

            <form id="filter-form" class="form-style" method="POST">
                @csrf
                <input type="hidden" id="table" name="table">

                <label for="month" class="label-text">Mes</label>
                <select name="month" id="month" class="input-select"></select>

                <div class="space-10"></div>

                <label for="year" class="label-text">Año</label>
                <select name="year" id="year" class="input-select"></select>

                <div class="space-10"></div>

                <div class="button-box">
                    <input type="submit" value="Aplicar" class="buttons button-lightBlue">
                    <input type="button" value="Cancelar" class="buttons button-red" data-micromodal-close>
                </div>
            </form>
        </div>
    </div>
</section>
