<%@include file="../../../partials/taglibs.jsp"%>
<!DOCTYPE html>
<html>
<head>
	<title>Horario de clases</title>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
	<link href='${path}/js/jquery/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
	<!--link href='${path}/js/jquery/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' /-->
	
	<script src='${path}/js/jquery/fullcalendar/lib/moment-with-locales.min.js'></script>
	<script src='${path}/js/jquery/fullcalendar/fullcalendar.min.js'></script>
	
	<link href='${path}/js/jquery/qtip/jquery.qtip.min.css' rel='stylesheet' />
	<script src='${path}/js/jquery/qtip/jquery.qtip.min.js'></script>
	
	<script>
		$(document).ready(function() {
			
			var nowFixed = '2015-02-09T08:00:00';
			
			$('#calendar').fullCalendar({
				header: false,
				defaultView: 'agendaWeek',
				columnFormat: 'dddd',
				hiddenDays: [ 0 ],
				allDaySlot: false,
				minTime: "08:00:00",
				maxTime: "22:00:00",
				height: 'auto',
				axisFormat: 'hh:mm a',
				slotDuration: '00:40:00',
				lang: 'es',
				now: nowFixed, //Set Fecha Actual
				//defaultDate: nowFixed, //Posicion inicial del calendar
				editable: false,
				eventRender: function(event, element) {
					
				   element.css('color', 'red');
				   element.find('.fc-title').append('<br/>'+event.location).append('<br/>'+(event.tipo=='S'?'Semanal':(event.tipo=='P'?'Sem Par':'Sem Inpar')));
				   
				   if(event.tipo == 'I')
					   element.css('width', '50%');
				   else if(event.tipo == 'P')
					   element.css('width', '50%');
				   else if(event.tipo == 'S')
					   element.css('width', '100%');
				   
				   //tooltip
				   element.qtip({
						content: '<div style="line-height:16px"><b>CURSO:</b> '+event.curso.toUpperCase()
						+'<br/><b>SESI&Oacute;N:</b> '+(event.tiposesion=='TEO'?'TEOR&Iacute;A':(event.tiposesion=='LAB'?'LABORATORIO':'TALLER'))
						+'<br/><b>DOCENTE:</b> '+event.docente.toUpperCase()+'<br/><b>AULA:</b> '+event.location
						+'<br/><b>HORARIO:</b> '+moment(event.start).format("hh:mm a")+' - '+moment(event.end).format("hh:mm a")
						+'<br/><b>D&Iacute;A:</b> '+moment(event.start).format("dddd").toUpperCase()
						+'<br/><b>FRECUENCIA:</b> '+(event.tipo=='S'?'SEMANAL':(event.tipo=='P'?'SEMANA PAR':'SEMANA INPAR'))+'</div>',
						position: {
							my: 'bottom center',
							at: 'top center',
							target: 'mouse'
						},
						style: 'qtip-light qtip-shadow qtip-rounded'
			        });
				   
				},
				eventAfterRender: function( event, element, view ) {
					if(event.tipo == 'I')
					   element.css('left', '0%');
				   else if(event.tipo == 'P')
					   element.css('left', '50%').css('right', '0%');
				   else if(event.tipo == 'S')
					   element.css('left', '0%').css('right', '0%');
				},
				eventClick: function(data, event, view) {
					$.confirm('¿Desea ingresar al aula virtual del curso?', function(){
						window.parent.location.href = path+'/aulavirtual/AulaVirtual.action?id='+data.idficha;
					});
				},
				events: [
				
				<c:forEach items="${horario}" var="sesion">
					
					{
						title: '<c:out value="${sesion.alias}"/>',
						location: '<c:out value="${sesion.ambiente}"/>',
						tipo: '<c:out value="${sesion.semana}"/>',
						curso: '<c:out value="${sesion.curso}"/>',
						tiposesion: '<c:out value="${sesion.tipo}"/>',
						docente: '<c:out value="${sesion.docente}"/>',
						idficha: '<c:out value="${sesion.idficha}"/>',
						start: moment(nowFixed).add(<c:out value="${sesion.dia-1}"/>, 'd').add(<c:out value="${(sesion.inicio-1)*50}"/>, 'm'),
						end:  moment(nowFixed).add(<c:out value="${sesion.dia-1}"/>, 'd').add(<c:out value="${(sesion.fin)*50}"/>, 'm'),
						className: 'theme-' + getColor('<c:out value="${sesion.alias}"/>'),
					},
				
				</c:forEach>      
				      
				]
			});
			
		});
		
		var lista = new Array();
		var i = 1;
		
		function getColor(alias){
			if(!lista[alias]){
				lista[alias] = i++;
			}
			return lista[alias];
		}
		
	</script>	

</head>

<body>
	
	<c:choose>
		<c:when test="${fn:length(horario)>0}">
		
			<div class="calendar" id="calendar"></div>
			
		</c:when>
		<c:otherwise>
		
			<div class="empty">No existe ninguna sesi&oacute;n programada en su horario</div>
		
		</c:otherwise>
	</c:choose>
		
</body>

</html>