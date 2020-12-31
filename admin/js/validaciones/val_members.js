var carga=function(){
			
	var form=document.getElementById('formulario');
		var name=document.getElementById('name');
		var actualizacion=document.getElementById('actualizacion');
        var title=document.getElementById('title')
		var content=document.getElementById('content');
		var error=document.getElementById('error');
		var error1=document.getElementById('error1');
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
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
        }else if(title.value==""){
			error.innerHTML="Error: Título vacío.";
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
		}else if (form._submit.value != "Eliminar" || actualizacion.value != "actualizacion"  ) {

				if (form._submit.value != "" || actualizacion.value == "") {
					validarExtension(image)
				}
				
				
		}else{

		}
	});
	    // Validacion de extensiones permitidas

		
}
var extensionesValidas = ".png, .gif, .jpeg, .jpg";
	
function validarExtension(datos) {
if (datos.value == undefined){
	datos.value = "";
}
	var ruta = datos.value;
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



$("#imagen").change(function () {

	$('#texto').text('');
	//$('#imagen').attr('src', '');

	if(validarExtension(this)) {

		// if(validarPeso(this)) {
		// verImagen(this);
	}
 
});

window.onload=carga;