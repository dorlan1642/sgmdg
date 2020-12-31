var carga=function(){
	
    var form=document.getElementById('formulario');
        var author=document.getElementById('author');
        var title=document.getElementById('title')
        var news_content=document.getElementById('summernote');
        var news_date=document.getElementById('date_picker');
		var error=document.getElementById('error');
		var error1=document.getElementById('error1');
		var image=document.getElementById('imagen')
		error.style.display="none";
		author.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});
		news_content.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		})
		

	form.addEventListener('submit',function(event){

        if(title.value==""){
			error.innerHTML="Error: Título vacío.";
			error.style.display="block"
            event.preventDefault();
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if(author.value==""){
			error.innerHTML="Error: Autor vacío.";
			error.style.display="block"
            event.preventDefault();
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
        }else if(news_content.value==""){
			error.innerHTML="Error: Contenido vacío.";
			error.style.display="block"
            event.preventDefault();
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if(news_date.value==""){
			error.innerHTML="Error: Fecha de la noticia vacía.";
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
//$('#imagen').attr('src', '');

if(validarExtension($('#imagen').val())) {

	// if(validarPeso(this)) {
	// verImagen(this);
}

});
window.onload=carga;