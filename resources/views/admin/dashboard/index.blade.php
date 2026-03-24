@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Painel administrativo</h1>
        <p>Isolamento multiempresa ativo no backend.</p>

        <ul>
            <li>Passageiros: {{ $stats['passengers'] ?? 0 }}</li>
            <li>Rotas: {{ $stats['routes'] ?? 0 }}</li>
            <li>Viagens: {{ $stats['trips'] ?? 0 }}</li>
        </ul>
    </div>
@endsection
