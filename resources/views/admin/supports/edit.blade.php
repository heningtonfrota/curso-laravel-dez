@extends('admin/layouts/app')

@section('title', 'Fórum')

@section('headers')
    <h1>Editar Dúvida {{ $support->id }}</h1>
@endsection

@section('content')
    <x-alert />

    <form action="{{ route('supports.update', $support->id) }}" method="post">
        @method('PUT')
        @include('admin/supports/partials/form', ['support' => $support])
    </form>

@endsection
