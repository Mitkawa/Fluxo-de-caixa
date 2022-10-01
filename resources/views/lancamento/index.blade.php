@extends('layouts.base')

@section('conteudo')
<div class="col-md-12">
    <h1><i class="bi bi-basket-fill"></i>
        Lançamentos
        --
        <h2>
            <hr>
            <strong>Usuário: {{ Auth::user()->nome}}</strong>
            <br>
            <strong>Total de Lançamentos: {{ $lancamentos->count() }}</strong>
            <br>
            <strong>Total: R$ {{$lancamentos->sum('valor')}}</strong>
            <hr>
            
        </h2>
        
    </h1>
</div>   
    <a href="{{ route('lancamento.create') }}" class="btn btn-dark" width="40px">
        Novo
        <i class="fa-duotone fa-plus"></i>
    </a>

    {{-- Formulario de pesquisa --}}
        
    <form action="{{ route('lancamento.index') }}" method="get">
        
        <input type="text"
        name="pesquisar"
        id="pesquisar"
        value="{{old('pesquisar')}}"
        placeholder="Digite o termo a ser pesquisado...">

        <input type="date" name="dt_inicio" id="dt_inicio" placeholder="Inicio">

        <input type="date" name="dt_fim" id="dt_fim" placeholder="Fim">
        
        <input type="submit" class="btn btn-info" value="Pesquisar" >

      </form>
      {{-- /Formulário de pesquisa --}}

    <table class="table table-striped table-border table-hover">
        {{-- Cabeçalho --}}
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Data Faturamento</th>
                <th>R$ Valor</th>
                <th>Tipo</th>
                <th>Centro de Custo</th>
                <th>Descrição</th>
                <th>Data de Lançamentos</th>
                <th>Data de Atualização</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lancamentos as $lancamento)
                
                <tr>
                    <td>
                        <a href="{{ route('lancamento.edit', ['id'=>$lancamento->id_lancamento]) }}" class="btn btn-success">
                            Editar
                        </a>
                        <a href="{{ route('lancamento.edit', ['id'=>$lancamento->id_lancamento]) }}" class="btn btn-danger">
                            Excluir
                        </a>
                    </td>
                    <td>{{ $lancamento->id_lancamento                 }}</td>
                    <td>{{ $lancamento->dt_faturamento->format('d/m/Y')      }}</td>
                    <td>{{ $lancamento->valor                         }}</td>
                    <td>{{ $lancamento->centroCusto->tipo->tipo       }}</td>
                    <td>{{ $lancamento->centroCusto->centro_custo     }}</td>
                    <td>{{ $lancamento->descricao                     }}</td>
                    <td>{{ $lancamento->created_at->format('d/m/Y')}}</td>
                    <td>{{ $lancamento->updated_at->format('d/m/Y')    }}</td>
                </tr>
                
            @endforeach

        </tbody>
    </table>
    {{-- Paginação --}}
    <div>
        {{
            $lancamentos->appends(
                [
                    'pesquisar'=> request()->get('pesquisar', ''),
                    'dt_inicio'=> request()->get('dt_inicio', ''),
                    'dt_fim'=> request()->get('dt_fim', '')
                ]
            )
            ->links()
        }}
    </div>
    </table>

@endsection