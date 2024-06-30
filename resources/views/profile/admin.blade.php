@extends('adminlte::page')

@section('title', 'Perfil')

<style>
    svg {
        width: 50px;
    }
</style>


@section('content')
    <div>
        @include('profile.show')
    </div>
    <br>
@endsection
