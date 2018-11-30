@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $event->name }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('checkout.index', ['id' => $event->id]) }}">
                        <div class="form-group">
                            <h5>Nome do Evento</h5>
                            <p>{{ $event->name }}</p>
                            <h5>Local de Apresentação</h5>
                            <p>{{ $event->address }}</p>
                            <h5>Data</h5>
                            <p>{{ $event->date->format('d/m/Y') }}</p>
                            <h5>Horário</h5>
                            <p>{{ $event->date->format('H:i:s') }}</p>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Comprar">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection