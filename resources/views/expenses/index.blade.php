@extends('layouts.web')

@section('title', 'Gastos')

@section('content-expense')
<div class="header-section">
    <div class="title underlined">Listado de gastos:</div>
    <div class="button-box">
        <a href="{{ route('index') }}" class="buttons button-orange" title="Volver">
            <i class='bx bx-arrow-back icon-small'></i>
        </a>
        <a href="{{ route('expenseCreate')}}" class="buttons button-red" title="Agregar gasto">
            <i class='bx bxs-cart-add icon-small'></i>

        </a>
        <a id="filter-button" class="buttons button-yellow" title='Filtro' data-table="expenses">
            <i class='bx bx-filter icon-small'></i>
        </a>
    </div>
</div>

@if($count > 0)
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Herramientas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table as $expense)
            <tr>
                <td>
                    @foreach($categories as $category)
                    @if($category->id == $expense->category_id)
                    {{ $category->name }}
                    @endif
                    @endforeach
                </td>
                <td>{{ $expense->description }}</td>
                <td>
                    @formatCurrency($expense->amount)
                    <!--NOTE: creamos directiva blade para la funcion helper para formato de moneda -->
                </td>
                <td>
                    <!--NOTE: se pone la fecha que se creo dado que ahora se muestra los gastos solo del mes actual-->
                    @formatDate($expense->created_at)
                    <!--NOTE: creamos una directiva de blade para la funcion helper para formato de fecha -->
                </td>
                <td>
                    <div class="tools">
                        <a href="{{ route('expenseEdit', ['id'=>$expense->id]) }}">
                            <i class='bx bxs-edit-alt icon-small'></i>
                        </a>
                        <form action="{{ route('expenseDelete', $expense->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">
                                <i class='bx bxs-trash-alt icon-small'></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else
<div class="alert-box">
    <div class="alert alert-notice">
        <i class='bx bxs-info-square icon-head icon-medium'></i>
        No hay gastos registrados en este mes!!!
    </div>
</div>
@endif

@endsection
