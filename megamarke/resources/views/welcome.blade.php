@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <title>Employee Directory</title>
@stop

@section('content')

@if(Auth::check())
    @include('employees.index')
    @else
        <p>Inicie sesion para ver los datos</p>
        <button class="btn btn-primary" onclick="window.location='{{ route('login') }}'">Iniciar sesion</button>
@endif
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script>
        $(document).ready(function() {
            $('#employeesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('employees.index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'position', name: 'position' },
                    { data: 'birth_date', name: 'birth_date' },
                    { data: 'hired_on', name: 'hired_on' }
                ],
                responsive: true
            });
        });
    </script>
@stop