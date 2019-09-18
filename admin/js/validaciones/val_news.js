var carga=function(){
	
    var form=document.getElementById('formulario');
        var author=document.getElementById('author');
        var title=document.getElementById('title')
        var news_content=document.getElementById('content');
        var news_date=document.getElementById('data_picker');
		var error=document.getElementById('error');
		var error1=document.getElementById('error1');
		var image=document.getElementById('imagen')
		error.style.display="none";
		author.addEventListener('keyup', function(){
			error.style.display="none";
			error1.style.display="none";
		});
		title.addEventListener('keyup', function(){
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
			error.innerHTML="Error: Contenido vacía.";
			error.style.display="block"
            event.preventDefault();
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if(news_date.value==""){
			error.innerHTML="Error: Fecha de la noticia vacía.";
			error.style.display="block"
            event.preventDefault();	
            $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
		}else if (form._submit.value != "Eliminar") {
			if(image.value=="" || image.value.substring(image.value.lastIndexOf("."))!=(".jpg"||".gif")){
				error.innerHTML="Error: Es necesario subir una imagen. Deben ser tipo .jpg o .gif.";
				error.style.display="block"
				event.preventDefault();
				$("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0},100 );
			}
		}else{

		}
	});
}
window.onload=carga;