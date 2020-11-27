
$(document).ready(function(){

	$('#Cep').mask('00000-000');

	



	/*2. Exemplo de utilização da função $.get */
	$("#frmGet").submit(function(){
	
		msg="";
		$(".requiredGet").each(function() {
			if ($(this).val() == "") {
				msg += " - " + $(this).attr("title") + "<br>";
			}

			if($(this).attr("id") == 'email'){				
				valida_email = validaEmail($(this).val());	
				if(valida_email == false){
					msg+= " - "+"O e-mail válido<br>";
				}
			}
		});
		 

		if(msg != ""){

			$("#msg1").removeClass("alert alert-success alert-dismissible fade show");
			$("#msg1").addClass("alert alert-danger alert-dismissible fade show");
			$("#fechar1").removeClass("btn btn-success fechar");
			$("#fechar1").addClass("btn btn-danger fechar");
			$("#msg-titulo1").html("Preencha os campos informados abaixo:");
			$("#msg-alerta1").html(msg);
			$("#div-alerta1").show("fast");
			return false;
		}


		//Serializando os dados para enviar
		var form = $("#frmGet").serializeArray();
		
		//Enviando os dados para o servidor com a função $.get
		$.get("gravar.php",{  camposGet: form },
			function(data){
				
				$("#msg1").removeClass("alert alert-danger alert-dismissible fade show");
				$("#msg1").addClass("alert alert-success alert-dismissible fade show");
				$("#fechar1").removeClass("btn btn-danger fechar");
				$("#fechar1").addClass("btn btn-success fechar");
				$("#msg-titulo1").html("Recebemos com sucesso os dados listados abaixo:");
				$("#msg-alerta1").html(data);
				$("#div-alerta1").show("fast");
				alert('Dados enviados com sucesso.');
			},
		"html"	
		);	
		
		return false;
		
    });
	//Fim do exemplo 2 - $.get




	/*2. Exemplo de utilização da função $.post */
	$("#frmPost").submit(function(){
	
		msg="";
		$(".requiredPost").each(function() {
			if ($(this).val() == "") {
				alert($(this).attr('id'));
				msg += " - " + $(this).attr("title") + "<br>";
			}

			if($(this).attr("id") == 'email2'){				
				valida_email = validaEmail($(this).val());	
				if(valida_email == false){
					msg+= " - "+"O e-mail válido<br>";
				}
			}
		});
		 
		
		if(msg != ""){

			$("#msg").removeClass("alert alert-success alert-dismissible fade show");
			$("#msg").addClass("alert alert-danger alert-dismissible fade show");
			$("#fechar").removeClass("btn btn-success fechar");
			$("#fechar").addClass("btn btn-danger fechar");
			$("#msg-titulo").html("Preencha os campos informados abaixo:");
			$("#msg-alerta").html(msg);
			$("#div-alerta").show("fast");
			return false;
		}


		//Serializando os dados para enviar
		var form = $("#frmPost").serializeArray();
		
		//Enviando os dados para o servidor com a funçã o $.post
		$.post("gravar.php",{  camposPost: form },
			function(data){
				
				$("#msg").removeClass("alert alert-danger alert-dismissible fade show");
				$("#msg").addClass("alert alert-success alert-dismissible fade show");
				$("#fechar").removeClass("btn btn-danger fechar");
				$("#fechar").addClass("btn btn-success fechar");
				$("#msg-titulo").html("Recebemos com sucesso os dados listados abaixo:");
				$("#msg-alerta").html(data);
				$("#div-alerta").show("fast");
				alert('Dados enviados com sucesso.');
			},
		"html"	
		);	
		
		return false;
		
    });
	//Fim do exemplo 2 - $.post


	/*
	3.Exemplo de utilização da função $.getJSON para acessar o web service disponibilizado pelo site
	https://viacep.com.br
	*/
	$("#Cep").blur(function(){
		cep = $('#Cep').val();
		cep = cep.replace('-','');

		$.getJSON('https://viacep.com.br/ws/'+cep+'/json/',function(data){	
			if(data.erro == true){
				alert("Não foi encontrado endereço para o cep informado.\nVerifique o cep e tente novamente.");	
				$('#Logradouro').val("");	
				$('#Bairro').val("");	
				$('#Cidade').val("");	
				$('#Estado').val("");
			}else{
				$('#Logradouro').val(data.logradouro);	
				$('#Bairro').val(data.bairro);	
				$('#Cidade').val(data.localidade);	
				$('#Estado').val(data.uf);	
			}			
		});
		
	});
	//Fim do exemplo 3 - $.getJSON



	//INÍCIO DO EXEMPLO 4 - $getScript
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
	//FIM DO EXEMPLO 4 - $getScript



	//INÍCIO DO EXEMPLO 5 - $.ajax
	$("#frmPostAjax").submit(function(){
	
		msg="";
		$(".requiredPostAjax").each(function() {
			if ($(this).val() == "") {
				alert($(this).attr('id'));
				msg += " - " + $(this).attr("title") + "<br>";
			}

			if($(this).attr("id") == 'email2'){				
				valida_email = validaEmail($(this).val());	
				if(valida_email == false){
					msg+= " - "+"O e-mail válido<br>";
				}
			}
		});
		 
		
		if(msg != ""){

			$("#msg2").removeClass("alert alert-success alert-dismissible fade show");
			$("#msg2").addClass("alert alert-danger alert-dismissible fade show");
			$("#fechar2").removeClass("btn btn-success fechar");
			$("#fechar2").addClass("btn btn-danger fechar");
			$("#msg-titulo2").html("Preencha os campos informados abaixo:");
			$("#msg-alerta2").html(msg);
			$("#div-alerta2").show("fast");
			return false;
		}


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
		
		return false;
		
    });



	//FIM DO EXEMPLO 5 - $.ajax





	$(".fechar").click(function(){
		$("#div-alerta").hide("slow");
	});

	$(".fechar1").click(function(){
		$("#div-alerta1").hide("slow");
	});

	$(".fechar2").click(function(){
		$("#div-alerta2").hide("slow");
	});	
	

	$(".close1").click(function(){
		$("#msg-viacep1").hide("slow");
	});

	$(".close2").click(function(){
		$("#msg-viacep2").hide("slow");
	});



	$(".abrir-get").click(function(){
		$(".sintaxe-get").fadeIn("fast");			
	});
	$(".fechar-get").click(function(){
		$(".sintaxe-get").fadeOut("slow");			
	});


	$(".abrir-post").click(function(){
		$(".sintaxe-post").fadeIn("fast");			
	});
	$(".fechar-post").click(function(){
		$(".sintaxe-post").fadeOut("slow");			
	});


	$(".abrir-get-json").click(function(){
		$(".sintaxe-get-json").fadeIn("fast");	
		return false;		
	});
	$(".fechar-get-json").click(function(){
		$(".sintaxe-get-json").fadeOut("slow");			
		return false;
	});


	$(".abrir-get-script").click(function(){
		$(".sintaxe-get-script").fadeIn("fast");	
		return false;		
	});
	$(".fechar-get-script").click(function(){
		$(".sintaxe-get-script").fadeOut("slow");			
		return false;
	});
	

	$(".abrir-post-ajax").click(function(){
		$(".sintaxe-post-ajax").fadeIn("fast");			
	});
	$(".fechar-post-ajax").click(function(){
		$(".sintaxe-post-ajax").fadeOut("slow");			
	});

});



function validaCpf() {
    
    var exp = /\.|\-/g;
    
    var cpf = $('#Cpf').val().replace(exp,'').toString();
    
    if(cpf.length == 11 ){
    
	    var v = [];

	    //Calcula o primeiro dígito de verificação.
	    v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
	    v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
	    v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
	    v[0] = v[0] % 11;
	    v[0] = v[0] % 10;

	    //Calcula o segundo dígito de verificação.
	    v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
	    v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
	    v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
	    v[1] = v[1] % 11;
	    v[1] = v[1] % 10;
	            
	    if ((v[0] != cpf[9]) || (v[1] != cpf[10])) {
	    	return false;	    	
		}else if (cpf[0] == cpf[1] && cpf[1] == cpf[2] && cpf[2] == cpf[3] && cpf[3] == cpf[4] && cpf[4] == cpf[5] && cpf[5] == cpf[6] && cpf[6] == cpf[7] && cpf[7] == cpf[8] && cpf[8] == cpf[9] && cpf[9] == cpf[10])
	    {
	    	return false;	    	
	    }else{
	    	return true;	    	
		}       
        
    
    }else {
    	return false;    	
    } 
}


function validaEmail(email){

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email)) {
	   return false;
	}
	return true;
}


//Celular
function validaCelular(value) {
    value = value.replace("(","");
    value = value.replace(")", "");
    value = value.replace("-", "");
    value = value.replace(" ", "").trim();
    if (value == '0000000000') {
        return false;
    } else if (value == '00000000000') {
        return false;
    } 
    if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
        return false;
    }
    if (value.length < 10 || value.length > 11) {
        return false;
    }
    if (["6", "7", "8", "9"].indexOf(value.substring(2, 3)) == -1) {
        return false;
    }

    return true;
} 

//Telefone fixo
function validaTelefone(value) {
        value = value.replace("(", "");
        value = value.replace(")", "");
        value = value.replace("-", "");
        value = value.replace(" ", "").trim();
        if (value == '0000000000') {
            return false;
        } else if (value == '00000000000') {
            return false;
        }
        if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
            return false;
        }
        if (value.length < 10 || value.length > 11) {
            return false;
        }
        if (["1", "2", "3", "4","5"].indexOf(value.substring(2, 3)) == -1) {
            return false;
        }

        return true;
} 
