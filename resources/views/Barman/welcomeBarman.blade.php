@include('modals.modalPedido')

<!DOCTYPE html>
<html>
<title>popBar - Barman</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<script src="{{ asset('js/welcomeBarman.js') }}" defer></script>
<link rel="stylesheet" href="{{asset('css/welcomeBarman.css')}}" defer>
<body>

@yield('modal')

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16">Mail</div>
    <div class="w3-center w3-padding-16">My Cocktail</div>
  </div>
</div>
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
    <div class="avisos">
      @if(session("success"))
          <div class="alert alert-success">
              {{ session("success") }}
          </div>
      @endif
  
      @if(session("error"))
          <div class="alert alert-danger">
              {{ session("error") }}
              
          </div>
      @endif

      <div class="sobre-coqueteis">
          Devido a falta de Sake para os coqueteis de "sakerinha", estarei substituindo por Vodka!
      </div>
  </div>

        <!-- First Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
        <div class="w3-quarter" href="#abrirModal">
            <table class="tabela-exibicao">
                <thead>
                    <tr>
                        <th>Coquetel</th>
                        <th>Quantidade</th>
                        <th>Atualizar coquetel</th>
                        <th>Atualizar quantidade</th>
                        <th>Exclusão</th>
                    </tr>
                </thead>

                <tbody class="tbodyData"></tbody>
                
            </table>
        </div>
    </div>

    {{-- <div class="csrf-to-js">{!!csrf_field()!!}to the formulario feito em javascript</div> --}}
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
