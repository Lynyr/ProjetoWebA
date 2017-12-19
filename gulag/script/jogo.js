//Script principal do Jogo em si, realiza todas as mudanças no HTML referentes as mecânicas do jogo

//Valores obtidos via cookie
var cana = parseInt(getCookie("cana"));
var bolsonaro = parseInt(getCookie("bolsonaro"));
var facao = parseInt(getCookie("facao"));
var maquina = parseInt(getCookie("maquina"));

//Função genérica para atualizar o valor das cana no HTML
function pegaCana(n){
  cana = cana + n;
  document.getElementById("cana").innerHTML = cana;
}

//Função do botão cortar cana, obtem cana baseado no número de facões
function botaoContador(){
  if (facao > 0) {
    pegaCana(facao*2);
  }
  else {
    pegaCana(1);
  }
}

//Função para comprar bolsonaros
function compraBolsonaro(){
    var custoUpgrade = Math.floor(10 * Math.pow(1.1,bolsonaro));
    if(cana >= custoUpgrade){
        bolsonaro = bolsonaro + 1;
    	   cana = cana - custoUpgrade;
        document.getElementById('bolsonaro').innerHTML = bolsonaro;
        document.getElementById('cana').innerHTML = cana;
    };
    var proximoUpgrade = Math.floor(10 * Math.pow(1.1,bolsonaro));
    document.getElementById('custoBolsonaro').innerHTML = proximoUpgrade;
};

//Função para comprar facão
function compraFacao(){
  var custoUpgrade = Math.floor(10 * Math.pow(1.1,facao));
  if(cana >= custoUpgrade){
      facao = facao + 1;
      cana = cana - custoUpgrade;
      document.getElementById('ofacao').innerHTML = facao;
      document.getElementById('cana').innerHTML = cana;
  };
  var proximoUpgrade = Math.floor(10 * Math.pow(1.1,facao));
  document.getElementById('custoFacao').innerHTML = proximoUpgrade;
}

//Função para comprar maquinas
function compraMaquina(){
  var custoUpgrade = Math.floor(10 * Math.pow(1.1,maquina));
  if(cana >= custoUpgrade){
      maquina = maquina + 1;
      cana = cana - custoUpgrade;
      document.getElementById('maquina').innerHTML = maquina;
      document.getElementById('cana').innerHTML = cana;
  };
  var proximoUpgrade = Math.floor(10 * Math.pow(1.1,maquina));
  document.getElementById('custoMaquina').innerHTML = proximoUpgrade;
}

//Obtem cana automáticamente baseado no numero de bolsonaros e maquinas
//Também atualiza os valores dos cookies
window.setInterval(function(){
	pegaCana(bolsonaro*(maquina+1));
  document.cookie = 'cana='+cana;
  document.cookie = 'bolsonaro='+bolsonaro;
  document.cookie = 'facao='+facao;
  document.cookie = 'maquina='+maquina;
}, 1000);

//Atualiza a imagem ao clicar no botão Cortar Cana
function mudarImagem() {
    if (document.getElementById("imgChange").src == "http://localhost/gulag/img/gulagcortacana.jpeg") {
        document.getElementById("imgChange").src = "http://localhost/gulag/img/gulagcortacana2.jpeg";
    }
    else {
        document.getElementById("imgChange").src = "http://localhost/gulag/img/gulagcortacana.jpeg";
    }
}

//Atualiza valores conforme valor presente nos cookies
function atualiza(){
  document.getElementById('cana').innerHTML = cana;
  document.getElementById('bolsonaro').innerHTML = bolsonaro;
  document.getElementById('custoBolsonaro').innerHTML = Math.floor(10 * Math.pow(1.1,bolsonaro));
  document.getElementById('ofacao').innerHTML = facao;
  document.getElementById('custoFacao').innerHTML = Math.floor(10 * Math.pow(1.1,facao));
  document.getElementById('maquina').innerHTML = maquina;
  document.getElementById('custoMaquina').innerHTML = Math.floor(10 * Math.pow(1.1,maquina));
}

//Função para puxar os valors dos cookies
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
