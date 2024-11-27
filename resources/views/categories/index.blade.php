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
                            <a href="{{ route('categoryEdit', ['id'=>$category->id]) }}">
                                <i class='bx bxs-edit-alt'></i>
                            </a>
                            <a href="{{ route('categoryDelete', ['id'=>$category->id]) }}">
                                <i class='bx bxs-trash-alt'></i>
                            </a>
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

