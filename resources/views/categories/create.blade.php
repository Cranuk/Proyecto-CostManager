@extends('layouts.web')

@php
$title = isset($edit) ? 'Editar Categoria' : 'Nueva Categoria';
$route = isset($edit) ? 'categoryUpdate' : 'categorySave';
@endphp

@section('title', $title)

@section('content-create-category')
<div class="subtitle underlined center">
    @isset($edit)
    Editar categoria
    @else
    Nueva categoria
    @endisset
</div>

<div class="space-10"></div>

<form action="{{ route($route)}}" method="POST" class="form-style">
    @csrf

    @isset($edit)
    <input type="hidden" name="id" value="{{ $edit->id }}">
    @endisset

    <label for="typeCategory" class="label-text">Tipo de categoria:</label>
    <select name="typeCategory" class="input-text">
        <option value="1" class="input-text">Gastos</option>
        <option value="2" class="input-text">Ingresos</option>
    </select>

    <label for="name" class="label-text">Nombre:</label>
    <input type="text" name="name" class="input-text" value="{{ $edit->name ?? '' }}">

    <label for="description" class="label-text">Descripcion:</label>
    <textarea name="description" class="input-textarea" cols="30" rows="5">{{ $edit->description ?? '' }}</textarea>

    <div class="button-box">
        <a href="{{ route('category') }}" class="buttons button-orange" title="Volver">
            <i class='bx bx-arrow-back icon-small'></i>
        </a>
        <input type="submit" value="Guardar" class="buttons button-green">
    </div>
</form>
@endsection
