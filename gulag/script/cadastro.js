//Script que recebe a confirmação do php de cadastro, atualiza o HTML em caso de erros e
//redireciona para a página de login em caso de tudo estar correto

$(document).ready(function(){
  $('form').submit(function(e){
    e.preventDefault();
    $('.error').hide();
    var data = $('#myform').serialize();
    $('#message').html('sending.....');
    //Chamando ajax com as variáveis necessárias (tipo de envio, local do php,
    //tipo de resposta esperada)
    $.ajax({
      type:'POST'
      , url:'/gulag/cadastro.php'
      , data: data
      , dataType: 'json'
      , success: function(d){
        //Mostra mensagem de falha ou sucesso abaixo do botão de submit, foi usado simplesmente para testes
        $('#message').html(d.message);
        if(d.success){
          //Redireciona para a página de login se não ouver erros
          $('#message').html(d.message);
          window.location='/gulag/login.html'
        }
        else{
          //Mostra erros do campo login revelando campo previamente escondido via CSS
          if(d.errors.login){
            $('.error-login').show();
            $('.error-login').html(d.errors.login);
          }
          //Mostra erros do campo senha
          if(d.errors.senha){
            $('.error-senha').show();
            $('.error-senha').html(d.errors.senha);
          }
          //Mostra erros do campo confirmar senha
          if(d.errors.senhaconfirm){
            $('.error-senhaconfirm').show();
            $('.error-senhaconfirm').html(d.errors.senhaconfirm);
          }
        }
      }
    })
  })
})
