@extends('layouts.web')

@section('title', 'Pagina de inicio')

@section('content-main')
    @if($balances['balancePositive'] > 0)
    <div class="table-responsive">
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
    </div>

    @else
        <div class="alert-box">
            <div class="alert alert-notice">
                <i class='bx bxs-info-square icon-head icon-medium'></i>
                No hay balance en este mes!!! 
            </div>
        </div>
    @endif
@endsection
