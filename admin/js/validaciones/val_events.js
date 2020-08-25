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
			
		});
		content.addEventListener('keyup', function(){
			error.style.display="none";
		
		})
		

	form.addEventListener('submit',function(event){

		if(name.value==""){
			error.innerHTML="Error: Nombre vacío.";
			error.style.display="block"
			event.preventDefault();
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if(resume.value==""){
			error.innerHTML="Error: Resumen vacío.";
			error.style.display="block"
			event.preventDefault();	
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if(content.value==""){
			error.innerHTML="Error: Contenido vacío.";
			error.style.display="block"
			event.preventDefault();
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if(date_event.value==""){
			error.innerHTML="Error: Es necesaria una fecha para el evento.";
			error.style.display="block"
			event.preventDefault();
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if (form._submit.value != "Eliminar" || actualizacion.value != "actualizacion"  ) {

			if (form._submit.value != "" || actualizacion.value == "") {
				validarExtension($('#imagen').val())
			}
			
			
	}else{

	}
});
	// Validacion de extensiones permitidas

	
}
var extensionesValidas = ".png, .gif, .jpeg, .jpg";

function validarExtension(datos) {
	
	
	if (datos == undefined){
	datos= "";
	}
	var ruta = datos;
	var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
	var extensionValida = extensionesValidas.indexOf(extension);

	if(extensionValida < 1) {
			$('#texto').text('La extensión no es válida Su fichero tiene de extensión: .'+ extension);
		error.innerHTML="Error:'La extensión no es válida Su fichero tiene de extensión:. " + extension;
		error.style.display="block"
		event.preventDefault();
		$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
			return false;
		} else {
			return true;
		}
}



$('#imagen').change(function () {

$('#texto').text('');
$('#img').attr('src', '');

if(validarExtension($('#imagen').val())) {

	// if(validarPeso(this)) {
	// verImagen(this);
}

});
window.onload=carga;