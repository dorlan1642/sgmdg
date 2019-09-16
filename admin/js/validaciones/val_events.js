var carga=function(){
	
	var form=document.getElementById('formulario');
		var name=document.getElementById('name');
		var content=document.getElementById('summernote');
		var error=document.getElementById('error');
		var error1=document.getElementById('error1');
		var date_event=document.getElementById('date_picker');
		var image=document.getElementById('imagen')
		error.style.display="none";
		name.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});
		content.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		})
		

	form.addEventListener('submit',function(event){

		if(name.value==""){
			error.innerHTML="Error: Nombre vacío.";
			error.style.display="block"
			event.preventDefault();
		}else if(content.value==""){
			error.innerHTML="Error: Contenido vacío.";
			error.style.display="block"
			event.preventDefault();
		}else if(date_event.value==""){
			error.innerHTML="Error: Es necesaria una fecha para el evento.";
			error.style.display="block"
			event.preventDefault();
		}else if(resume.value==""){
			error.innerHTML="Error: Resumen vacío.";
			error.style.display="block"
			event.preventDefault();	
		}else if (form._submit.value != "Eliminar") {
			if(image.value=="" || image.value.substring(image.value.lastIndexOf("."))!=(".jpg"||".gif")){
				error.innerHTML="Error: Es necesario subir una imagen. Deben ser tipo .jpg o .gif.";
				error.style.display="block"
				event.preventDefault();
			}
		}else{

		}
	});
}
window.onload=carga;