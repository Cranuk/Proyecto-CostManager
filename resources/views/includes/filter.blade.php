<section class="section-modal" id="filter-modal">
    <div class="box-modal">
        <form id="filter-form" class="form-modal" method="POST">
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
                <input type="button" value="Cancelar" class="buttons button-red" id="button-cancel">
            </div>
            
        </form>
    </div>
</section>