@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
    <a href="{{route('produtos.index')}}"><i class="fas fa-fast-backward"></i></a>
    GESTÃO PRODUTO: 
    <b>
        {{$product->name or 'Novo'}}
    </b>
   
</h1>

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <br>{{$error}}</br>
        @endforeach
    </div>
@endif

@if (isset($product))

    <!--<form action="{{route('produtos.update', $product->id)}}" class="form" method="post">-->
    <!--{!! method_field('PUT')  !!}-->   
    
    {!! Form::model($product, ['route' => ['produtos.update', 'id' => $product->id], 'class' => 'form', 'method' => 'put' ]) !!}
    
@else
    <!--<form action="{{route('produtos.store')}}" class="form" method="post">-->
    <!--<input type="hidden" name="_token" value="{{csrf_token()}}">-->
    <!--{!! csrf_field() !!}-->
    {!! Form::open(['route' => 'produtos.store', 'class' => 'form'])!!}    
@endif

    <div class="form-group">
        <!--<input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name or old('name')}}">-->
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:'])  !!}
    </div>
    <div class="form-group">
        <label>Ativo?
            <!--<input type="checkbox" name="active" @if (isset($product) && $product->active == '1') checked @endif>-->
                   {!! Form::checkbox('active') !!}
        </label>
    </div>
    <div class="form-group">
                <!--<input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number or old('number')}}">-->
                {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número:'])  !!}
    </div>
    <div class="form-group">
        <!--
        <select name="category" class="form-control">
            <option value=''>Escolha a Categoria</option> 
            @foreach($categories as $category)
            <option value="{{$category}}" @if (isset($product) && $product->category == $category) selected @endif >{{$category}}</option>
            @endforeach
        </select>
        -->
        {!! Form::select('category', array_combine($categories, $categories), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <!--<textarea name="description" placeholder="Descrição:" class="form-control">{{$product->description  or old('description')}}</textarea>-->
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:'])  !!}

    </div>
    <div class="form-group">
        <!--<button class="btn btn-primary">Enviar</button>-->
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    </div>

<!--</form>-->
{!! Form::close() !!}

@endsection