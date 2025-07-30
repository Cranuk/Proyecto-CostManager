@extends('layouts.web')

@section('title', 'Categorias')

@section('content-category')
<div class="header-section">
    <div class="title underlined">Listado de categorias:</div>
    <div class="button-box">
        <a href="{{ route('index') }}" class="buttons button-orange" title="Volver">
            <i class='bx bx-arrow-back icon-small'></i>
        </a>
        <a href="{{ route('categoryCreate')}}" class="buttons button-lightBlue" title="Agregar categoria">
            <i class='bx bxs-cart-add icon-small'></i>
        </a>
    </div>
</div>

@if( $count > 0)
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Herramientas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            @php
            $color = $category->typeCategory == 2 ? 'button-green' : 'button-red' // NOTE: Discriminamos la categorias segun su uso
            @endphp
            <tr>
                <td class="{{ $color }}">{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    @formatDate($category->updated_at)
                </td>
                <td>
                    <div class="tools">
                        <a href="{{ route('categoryEdit', ['id'=>$category->id]) }}">
                            <i class='bx bxs-edit-alt icon-small'></i>
                        </a>
                        <form action="{{ route('categoryDelete', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-button">
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
        No hay categorias registradas!!!
    </div>
</div>
@endif

@endsection
