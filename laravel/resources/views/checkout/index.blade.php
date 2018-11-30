@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    <div class="form-group">
                      <label>Ingresso</label>
                      <input type="text" value="{{ $event->name }}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Valor do Ingresso em R$</label>
                        <input type="text" class="form-control" disabled="" value="{{ $event->value}}" id="unidade">
                    </div>
                    <div class="form-group">
                        <label>Selecione a quantidade de Ingressos</label>
                        <input type="number" name="quantidade" id="quantidade" class="form-control" value="0" onclick="calculate();" min="0" max="10">
                    </div>
                    <div class="form-group">
                        <label>Valor Total em R$</label>
                        <input type="text" class="form-control" onchange="calculate()" id="total" disabled="">
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $event->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seu pedido será processado...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
@endsection

@section('scripts')
    <script type="text/javascript">
    function calculate()
    {

        var qtd      = document.getElementById('quantidade');
        var unidade  = document.getElementById('unidade');
        var total    = document.getElementById('total');
        
        var qtdValue = parseInt(qtd.value) > parseInt(qtd.max) ? 0 : qtd.value;        
        
        total.value = qtdValue * unidade.value;
    }
</script>
@endsection