var coqueteis = document.getElementsByClassName("w3-quarter");
var modCoquet = document.getElementsByClassName("coqueteis")[0];
var puts      = document.getElementsByClassName("puts")[0];
var coq; var quant; var nmCoq; var nmQua; var idCoq = 1;
document.getElementById("check-out").addEventListener("click", function () {
    for (var x=0; x < coqueteis.length; x++) {
        if (coqueteis[x].children[3].value != 0) {
            modCoquet.innerHTML += "Nome: " + coqueteis[x].children[0].id + " Quantidade: " + coqueteis[x].children[3].value + "<br>";

            // nmCoq=coqueteis[x].children[0].id.replace(/-/g, "_");
            // nmQua=coqueteis[x].children[3].value.replace(/-/g, "_");

            coq   = document.createElement("input");            quant = document.createElement("input");
            coq.type="text";                                    quant.type="text";
            coq.name="coquetel_"+idCoq;                         quant.name="quantidade_"+idCoq; idCoq = parseInt(idCoq)+1;
            coq.style.display="none";                           quant.style.display="none";
            coq.setAttribute("class", "input-coquetel-pronto"); quant.setAttribute("class", "input-coquetel-pronto");
            coq.value= coqueteis[x].children[0].id;             quant.value=coqueteis[x].children[3].value;
            puts.appendChild(coq);                              puts.appendChild(quant);
        }
        if (x == coqueteis.length-1) { if(modCoquet.childNodes.length == 0) { modCoquet.innerHTML = "Não há coqueteis selecionados"; } }
    }
})
document.getElementsByClassName("fechar")[0].addEventListener("click", function () {
    modCoquet.innerHTML = "";
    //
    if(document.getElementsByClassName("input-coquetel-pronto")) {
        puts.innerText="";
    }
    //
    idCoq=1;
})