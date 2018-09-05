@extends('painel.templates.template')


@section('content')
<h1 class="title-pg">Listagem dos Produtos</h1>

<a href="{{route('produtos.create')}}" class="insert"><i class="fa fa-plus"> Cadastrar</i></a>
<p>

<table class="table table-striped">
    <tr>
        <th>Nome</td>
        <th>Descrição</th>
        <th width="100px">Ações</th>
    </tr>
    @if (count($products) > 0 )
    @foreach ($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>
            <a href="{{route('produtos.edit', $product->id )}}" class="actions edit">
                <i class="far fa-edit"></i>
            </a>
            <a href="{{route('produtos.show', $product->id )}}" class="actions delete">
                <!--<i class="fas fa-eraser"></i>-->
                <i class="fas fa-eye"></i>
            </a>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="2">Sem produtos para mostrar</td>
    </tr>
    @endif

    </table>

{!! $products->links() !!}

    @endsection