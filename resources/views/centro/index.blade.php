@extends('layouts.base')

@section('conteudo')
    
    <h1><i class="bi bi-basket-fill"></i>
        Centros de Custo
    </h1>
    -
    <a href="{{ route('centro.create') }}" class="btn btn-dark">
        Novo
    </a>

    <table class="table table-striped table-border table-hover">
        {{-- Cabeçalho --}}
        <thead> 
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Tipo</th>
                <th>Centro de Custo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($centros as $centro)
                
                <tr>
                    <td>
                        <a href="{{ route('centro.edit', ['id'=>$centro->id_centro_custo]) }}" class="btn btn-success">
                            Editar
                        </a>
                    </td>
                    <td>{{ $centro->id_centro_custo }}</td>
                    <td>{{ $centro->tipo->tipo      }}</td>
                    <td>{{ $centro->centro_custo    }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection