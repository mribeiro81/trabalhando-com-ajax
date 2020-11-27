<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Trabalhando com Ajax</title>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="css/stylo.css" type="text/css" rel="stylesheet" /> 
</head>
<body>

<header class="container header-background mt-1">

    <div class="row justify-content-md-center">

        <div class="col-sm">
            <h2>Os exemplos aqui apresentados  utilizam a biblioteca JQuery v3.5.1</h2>            
        </div>

    </div>

</header>

<main role="main" class="container mt-2">

    <!-- INÍCIO DO EXEMPLO $.get-->

    <div class="row">

        <div class="col-sm-6 mt-3">

            <h4 class="mt-4">1. Função $.get</h4>

            <div class="alert alert-info"> 
                A função $.get possibilita uma requisição HTTP com o uso do método GET - para url's do mesmo domínio. 
            </div>

            <form action="gravar.php" method="get" class="mt-4" name="frmGet" id="frmGet">
                
                <div id="div-alerta1" class="mt-2 mp-2 display-none">
                    <div id="msg1" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong id="msg-titulo1"></strong>
                        <hr />
                        <p id="msg-alerta1"></p>
                        <button type="button" class="close fechar1">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" id="fechar1" class="btn btn-danger fechar1">Fechar</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control requiredGet" name="nome" id="nome" title="Nome" placeholder="Nome" value="">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control requiredGet" name="email" id="email" title="E-mail" placeholder="E-mail" value="">
                </div>

                <button type="submit" class="btn btn-primary btn-lg mt-4 enviar">Enviar</button>
            </form>

            <button class="btn btn-secondary abrir-get">Ver a síntaxe da função $.get</button>
            <button class="btn btn-secondary fechar-get">Fechar a síntaxe da função $.get</button>

<pre class="display-none mt-4 sintaxe-get">
$.get(
1. "gravar.php"  
2. { nome: "Manoel", email: "email@teste.com.br" }, 
3. function(data){ 

    },
4. "html"  
);  

Explicando a sintaxe acima:
1. url: O URl do arquivo requisitado    
2. data: Dados no formato chave e valor a ser enviado ao servidor 
3. Callback: Função a ser executada após o carregamento do arquivo requisitado
4. Tipo de dado transitado na requisição 

</pre>            


        </div>       


        <div class="col-sm-6 mt-3">

            <h4 class="mt-4">Código $.get para requisição assíncrona</h4>
            <div class="alert alert-info"> 
               Veja abaixo o código da requisição assíncrona com $.get
            </div>

<pre>
$(document).ready(function(){

    //Serializando os dados para enviar
    var form = $("#frmGet").serializeArray();

    //Enviando os dados para o servidor com a função $.get
    $.get("gravar.php",{  camposGet: form },
        function(data){          

            $("#msg-alerta1").html(data); //Atribuindo os dados vindos da página gravar.php a div de alerta
            $("#div-alerta1").show("fast"); //Exibindo a div de alerta

            alert('Dados enviados com sucesso.'); //Alert simples javascript
        },
    "html"  
    );

});

</pre>    


        </div>    

    </div> 


<!-- FIM DO EXEMPLO $.get-->


<hr class="hr" />


<!-- INÍCIO DO EXEMPLO $.post-->

    <div class="row">

        <div class="col-sm-6 mt-3">

            <h4>2. Função $.post</h4>
            <div class="alert alert-info">
                A função $.post deve ser utilizada para requisição assíncrona HTTP com o uso do método post, para páginas no mesmo domínio.
            </div>
              

            <form action="gravar.php" method="post" class="mt-4" name="frmPost" id="frmPost">
                
                <div id="div-alerta" class="mt-2 mp-2 display-none">
                    <div id="msg" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong id="msg-titulo"></strong>
                        <hr />
                        <p id="msg-alerta"></p>
                        <button type="button" class="close fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" id="fechar" class="btn btn-danger fechar">Fechar</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome2">Nome</label>
                    <input type="text" class="form-control requiredPost" name="nome" id="nome2" title="Nome" placeholder="Nome" value="">
                </div>
                <div class="form-group">
                    <label for="email2">E-mail</label>
                    <input type="text" class="form-control requiredPost" name="email" id="email2" title="E-mail" placeholder="E-mail" value="">
                </div>

                <button type="submit" class="btn btn-primary btn-lg mt-4 enviar">Enviar</button>
            </form>
            
            <button class="btn btn-secondary abrir-post">Ver a síntaxe da função $.post</button>
            <button class="btn btn-secondary fechar-post">Fechar a síntaxe da função $.post</button>  

<pre class="display-none mt-4 sintaxe-post">
$.post(
1. "gravar.php"  
2. { nome: "Manoel", email: "email@teste.com.br" }, 
3. function(data){ 

    },
4. "html"  
);  

Explicando a sintaxe acima:
1. url: O URl do arquivo requisitado    
2. data: Dados no formato chave e valor a ser enviado ao servidor 
3. Callback: Função a ser executada após o carregamento do arquivo requisitado
4. Tipo de dado transitado na requisição  

</pre>            

        </div>
        <div class="col-sm-6">

            <h4 class="mt-3">Código $.post para requisição assíncrona</h4>
            <div class="alert alert-info">
                Veja abaixo o código JQuery utilizado para fazer uma requisição assíncrona para a página gravar.php.
            </div>
            
<pre>
$(document).ready(function(){                

    $("#frmPost").submit(function(){          

        //Serializando os dados para enviar
        var form = $("#frmPost").serializeArray();
        
        //Enviando os dados 
        $.post("gravar.php",{  camposPost: form },
            function(data){

                $("#msg-alerta").html(data); //Atribuindo os dados vindos da página gravar.php a div de alerta
                $("#div-alerta").show("fast"); //Exibindo a div de alerta

                alert('Dados enviados com sucesso.'); //Alert simples javascript
            }
        );  
        
        return false;            
    });        
});

</pre>    

        </div>
    </div>

<!-- FIM DO EXEMPLO $.post-->


<hr class="hr" />


<!-- INÍCIO DO EXEMPLO $.getJSON-->

    <div class="row mt-4">

        <div class="col-sm-6 mt-3">

            <h4>3. Função $.getJSON</h4>

            <div class="alert alert-info">
                A função <strong>$.getJSON</strong> destina-se para fazer requisição de arquivo remoto(não no mesmo domínio da página que faz a requisição) no formato JSON.<br/>
                O formato JSON tem a seguinte estrutura: {"a":1,"b":2,"c":"Teste"}<br/>
                O formulário abaixo será preenchido automaticamente ao digitar o cep.<br/>
                Os dados em formato JSON utilizados para preencher o formulário são fornecidos pelo site <a href="https://viacep.com.br" target="_blank">https://viacep.com.br</a><br/>
            </div>

            <div id="msg-viacep1" class="alert alert-warning alert-dismissible" role="alert">
              *A utilização do web service fornecido pelo site <a href="https://viacep.com.br" target="_blank">https://viacep.com.br</a> nesse exemplo não configura recomendação para utilizá-lo em sistemas.<br />
              **Caso precise de web service de cep, recomendo que compre um banco de dados de cep dos correios e crie o seu próprio web service, assim, você terá certeza de que a sua base de cep está completa.   
              <button type="button" class="close close1" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  


            <form action="gravar.php" method="get" name="frmJSon" id="frmJSon" class="mt-4">
                <div class="alert alert-info">
                    Preencha o cep para localizar o endereço    
                </div>    
                <div class="form-group">
                    <label for="Cep">Cep:</label>
                    <input class="form-control required" type="text" id="Cep" size="9" name="Cep" title="Cep" placeholder="Informe o seu cep *" value="">
                </div>

                <div class="form-group">
                    <label for="Logradouro">Logradouro</label>
                    <input class="form-control required" type="text" id="Logradouro" name="Logradouro" title="Logradouro" placeholder="Informe o seu endereço *" value="">
                </div>

                <div class="form-group">
                    <label for="Bairro">Bairro</label>
                    <input class="form-control required" type="text" id="Bairro" name="Bairro" title="Bairro" placeholder="Informe o bairro da sua residência *" value="">
                </div>

                <div class="form-group">
                    <label for="Cidade">Cidade</label>
                    <input class="form-control required" type="text" id="Cidade" name="Cidade" title="Cidade" placeholder="Informe a cidade da sua residência *" value="">
                </div>

                <div class="form-group">
                    <label for="Estado">Estado</label>
                    <select name="Estado" id="Estado" class="form-control required" type="select">
                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select
                </div>
                
            </form>

            <button class="btn btn-secondary abrir-get-json mt-5">Ver a síntaxe $.getJSON</button>
            <button class="btn btn-secondary fechar-get-json mt-5">Fechar a síntaxe $.getJSON</button>

<pre class="display-none mt-4 sintaxe-get-json">
$.getJSON(
1. "exemplo-json-remoto.php"  
2. { nome: "Manoel", email: "email@teste.com.br" }, 
3. function(data){ 

    }  
);  

Explicando a sintaxe acima:
1. url: O URl do arquivo requisitado    
2. data: Dados no formato chave e valor a ser enviado ao servidor 
3. Callback: Função a ser executada após o carregamento do arquivo requisitado
Observação: Essa função também admite que os parâmetros sejam passados na url

</pre> 

        </div>
    </div>

    <div class="col-sm-6 mt-3">
        <h4>Código $.getJSON para pegar endereço.</h4>
        <div class="alert alert-info">
            Veja abaixo o código JQuery utilizado para acessar o web service do site <a href="https://viacep.com.br" target="_blank">https://viacep.com.br</a>, que recebe um cep como parâmetro e retorna o endereço correspondente.
        </div>
        <div id="msg-viacep2" class="alert alert-warning alert-dismissible" role="alert">
          *A utilização do web service fornecido pelo site <a href="https://viacep.com.br" target="_blank">https://viacep.com.br</a> nesse exemplo não configura recomendação para utilizá-lo em sistemas.<br />
          **Caso precise de web service de cep, recomendo que compre um banco de dados de cep dos correios e crie o seu próprio web service, assim, você terá certeza de que a sua base de cep está completa.   
          <button type="button" class="close close2" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<pre>
$(document).ready(function(){

    $("#Cep").blur(function(){

        cep = $('#Cep').val();
        cep = cep.replace('-','');

        $.getJSON('https://viacep.com.br/ws/'+cep+'/json/',function(data){
            $('#Logradouro').val(data.logradouro);
            $('#Bairro').val(data.bairro);
            $('#Cidade').val(data.localidade);
            $('#Estado').val(data.uf);
        });

    });

});

</pre>

        </div>

    </div>

<!-- FIM DO EXEMPLO $.getJSON-->


<hr class="hr" />


<!-- INÍCIO DO EXEMPLO $.getScript-->

    <div class="row">

        <div class="col-sm-6 mt-3">

            <h4>4. Função $.getScript</h4>
            <div class="alert alert-info">
                A função $.getScript destina-se a fazer requisição de arquivo JavaScript remoto(não no mesmo domínio da paǵina que faz a requisição).
            </div>
               

           <button id="iniciar" class="btn btn-primary"> Clique para testar</button>
           <div class="dark-magenta" style=" "></div>

           <button class="btn btn-secondary abrir-get-script mt-4">Ver a síntaxe $.getScript</button>
           <button class="btn btn-secondary fechar-get-script mt-4">Fechar a síntaxe $.getScript</button>

<pre class="display-none mt-4 sintaxe-get-script">
$.getScript(
1. "https://code.jquery.com/color/jquery.color.js",  
2. function(data){ 

    },
);  

Explicando a sintaxe acima:
1. url: O URl do arquivo requisitado    
2. Callback: Função a ser executada após o carregamento do arquivo requisitado

</pre>            

        </div>
        <div class="col-sm-6">

            <h4 class="mt-3">Código $.getScript para requisição assíncrona</h4>
            <div class="alert alert-info">
                Veja abaixo o código JQuery utilizado para fazer uma requisição assíncrona para a url https://code.jquery.com/color/jquery.color.js.
            </div>
            
<pre>
$(document).ready(function(){                

    $.getScript( "https://code.jquery.com/color/jquery.color.js", function() {
        $( "#iniciar" ).click(function() {
            $( ".dark-magenta" )
              .animate({
                backgroundColor: "#FF4500"
              }, 1000 )
              .delay( 500 )
              .animate({
                backgroundColor: "#FFA500"
              }, 1000 )
              .delay( 500 )
              .animate({
                backgroundColor: "#FFD700"
              }, 1000 );
         });
    });

});

</pre>    

        </div>
    </div>

<!-- FIM DO EXEMPLO $.getScript-->


<hr class="hr" />


<!-- INÍCIO DO EXEMPLO $.ajax-->

    <div class="row pb-5">

        <div class="col-sm-6 mt-3">

            <h4>5. Função $.ajax</h4>
            <div class="alert alert-info">
                A função $.ajax carrega um arquivo utilizando requisição HTTP.<br>
                Essa função executa todos os tipos de requisições mostrados anteriormente: $.get, $.post, $.getJSON e $.getScript.<br>
                Essa função tem um grande conjunto de funcionalidades que as outras funções mais simples de entender não possuem, sendo mais completa.
            </div>
               
            <form action="gravar.php" method="post" class="mt-4" name="frmPostAjax" id="frmPostAjax">
                
                <div id="div-alerta2" class="mt-2 mp-2 display-none">
                    <div id="msg2" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong id="msg-titulo2"></strong>
                        <hr />
                        <p id="msg-alerta2"></p>
                        <button type="button" class="close fechar2">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" id="fechar2" class="btn btn-danger fechar2">Fechar</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome2">Nome</label>
                    <input type="text" class="form-control requiredPostAjax" name="nome" id="nome3" title="Nome" placeholder="Nome" value="">
                </div>
                <div class="form-group">
                    <label for="email2">E-mail</label>
                    <input type="text" class="form-control requiredPostAjax" name="email" id="email3" title="E-mail" placeholder="E-mail" value="">
                </div>

                <button type="submit" class="btn btn-primary btn-lg mt-4 enviar">Enviar</button>
            </form>

            <button class="btn btn-secondary abrir-post-ajax">Ver a síntaxe da função $.ajax</button>
            <button class="btn btn-secondary fechar-post-ajax">Fechar a síntaxe da função $.ajax</button>

<pre class="display-none mt-4 sintaxe-post-ajax">
$.ajax({
1.  url: "gravar.php",
2.  type: "POST",      
3.  data: { camposPostAjax: form},
4.  dataType: "html",
5.  success: function(data){

    });

}); 

Explicando a sintaxe acima:
1. url: O URl do arquivo requisitado  
2. type: O tipo de requisição HTTP. Valores aceitos: GET(padrão default), POST, PUT e DELETE
3. data: Os dados a serem enviados ao servidor. Pode ser: xml, html, script, json, jsonp e text 
4. datatype: Tipo de dados esperado do servidor como resposta a requisição  
3. Callback: Função a ser executada após o carregamento do arquivo requisitado
Observação: A função $.ajax tem muitos outros recursos, aqui mostro aqueles utilizados com mais frequência.

</pre>            

        </div>
        <div class="col-sm-6">

            <h4 class="mt-3">Código $.ajax para requisição assíncrona</h4>
            <div class="alert alert-info">
                Veja abaixo o código JQuery utilizado para fazer uma requisição assíncrona para a a página gravar.php.
            </div>
            
<pre>
$(document).ready(function(){                

    //Serializando os dados para enviar
    var form = $("#frmPostAjax").serializeArray();            

    $.ajax({
      url: "gravar.php",
      type: "POST",      
      data: { camposPostAjax: form},
      dataType: "html",
      success: function(data){
            
            $("#msg2").removeClass("alert alert-danger alert-dismissible fade show");
            $("#msg2").addClass("alert alert-success alert-dismissible fade show");
            $("#fechar2").removeClass("btn btn-danger fechar");
            $("#fechar2").addClass("btn btn-success fechar");
            $("#msg-titulo2").html("Recebemos com sucesso os dados listados abaixo:");
            $("#msg-alerta2").html(data);
            $("#div-alerta2").show("fast");
            alert('Dados enviados com sucesso.');
        }
    }); 

});

</pre>    

        </div>
    </div>

<!-- FIM DO EXEMPLO $.ajax-->

</main>


<script src="js/jquery-v3.5.1.min.js"></script>
<script src="js/jquery.mask.js"></script>
<script src="js/functions.js"></script>

</body>
</html>