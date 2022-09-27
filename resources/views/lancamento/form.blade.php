@extends('layouts.base')

@section('conteudo')
    
    <h1>
        @if($lancamento)
        Atualizar Lançamentos
        @else
        Novo Lançamento
        @endif
    </h1>
    @if ($lancamento)
        <form action="{{ route('lancamento.update', ['id'=>$lancamento->id_lancamento ]) }}" method="post">        
    @else
        <form action="{{ route('lancamento.store') }}" method="post">        
    @endif
        @csrf
        <div class="row">
            
            <div class="form-group col-md-4">
                <label for="id_centro_custo" class="form-label">CentroCusto*</label>
                <select name="id_centro_custo" id="id_centro_custo" class="form-select" required>
                <option value="">Selecione</option>
                <optgroup label="Entradas">
                    @foreach ($saidas->get() as $centroCustos)
                        <option value="{{ $centroCustos->id_centro_custo }}"
                        {{($lancamento && $lancamento->id_centro_custo == $centroCustos->id_centro_custo  )
                        ?
                        'selected' : ''
                        }}    
                            >
                            {{ $centroCustos->centro_custo }}
                        </option>
                    @endforeach                    
                </optgroup>
                <optgroup label="Saídas">                    
                    @foreach ($entradas->get() as $centroCustos)
                    <option value="{{ $centroCustos->id_centro_custo }}"
                    {{($lancamento && $lancamento->id_centro_custo == $centroCustos->id_centro_custo  )
                    ?
                    'selected' : ''
                    }}    
                    >
                    {{ $centroCustos->centro_custo }}
                    </option>
                @endforeach 
                </optgroup>                
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="dt_faturamento" class="form-label">DT Faturamento*</label>
                <input type="date" name="dt_faturamento" id="dt_faturamento" class="form-control" value="{{ $lancamento ? $lancamento->dt_faturamento : old('dt_faturamento') }}" required>
            </div>

            <div class="form-group col-md-2">
                <label for="valor" class="form-label">Valor*</label>
                <input type="number" name="valor" id="valor" class="form-control" min="0" value ="{{ $lancamento ? $lancamento->valor : old('valor')}}" required>
            </div>

            <div class="form-group col-md-12">
                <label for="descricao" class="form-label">Descrição*</label>
                <textarea name="descricao" id="descricao" rows="2" class="form-control" placeholder="Digite sua o porque do seu lançamento aqui..">{{ $lancamento ? $lancamento->descricao : old('descricao')}}</textarea>
            </div>

            <div class="form-group col-md-2">
                <br>
                <input type="submit" value=" {{ $lancamento ? 'Atualizar' : 'Cadastrar'}}" class="btn btn-primary mt-2">
            </div>
        </div>
    </form>
@endsection