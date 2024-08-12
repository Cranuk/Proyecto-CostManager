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

    <div class="space-10"></div>

    <div class="alert-box">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="space-10"></div>

    @if($count > 0)
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
                            @formatCurrency($expense->amount) <!--NOTE: creamos directiva blade para la funcion helper para formato de moneda -->
                        </td>
                        <td><!--NOTE: se pone la fecha que se creo dado que ahora se muestra los gastos solo del mes actual-->
                            @formatDate($expense->created_at) <!--NOTE: creamos una directiva de blade para la funcion helper para formato de fecha -->
                        </td>
                        <td>
                            <a href="{{ route('expenseEdit', ['id'=>$expense->id]) }}">
                                <i class='bx bxs-edit-alt'></i>
                            </a>
                            <a href="{{ route('expenseDelete', ['id'=>$expense->id]) }}">
                                <i class='bx bxs-trash-alt'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert-box">
            <div class="alert alert-notice">
                <i class='bx bxs-info-square icon-head icon-medium'></i>
                No hay gastos registrados en este mes!!! 
            </div>
        </div>
    @endif

@endsection