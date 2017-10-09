function cambiomapa(url){
    
    
    switch (url){
        case 1:
            $('#seccion').attr('src',$('#mapa1').val());
            break;
              case 2:
            $('#seccion').attr('src',$('#mapa2').val());
            break;
              case 3:
            $('#seccion').attr('src',$('#mapa3').val());
            break;
                case 4:
            $('#seccion').attr('src',$('#mapa1b').val());
            break;
    }
    
}
function prueba(){
	alert('holi');
}