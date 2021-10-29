<h1>FORNECEDOR</h1>

// ISTO NÃO É 1 COMENTÁRIO DENTRO DO BLADE 

{{-- ISTO SIM, É 1 COMENTÁRIO DENTRO DO ARQUIVO BLADE! --}}
<br>
BLOCOS DE PHP PURO: <br>

@php 
// COMENTÁRIO PHP PURO
echo 'AQUI DENTRO CÓDIGO PHP PURO';
@endphp 
<br>


{{-- inicio do isset --}}
@isset($fornecedores) {{-- se fornecedores estiver setado, vai executar o qu vem abaixo --}}

<h2>Fornecedores foram setados!</h2>
{{-- início do if e else no blade --}}
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
<h3>Existem alguns fornecedores</h3>
@elseif(count($fornecedores) > 10)
<h3>Existem vários fornecedores</h3>
@else
<h3>Ainda não existem fornecedores</h3>
@endif {{-- fim do if e else no blade --}}

@endisset {{-- inicio do isset --}}

{{-- 
{{-- TESTANDO O EMPTY COM O ISSET 
@isset($fornecedores2[0]['cnpj'])
  CNPJ: {{ $fornecedores2[0]['cnpj'] }}
  @empty($fornecedores2[0]['cnpj'])
      - CAMPO VAZIO !
  @endempty
@endisset
--}}

<!-- TESTANDO O OPERADOR CONDICIONAL DE VALOR DEFAULT -->
@isset($fornecedores2)
  CNPJ: {{ $fornecedores2[0]['cnpj'] ?? 'DADO NÃO FOI PREENCHIDO' }}
  {{-- ?? SIMBOLO PARA O DEFAULT --}}
  {{-- 'DADO NÃO FOI PREENCHIDO' = VALOR DEFAULT QUANDO 1 DAS EXIGENCIAS NÃO FOR SATISFEITA --}
  {{-- EXIGÊNCIAS PARA ASSUMIR O VALOR DEFAULT : 
  - OU A VARIÁVEL TESTADA NÃO ESTIVER DEFINIDA 
  - OU A VARIÁVEL TESTADA POSSUIR O VALOR NULL --}}
  <br>
  TELEFONE: ({{ $fornecedores2[0]['ddd'] ?? '' }}) {{ $fornecedores2[0]['telefone'] ?? '' }}
  @switch($fornecedores2[0]['ddd'])  {{-- SWITCH/CASE INÍCIO --}}
    @case ('11')
      São Paulo - SP
      @break
    @case ('37')
      Pitangui - MG
      @break
    @case ('85')
      Fortaleza - CE
      @break
    @default
      Estado não Identificado!
  @endswitch  {{-- SWITCH/CASE FIM --}}
@endisset

<br><br><br>


{{-- LAÇO DE REPETIÇÃO FOR --}}

@isset($fornecedores2)
    @for($i = 0; isset($fornecedores2[$i]); $i++)
        Fornecedor: {{ $fornecedores2[$i]['nome'] }}
        <br>
        CNPJ: {{ $fornecedores2[$i]['cnpj'] ?? '' }}
        <br>
        TELEFONE: ({{ $fornecedores2[$i]['ddd'] ?? '' }}) {{ $fornecedores2[$i]['telefone'] ?? '' }}
        <hr>
    @endfor
@endisset

<br>
<br>
<br>

  {{-- LAÇO DE REPETIÇÃO WHILE --}}

@isset($fornecedores2)
    @php $i = 0 @endphp
    @while(isset($fornecedores2[$i]))
        Fornecedor: {{ $fornecedores2[$i]['nome'] }}
        <br>
        CNPJ: {{ $fornecedores2[$i]['cnpj'] ?? '' }}
        <br>
        TELEFONE: ({{ $fornecedores2[$i]['ddd'] ?? '' }}) {{ $fornecedores2[$i]['telefone'] ?? '' }}
        <hr>
    @php $i++ @endphp
    @endwhile
@endisset

<br>
<br>
<br>

  {{-- LAÇO DE REPETIÇÃO FOREACH --}}
@isset($fornecedores2)
    @foreach($fornecedores2 as $indice => $fornecedor2)
        Fornecedor: {{ $fornecedor2['nome'] }}
        <br>
        CNPJ: @{{ $fornecedor2['cnpj'] ?? '' }}
        <br>
        TELEFONE: ({{ $fornecedor2['ddd'] ?? '' }}) {{ $fornecedor2['telefone'] ?? '' }}
        <hr>
    @endforeach
@endisset


<br>
<br>
<br>

  {{-- LAÇO DE REPETIÇÃO FOREACH COM VARIÁVEL LOOP --}}
@isset($fornecedores2)
    @foreach($fornecedores2 as $indice => $fornecedor2)
        Iteração Atual do Laço: {{ $loop->iteration }} {{-- variável loop --}}<br>
        Fornecedor: {{ $fornecedor2['nome'] }}
        <br>
        CNPJ: {{ $fornecedor2['cnpj'] ?? '' }}
        <br>
        TELEFONE: ({{ $fornecedor2['ddd'] ?? '' }}) {{ $fornecedor2['telefone'] ?? '' }}
        <br>
        @if($loop->first)   {{-- variável loop --}}
          Primeira Iteração do Loop
        @endif

         @if($loop->last)   {{-- variável loop --}}
          Última Iteração do Loop

        <br>
        Total de Registros: {{$loop->count}} {{-- variável loop --}}
        @endif
        <hr>
    @endforeach
@endisset

