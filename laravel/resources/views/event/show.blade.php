@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $event->name }}</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome do Evento</label>
                        <input type="text" class="form-control" value="{{ $event->name }}" disabled="">
                        <label>Local de Apresentação</label>
                        <input type="text" class="form-control" value="{{ $event->address }}" disabled="">
                        <label>Data</label>
                        <input type="text" class="form-control" value="{{ $event->date->format('d/m/Y') }}" disabled="">
                        <label>Horário</label>
                        <input type="text" class="form-control" value="{{ $event->date->format('H:i:s') }}" disabled="">
                    </div>
                    <form method="POST" action="{{ route('checkout.index') }}">
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <input type="submit" value="Comprar" class="btn btn-sm btn-primary">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection