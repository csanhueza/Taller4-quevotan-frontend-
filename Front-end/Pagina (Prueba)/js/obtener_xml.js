	var i=0;
	$(document).ready(function(){
		$.get('xml/diputados.xml',function(d){
		$(d).find('DiputadoPeriodo').each(function(){
			var apellidoP = $(this).find('ApellidoPaterno').text();
			var apellidM  = $(this).find('ApellidoMaterno').text();
      var apellidos =apellidoP+" "+apellidM;
      var menor = 0;
      for(i = apellidos.length ;i < 25;i++){
          apellidos += " &nbsp;"; 
      }
			var html = "<li class='' style='float:left;'><a href='#'>"+apellidos +"</a></li>";
			$("#lista").append($(html));
			});
		});
	});