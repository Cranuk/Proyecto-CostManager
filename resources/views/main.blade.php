@extends('layouts.web')

@section('title', 'Pagina de inicio')

@section('content-main')
    <div class="container-options">
        <ul class="menu-list">
            <li>
                <a href="{{ route('category') }}" class="menu-buttons button-lightBlue" title="Categorias">
                    <i class='bx bxs-category icon-big'></i>
                </a>
            </li>
            <li>
                <a href="{{ route('expense') }}" class="menu-buttons button-red" title='Gastos'>
                    <i class='bx bxs-shopping-bags icon-big'></i>
                </a>
            </li>
            <li>
                <a href="{{ route('revenue') }}" class="menu-buttons button-green" title='Ingresos'>
                    <i class='bx bxs-wallet icon-big'></i>
                </a>
            </li>
        </ul>
    </div>

    @if($balances['balancePositive'] > 0)
        <table>
            <thead>
                <tr>
                    <th>Ingresos</th>
                    <th>Gastos</th>
                    <th>Balance total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @formatCurrency($balances['balancePositive']) <!--NOTE: creamos directiva blade para la funcion helper para formato de moneda -->
                    </td>
                    <td>
                        @formatCurrency($balances['balanceNegative'])
                    </td>
                    <td>
                        @formatCurrency($balances['balanceTotal'])
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert-box">
            <div class="alert alert-notice">
                <i class='bx bxs-info-square icon-head icon-medium'></i>
                No hay balance en este mes!!! 
            </div>
        </div>
    @endif
@endsection
