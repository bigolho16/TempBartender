@push('styles')
    <link rel="stylesheet" href="{{ asset('css/modalPedido.css') }}" defer>
@endpush

@push('scripts')
    <script src="{{ asset('js/modalPedido.js') }}" defer></script>
@endpush

@section('modal')
    {{-- The Modal --}}
    {{-- <a href="#abrirModal">Open Modal</a> --}}

    <div id="abrirModal" class="modal">
        <a href="#fechar" title="Fechar" class="fechar">x</a>

        <div class="modal-pedido">
            <form action="{{ route('pedidos.store') }}" method="POST" id="form-confirm">
                {!!csrf_field()!!}
                    <div class="coqueteis"></div>
                    <br>
                    <div class="puts"></div>
                    <input type="submit" value="Confirmar">
            </form>
        </div>
    </div>
    {{-- fim Modal content --}}
@endsection