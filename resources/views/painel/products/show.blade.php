@extends('painel.templates.template')


@section('content')

<h1 class="title-pg">
    <a href="{{route('produtos.index')}}"> <i class="fas fa-fast-backward"></i></a>
    Producto: {{$product->name}}
</h1>
<p><b>Ativo:</b> {{ $product->ative }}<p>
<p><b>Número:</b> {{ $product->number }}<p>
<p><b>Categoria:</b> {{ $product->category }}<p>
<p><b>Descrição:</b> {{ $product->description }}<p>    
        
<hr>

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <br>{{$error}}</br>
        @endforeach
    </div>
@endif

{!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) !!}
{!! Form::submit("Deletar Producto: $product->name", ['class' => 'btn btn-danger']) !!}


{!! Form::close()!!}

@endsection