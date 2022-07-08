@include('modals.modalPedido')

<!DOCTYPE html>
<html>
<title>popBar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px;}
</style>
@stack("styles")
@stack("scripts")

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
            <img src="{{ asset('storage/imagens/saquerinha-de-kiwi.jpg') }}" alt="Sandwich" style="width:100%; height: 275px;" id="sakerinha-de-kiwi">
            <h3>Sakerinha de Kiwi</h3>
            <label>Quantidade</label>
            <input type="number" placeholder="Quantidade" value="0">
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('storage/imagens/saquerinha-de-morango.jpg') }}" alt="Steak" style="width:100%; height: 275px;" id="sakerinha-de-morango">
            <h3>Sakerinha de Morango</h3>
            <label>Quantidade</label>
            <input type="number" placeholder="Quantidade" value="0">
        </div>
        <div class="w3-quarter">
        <img src="{{ asset('storage/imagens/sakerinha-de-morango-e-kiwi.png') }}" alt="Cherries" style="width:100%; height: 275px;" id="sakerinha-de-morango-e-kiwi">
            <h3>Sak. de Morango e Kiwi</h3>
            <label>Quantidade</label>
            <input type="number" placeholder="Quantidade" value="0">
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('storage/imagens/caipiroska-nevada.png') }}" alt="Pasta and Wine" style="width:100%; height: 275px;" id="caipiroska-nevada">
            <h3>Caipiroska Nevada</h3>
            <label>Quantidade</label>
            <input type="number" placeholder="Quantidade" value="0">
        </div>
    </div>

    <div class="w3-row-padding w3-padding-16 w3-center">
        <div class="w3-quarter">
            <img src="{{ asset('storage/imagens/morritos-nacional.jpg') }}" alt="Salmon" style="width:100%; height: 275px;" id="morritos-nacional">
            <h3>Morritos Nacional</h3>
            <label>Quantidade</label>
            <input type="number" placeholder="Quantidade" value="0">
        </div>
    
    
        <div class="w3-quarter">
            <img src="{{ asset('storage/imagens/caipiroska.jpg') }}" alt="Salmon" style="width:100%; height: 275px;" id="caipiroska">
            <h3>Caipiroska</h3>
            <label>Quantidade</label>
            <input type="number" placeholder="Quantidade" value="0">
        </div>

        <div class="div-check-out">
            <a href="#abrirModal">
                <input type="button" value="fazer o pedido" id="check-out">
            </a>

        </div>
    </div>

        <!-- Pagination -->
<div class="w3-center w3-padding-32">
    <div class="w3-bar">
    <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
    <a href="#" class="w3-bar-item w3-black w3-button">1</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
</div>

<div class="from-hack" style="width:100%; text-align:center; background-color:#f0eeee;">
    From Hackzinho
</div>
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
