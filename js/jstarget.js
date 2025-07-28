
var ExternalLinks = {
	init: function(){
		var linksObj   = document.getElementsByTagName('A');
		for(var i = 0; i < linksObj.length; i++){
			var obj = linksObj[i];
			if(obj.getAttribute('rel') == 'external'){
				if (obj.title == null | obj.title == '')
				obj.title = textoEnlaceExterno;
				else
				obj.title = obj.title + ', se abre en ventana nueva';
				//Utilizar si se quiere aplicar una clase determnada al enlace externo
				//obj.className = 'external';
				//Imagen
				if(obj.getElementsByTagName('img')[0]){
						var img = obj.getElementsByTagName('img')[0];
						img.alt = img.alt + ", se abre en ventana nueva";
				}
				obj.onclick = function(){
					//A�adir par�metros de la ventana si se desea. Alto, ancho...
					window.open(this.href);
					return false;
				}
			}
		}

		var linksObj   = document.getElementsByTagName('FORM');
		for(var i = 0; i < linksObj.length; i++){
			var obj = linksObj[i];
			//Se cambia a indexOf external por si el formulario tuviera otra clase
			if(obj.getAttribute('class') != null && obj.getAttribute('class').indexOf('external') != -1){
				//obj.title = 'Enlace externo, se abre en ventana nueva';
				//Utilizar si se quiere aplicar una clase determnada al enlace externo
				//obj.className = 'external';
				//Imagen
				//if(obj.getElementsByTagName('img')[0]){
				//		var img = obj.getElementsByTagName('img')[0];
				//		img.alt = img.alt + " Abre en ventana nueva"
				//}
				//obj.onclick = function(){
					//A�adir par�metros de la ventana si se desea. Alto, ancho...
					//window.open(this.href);
					//return false;
				//}
				obj.setAttribute('target','_blank');
			}
		}
	}
}