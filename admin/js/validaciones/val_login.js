var carga=function(){
	
	var form=document.getElementById('formulario');
		var usuario=document.getElementById('user');
		var con=document.getElementById('pass');
		var error=document.getElementById('error');
		var error1=document.getElementById('error1');
		error.style.display="none";
		usuario.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});
		con.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});

		

	form.addEventListener('submit',function(event){
	
		if(usuario.value==""){
			error.innerHTML="Error: Usuario vacío.";
			error.style.display="block"
			event.preventDefault();
		}else if(con.value==""){
			error.innerHTML="Error: Contraseña vacía.";
			error.style.display="block"
			event.preventDefault();
		}else{
			
		}
		
	});
}
window.onload=carga;