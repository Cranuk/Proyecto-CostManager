@extends('layouts.web')

@section('title', 'Ingresos')

@section('content-revenue')
    <div class="header-section">
        <div class="title underlined">Listado de Ingresos:</div>
        <div class="button-box">
            <a href="{{ route('index') }}" class="buttons button-orange" title="Volver">
                <i class='bx bx-arrow-back icon-small'></i>
            </a>
            <a href="{{ route('revenueCreate')}}" class="buttons button-green" title="Agregar ingreso">
                <i class='bx bxs-cart-add icon-small'></i>
            </a>
            <a id="filter-button" class="buttons button-yellow" title='Filtro' data-table="revenues">
                <i class='bx bx-filter icon-small'></i>
            </a>
        </div>
    </div>

    <div id="container-table">
        @if($count > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Descripcion</th>
                        <th>Monto</th>
                        <th>Mes</th>
                        <th>Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($table as $revenue)
                        <tr>
                            <td>
                                @foreach($categories as $category)
                                    @if($category->id == $revenue->category_id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $revenue->description }}</td>
                            <td>
                                @formatCurrency($revenue->amount) <!--NOTE: creamos directiva blade para la funcion helper para formato de moneda -->
                            </td>
                            <td><!--NOTE: se pone la fecha que se creo dado que ahora se muestra los gastos solo del mes actual-->
                                @formatDate($revenue->created_at) <!--NOTE: creamos una directiva de blade para la funcion helper para formato de fecha -->
                            </td>
                            <td>
                                <a href="{{ route('revenueEdit', ['id'=>$revenue->id]) }}">
                                    <i class='bx bxs-edit-alt'></i>
                                </a>
                                <form action="{{ route('revenueDelete', $revenue->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">
                                        <i class='bx bxs-trash-alt'></i>
                                    </button>
                                </form>
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
                    No hay ingresos registrados en este mes!!!
                </div>
            </div>
        @endif
    </div>
@endsection