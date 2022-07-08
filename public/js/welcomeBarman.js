function if_the_cocktails_are_up_to_date() {
    var tr; var keys = []; var jsonToArray = []; var coqueteis = []; var quant = []; var coqueteisInvertido; // var todos = [];
    var table       = document.getElementsByClassName("tabela-exibicao")[0];
    var tbodyData   = document.getElementsByClassName("tbodyData")[0];
    var $XML = new XMLHttpRequest ();
    setInterval(function () {
        if (document.getElementsByClassName("trData")) { tbodyData.innerHTML=""; }

        $XML.onreadystatechange = function () {
            if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
                jsonToArray = JSON.parse(this.responseText); // converte em array
                if (jsonToArray.length != 0) {
                    for (var x=0; x < jsonToArray.length; x++) {
                        keys.push(Object.keys(jsonToArray[x])); // apenas keys
                    }

                    for (var x=0; x < keys.length; x++) {
                        if (keys[x][0] != keys[x+1][0]) {
                            coqueteis = jsonToArray.splice(0, parseInt(x)+1);
                            break
                        }else { 
                            if (keys.length-1 == x){
                                break;
                            }

                        }
                    }

                    quant = jsonToArray;
                    for (var x=0; x < coqueteis.length; x++) {
                        for (var y=0; y < quant.length; y++) {
                            if (coqueteis[x].id_coqueteis == quant[y].id_quantos_coqueteis) {
                                tr = document.createElement("tr");
                                tr.setAttribute("class", "trData");

                                tr.innerHTML = "<td>" + coqueteis[x].coquetel + "</td>";
                                tr.innerHTML += "<td>" + quant[y].quantidade + "</td>";
                                tr.innerHTML += "<td><a href='#abrirModal'><input type='button' value='atualizar' class='atualizar' name='coquetel'></a></td>";
                                tr.innerHTML += "<td><a href='#abrirModal'><input type='button' value='atualizar' class='atualizar' name='quantidade'></a></td>";
                                tr.innerHTML += "<td><a href='#abrirModal'><input type='button' value='excluir' class='botao-exclusao'></a></td>";
                                tr.innerHTML += "<td style='display:none; visibility:hidden;'><input type='text' name='id_coqueteis' value='"+coqueteis[x].id_coqueteis+"'  class='td-ids'></td>"; // coquetel
                                tr.innerHTML += "<td style='display:none; visibility:hidden;'><input type='text' name='id_quantos' value='"+quant[y].id_quantos+"' class='td-ids'></td>"; // quantidade
                                
                                tbodyData.appendChild(tr);
                            }
                        }
                    }

                    if (document.getElementsByClassName("atualizar")) { var btex = document.getElementsByClassName("botao-exclusao")[0]; btex.setAttribute("onclick", "exclusao_data()") }
                    if (document.getElementsByClassName("atualizar")) { var btat = document.getElementsByClassName("atualizar"); for (var x=0; x < btat.length; x++) { btat[x].setAttribute("onclick", "update_data(this.name)") } }

                    keys = []; // depois de ter usado esvaziar este array
                }

            }
        }
        $XML.open("GET", "http://10.0.0.112:8000/popBar/barman/coqueteis", true);
        $XML.send();
    }, 5500);
}

var coq; var quant; var putUpdate;
function exclusao_data() {
    if (document.getElementsByClassName("trData")) {
        var $tdsIds = document.getElementsByClassName("td-ids");
        var $divcsrf= document.getElementsByClassName("csrf-to-js")[0];
        var puts  = document.getElementsByClassName("puts")[0];
        //var $fd  = new FormData();
        var $XML = new XMLHttpRequest ();

        coq                 = document.createElement("input");    quant                     = document.createElement("input");
        coq.type            = "text";                             quant.type                = "text";
        coq.name            = $tdsIds[0].name;                    quant.name                = $tdsIds[1].name;
        coq.value           = $tdsIds[0].value;                   quant.value               = $tdsIds[1].value;
        coq.style.display   ="none";                              quant.style.display       ="none";
        coq.style.visibility="hidden";                            quant.style.visibility    ="hidden";
        puts.appendChild(coq); puts.appendChild(quant);
        document.getElementById("form-confirm").action="http://10.0.0.112:8000/popBar/barman/coqueteis/excluir";

    }
}

function update_data(coqOrQuant) {
    if (document.getElementsByClassName("trData")) {
        var $tdsIds = document.getElementsByClassName("td-ids");
        var puts  = document.getElementsByClassName("puts")[0];

        putUpdate     = document.createElement("input");
        idProduct     = document.createElement("input");
        putUpdate.type="text";
        putUpdate.name=coqOrQuant;
        puts.innerHTML +="<label>Por:</label> ";
        puts.appendChild(putUpdate);
        if (coqOrQuant == "coquetel") {
            idProduct.type="text";
            idProduct.name=$tdsIds[0].name;
            idProduct.value=$tdsIds[0].value;
            idProduct.style.display="none"; idProduct.style.visibility="hidden";
            puts.appendChild(idProduct);
        }else {
            idProduct.type="text";
            idProduct.name=$tdsIds[1].name;
            idProduct.value=$tdsIds[1].value;
            idProduct.style.display="none"; idProduct.style.visibility="hidden";
            puts.appendChild(idProduct);
        }

        document.getElementById("form-confirm").action="http://10.0.0.112:8000/popBar/barman/coqueteis/atualizar";

    }
}

document.getElementsByClassName("fechar")[0].addEventListener("click", fechar);
function fechar() { document.getElementsByClassName("puts")[0].innerText=""; }

//

if_the_cocktails_are_up_to_date();