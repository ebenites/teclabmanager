<?php // content="text/plain; charset=utf-8"
require_once 'autoload.php';
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');


$reservas = EventsDAO::cantidadReservas();
//var_dump($reservas); 

//$salones=['701','702','703','704'];
//$cantidades=[20,26,46,58];

$salones = [];
$cantidades = [];

foreach($reservas as $reserva){
    $salones[] = $reserva->salones;
    $cantidades[] = $reserva->numero_reservas;
}


/*var_dump($salones);
var_dump($cantidades);
exit();*/

// Create the graph. These two calls are always required
$grafico = new Graph(800, 600, 'auto');
$grafico->SetScale("textlin", 0, 100);

$grafico->SetShadow();    // Sombras
$grafico->SetMargin(50, 50, 50, 50);  // Márgenes

// Create the bar plots
$cantidadesBarPlot = new BarPlot($cantidades);
$cantidadesBarPlot->SetColor("white");
$cantidadesBarPlot->SetFillColor("#cc1111");
$cantidadesBarPlot->value->Show();
$cantidadesBarPlot->SetLegend('Salones');

// ...and add it to the graPH
$grafico->Add($cantidadesBarPlot);


$grafico->title->Set("Reporte de Uso de Salones");
$grafico->subtitle->Set('Información a la fecha');

$grafico->xaxis->title->Set('Salones'); // X
$grafico->yaxis->title->Set('Cantidad de Reservas');   // Y

$grafico->xaxis->SetTickLabels($salones);

// Display the graph
$grafico->Stroke(); 
