var carga=function(){
	
	var form=document.getElementById('formulario');
		var name=document.getElementById('name');
		var content=document.getElementById('summernote');
		var error=document.getElementById('error');
		var error1=document.getElementById('error1');
		error.style.display="none";
		name.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});
		content.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});

		

	form.addEventListener('submit',function(event){
	
		if(name.value==""){
			error.innerHTML="Nombre vacio.";
			error.style.display="block"
			event.preventDefault();
		}else if(content.value==""){
			error.innerHTML="Error: Contenido vacio.";
			error.style.display="block"
			event.preventDefault();
		}else{
			
		}
		
	});
}
window.onload=carga;