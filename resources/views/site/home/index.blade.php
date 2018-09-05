@extends('site.templates.template1')


@section('content')
Home Page do Site!

@if ($var1)
<p>é igual</p>
@else
<p>é diferente</p>
@endif


@unless($var1 == '123')
<p>nao é igual</p>
@endunless


@for ($i=0; $i<=10; $i++)
<p>Valor: {{$i}}
@endfor


@if (count($nomes)>0)
    @foreach($nomes as $nome)
    <p>Nome: {{$nome}}
    @endforeach
@else
nao existe
@endif



@forelse($nomes as $nome)
<p>Nome: {{$nome}}
@empty
Não existem item para serem impresos

@endforelse
    

    
    
@endsection
