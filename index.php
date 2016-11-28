<?php
require_once 'autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title></title>
    
    <link rel="icon" href="favicon.ico">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    
    <script src="bower_components/bootbox.js/bootbox.js"></script>
    
    <link rel="stylesheet" href="bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css">
    <script src="bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
    
    <link rel="stylesheet" href="bower_components/bootstrap-fileinput/css/fileinput.min.css">
    <script src="bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
    <script src="bower_components/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
    <script src="bower_components/bootstrap-fileinput/js/plugins/purify.min.js"></script>
    <script src="bower_components/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="bower_components/bootstrap-fileinput/js/locales/es.js"></script>
    
    <script src="bower_components/spin.js/spin.min.js"></script>
    <script src="bower_components/spin.js/jquery.spin.js"></script>
    
    <link rel="stylesheet" href="bower_components/jquery-colorbox/example1/colorbox.css">
    <script src="bower_components/jquery-colorbox/jquery.colorbox-min.js"></script>
    
    
    <link rel="stylesheet" href="bower_components/tipso/src/tipso.min.css">
    <link rel="stylesheet" href="bower_components/animate.css/animate.min.css">
    <script src="bower_components/tipso/src/tipso.min.js"></script>
    
    <link href='bower_components/fullcalendar/dist/fullcalendar.min.css' rel='stylesheet' />
    <link href='bower_components/fullcalendar-scheduler/dist/scheduler.min.css' rel='stylesheet' />
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='bower_components/moment/min/moment-with-locales.min.js'></script>
    <script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
    <script src='bower_components/fullcalendar/dist/locale/es.js'></script>
    <script src='bower_components/fullcalendar-scheduler/dist/scheduler.min.js'></script>
    
    <link href='bower_components/qtip2/jquery.qtip.min.css' rel='stylesheet' />
	<script src='bower_components/qtip2/jquery.qtip.min.js'></script>
    
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <script src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <script src='bower_components/smartupdater/index.js'></script>
    
    <link rel="stylesheet" href="css/style.css">
    
    <script>
        
        $(function(){
           $('a.colorbox').colorbox({maxWidth:'95%', maxHeight:'95%'});
           
           // Temporal
           setInterval(function(){
               $('#calendar').fullCalendar('refetchEvents');
           }, 5000);
           
           
        });
        
    	function confirmar(link, message){
    		bootbox.confirm((message)?message:"¿Realmente estas seguro?", function(result){ 
    			if(result){
    				window.location.href = link.href;
    			}
    		});
    		return false;
    	}
    	
    </script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/logo.svg"></img></a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Niveles</a></li>
                    <li><a href="#">Alertas</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="http://lorempixel.com/32/32/people" width="32" height="32" class="img-circle special-img"> Luis Bueno <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mis datos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout">Salir</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-2 col-sm-3">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Laboratorios</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">Todos</a></li>
                        <li class="list-group-item"><a href="#">701</a></li>
                        <li class="list-group-item"><a href="#">702</a></li>
                        <li class="list-group-item"><a href="#">703</a></li>
                    </ul>
                </div>
                
            </div>
            <div class="col-md-10 col-sm-9">
                
                <?php Flash::show() ?>
                
                <div class="panel panel-default">
                    <div class="panel-heading">Calendario: 701</div>
                    <div class="panel-body">
                        
                        <div id='calendar'></div>
                        
                        <script>

                        	$(document).ready(function() {
                        		
                        // 		https://fullcalendar.io/docs/
                        		
                        		$('#calendar').fullCalendar({
                        		    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                        			header: {
                        				left: 'prev,next today',
                        				center: 'title',
                        				right: 'month,agendaWeek,agendaDay' //timelineWeek
                        			},
                        			locale: 'es',
                        			
                        			defaultView: 'agendaWeek',
                        			height: 'auto',
                        			axisFormat: 'hh:mm a', // formato del eje x
				                    slotDuration: '00:30:00', // rango de las horas
                        			minTime: "08:00:00", // hora minima
				                    maxTime: "22:00:00", // hora maxima
				                    eventOverlap: false, // no permite solapamiento de eventos
				                    navLinks: true, // can click day/week names to navigate views
				                    eventLimit: true, // allow "more" link when too many events in month view
				                    weekNumbers: true, // Mostrar numero de semana
				                    allDaySlot: false, // Ocultar la fila de 'Todo el dia'
				                    
                        			defaultDate: '2016-11-29',
                        			
                        			editable: true,
                        			
                        			// https://fullcalendar.io/js/fullcalendar-3.0.1/demos/selectable.html
                        			selectable: true,
                        			selectHelper: true,
                                    select: function(start, end) {
                                        
                                        // var title = prompt('Event Title:');
                                        bootbox.prompt("Ingrese el nombre de la reserva", function(title){
                                            
                                            if (title) {
                            					var eventData = {
                            						title: title,
                            						start: start,
                            						end: end,
                            						users_fullname: 'Luis Bueno'
                            					};
                            					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                            				}
                            				$('#calendar').fullCalendar('unselect');
                            				
                                        });
                        				
                        				// Registrer Ajax
                        				// http://stackoverflow.com/questions/10840084/create-event-with-fullcalendar-when-clicking-on-calendar-rails
                        				
                        			},
                        			
                        			eventRender: function(event, element) {
					
                    				   element.find('.fc-title').append('<br/>'+event.users_fullname);
                    				   
                    				   //tooltip
                    				   element.qtip({
                    						content: '<div style="line-height:16px"><b>T&Iacute;TULO:</b> '+event.title
                    						+'<br/><b>USUARIO:</b> '+event.users_fullname
                    						+'<br/><b>AULA:</b> '+'701'
                    						+'<br/><b>HORARIO:</b> '+moment(event.start).format("dddd")+' '+moment(event.start).format("hh:mm a")+' - '+moment(event.end).format("hh:mm a")
                    						+'</div>',
                    						position: {
                    							my: 'bottom center',
                    							at: 'top center',
                    							target: 'mouse',
                    							adjust: {
                                                    y: -10
                                                }
                    						},
                    						style: 'qtip-light qtip-shadow qtip-rounded'
                    			        });
                    				   
                    				},
                    				
                    				eventResize: updateEvent,
                    				
                    				eventDrop: updateEvent,
                    				
                        			events: 'events-json.php'
                        			
                        		});
                        		
                        	});
                        
                            function updateEvent(event, delta, revertFunc){
                                console.log(event);
                    			$('.qtip').qtip('hide'); // Fixed: Cuando se mueve el evento a veces no se oculta el tooltip
                    			
                    			// Update Ajax
                    			// http://stackoverflow.com/questions/18238405/how-to-send-an-ajax-request-to-update-event-in-fullcalender-ui-when-eventdrop-i
                    			
                            }
                        
                        </script>
                        
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</body>
</html>