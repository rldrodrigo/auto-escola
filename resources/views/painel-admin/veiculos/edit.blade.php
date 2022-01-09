@extends('template.painel-admin')
@section('title', 'Editar Veículos')
@section('content')
<h6 class="mb-4"><i>EDIÇÃO DE VEÍCULOS</i></h6>
<hr>
<form method="POST" action="{{route('veiculos.editar', $item)}}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Placa</label>
                <input value="{{$item->placa}}" type="text" class="form-control" id="" name="placa" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="categoria" id="categoria" required>

                    <?php

                    use App\Models\categoria;

                    $tabela = categoria::all();
                    ?>
                    <option value="{{$item->categoria}}">{{$item->categoria}}</option>
                    @foreach($tabela as $opcao )
                    <?php
                    if ($item->categoria != $opcao->nome) {
                    ?>
                        <option value="{{$opcao->nome}}">{{$opcao->nome}}</option>

                    <?php } ?>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Km</label>
                <input value="{{$item->km}}" type="text" class="form-control" id="" name="km" required>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Cor</label>
                <input value="{{$item->cor}}" type="text" class="form-control" id="" name="cor" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input value="{{$item->marca}}" type="text" class="form-control" id="" name="marca" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Ano</label>
                <input value="{{$item->ano}}" type="text" class="form-control" id="" name="ano" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Última Revisão</label>
                <input value="{{$item->data_revisao}}" type="date" class="form-control" id="data" name="data">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Instrutor</label>
                <select class="form-control" name="instrutor">
                    <?php

                    use App\Models\instrutore;

                    $tabela = instrutore::all();
                    ?>
                    <?php
                    $data = implode('/', array_reverse(explode('-', $item->data_revisao)));

                    $instrutor = instrutore::where('id', '=', $item->instrutor)->first();
                    if ($item->instrutor != '0') {
                        $instrutor2 =  $instrutor->nome;
                    } else {
                        $instrutor2 =  'Nenhum instrutor';
                    }
                    ?>
                    <option value="{{$item->instrutor}}">{{$instrutor2}}</option>
                    @foreach($tabela as $instrutor )
                    <?php
                    if ($item->instrutor != $instrutor->id) {
                    ?>
                        <option value="{{$instrutor->id}}">{{$instrutor->nome}}</option>
                    <?php } ?>
                    <?php if ($item->instrutor != '0') {  ?>
                        <option value="0">Sem Instrutor</option>
                    <?php } ?>
                    @endforeach
                </select>
            </div>
        </div>
    </div>




    <p align="right">
        <input value="{{$item->placa}}" type="hidden" name="old">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </p>
</form>
@endsection