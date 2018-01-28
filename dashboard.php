<?php
require_once 'autoload.php';
require_once 'includes/security.php';


$fecinicio = '2018-01-22';
$fecfin = '2018-01-27';
if(count($_POST)>0){
    $fecinicio = $_POST['fecinicio'];
    $fecfin = $_POST['fecfin'];
}

$reporte701 = EventsDAO::reporteUso('701', $fecinicio, $fecfin);

?>
<!DOCTYPE html>

<html>
    <head>
        
        <?php require_once './includes/assets.php'; ?>
        
    </head>
    
    <body>
        
        <?php require_once './includes/header.php'; ?>
        
        <div class="container-fluid wrapper">
            
            <div class="page-header">
                <h2>Reservas</h2>
            </div>
            
            <?php Flash::show() ?>
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Seleccionar frecuencia</h2>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="dashboard.php" method="post">
                        <input type="date" name="fecinicio" class="form-control" value="<?=$fecinicio?>">
                        <input type="date" name="fecfin" class="form-control" value="<?=$fecfin?>">
                        <input type="submit" name="Mostrar" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Reporte de uso por ambiente</h2>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                        
                        <div class="col-md-4"><!-- 701 -->
                            
                            <div id="container-701" style=""></div>
                            <script>
                                $(function(){
                                    
                                    Highcharts.chart('container-701', {
                                        chart: {
                                            plotBackgroundColor: null,
                                            plotBorderWidth: null,
                                            plotShadow: false,
                                            type: 'pie'
                                        },
                                        title: {
                                            text: 'Nivel de uso del ambiente 701'
                                        },
                                        tooltip: {
                                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b> ({point.y:.1f}h)'
                                        },
                                        plotOptions: {
                                            pie: {
                                                allowPointSelect: true,
                                                cursor: 'pointer',
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                showInLegend: true,
                                                colors: ['#0099CC', '#9999A9', '#FF6666'],
                                            },
                                            series: {
                                                dataLabels: {
                                                    enabled: true,
                                                    format: '{point.name}: {point.percentage:.1f}%'
                                                }
                                            }
                                        },
                                        series: [{
                                            name: 'Nivel de uso',
                                            colorByPoint: true,
                                            data: [{
                                                name: 'Uso',
                                                y: <?=$reporte701['total-uso']/60?>,
                                            }, {
                                                name: 'Desuso',
                                                y: <?=$reporte701['total-desuso']/60?>,
                                            }, {
                                                name: 'Muerto',
                                                y: <?=$reporte701['total-muerto']/60?>,
                                            }]
                                        }]
                                    });
                                    
                                });
                            </script>
                            
                            <?php var_dump($reporte701) ?>
                            
                        </div>
                        
                        <!--div class="col-md-4">
                            
                        </div>
                        
                        <div class="col-md-4">
                            
                        </div-->
                        
                    </div>
                    
                </div>
            </div>
            
            
        </div>              
    
    </body>
    
    <?php require_once './includes/footer.php';?>
    
</html>