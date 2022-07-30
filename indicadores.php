<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Indicadores</title>
        <link rel="icon" href="css/brazil-flag.ico">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.2.0/highcharts.js"></script>
        
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <?php
       include('Componentes/Menu.php');
       include('Vista/indicadoresResultado.php');
       ?>
       <div class="center">
            <div id="Contiene-Grafico" class="Seccion Contiene-Grafico" style="width:100%; height:400px;">
                
               
            </div>
       </div>
    </body>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('Contiene-Grafico', {
            chart: {
                type: 'column'
            },
            credits:false,
            title: {
                text: 'Indicador grafico de desempeño en base a metas'
            },

            xAxis: {
                categories: [<?php echo $sListaEmpresa; ?>]
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Numero de Reclutas'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>';
                }
            },

            plotOptions: {
                column: {
                    grouping: false,
                    shadow: false,
                    borderWidth: 0
                }
            },

            series: [{
                name: 'Meta',
                color: 'rgba(165,170,217,1)',
                data: [<?php echo $sListaMetas; ?>],
                pointPadding: 0.25,
                pointPlacement: 0
            }, {
                name: 'Reclutas',
                data: [<?php echo $sListaReclutas; ?>],
                color: 'rgba(126,86,134,.9)',
                pointPadding: 0.3,
                pointPlacement: 0
            }]
        });
    });
    </script>
    
    
</html>