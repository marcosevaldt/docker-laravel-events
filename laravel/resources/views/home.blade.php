@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Eventos</div>
                <div class="card-body">
                    <table class="table table-light table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Nome do Evento</th>
                          <th scope="col">Local de Apresentação</th>
                          <th scope="col">Data</th>
                          <th scope="col">Horário</th>
                          <th scope="col">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($events as $event)
                        <tr>
                          <td>{{ $event->name }}</td>
                          <td>{{ $event->address }}</td>
                          <td>{{ $event->date->format('d/m/Y') }}</td>
                          <td>{{ $event->date->format('H:i:s') }}</td>
                          <td>
                              <a href="#" class="btn btn-sm btn-primary">Detalhes</a>
                          </td>
                        </tr>
                        @empty
                            Nenhum Evento cadastrado!
                        @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
