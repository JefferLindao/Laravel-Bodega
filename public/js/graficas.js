
function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();

    cargar_grafica_barras(anio_sel,mes_sel);
    cargar_grafica_lineas(anio_sel,mes_sel);
    
}

function cargar_grafica_barras(anio,mes){
    var options={
        chart: {
            renderTo: 'div_grafica_barras',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros en el Mes'
        },
        
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
            }
        },
        tooltip: {
            backgroundColor: 'rgba(0, 0, 0, 0.85)',
            style: {
                color: '#F0F0F0'
            },
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            color: '#90ee7e',
            name: 'registros',
            data: []
        }]
    } 

    $("#div_grafica_barras").html();
    var url = "grafica_registros/"+anio+"/"+mes+"";

    $.get(url,function(resul){
    var datos= jQuery.parseJSON(resul);
    var totaldias=datos.totaldias;
    var registrosdia=datos.registrosdia;
    var i=0;
    for(i=1;i<=totaldias;i++){
        options.series[0].data.push( registrosdia[i] );
        options.xAxis.categories.push(i);
    }
    chart = new Highcharts.Chart(options);
    })
}


function cargar_grafica_lineas(anio,mes){

    var options={
        chart: {
            renderTo: 'div_grafica_lineas',
            inverted: true,    
        },
          title: {
            text: 'Numero de ventas en el Mes',
            x: -20 //center
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'REGISTROS POR DIA'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Ventas'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'ventas',
            data: []
        }]
    }

    $("#div_grafica_lineas").html();
    var url = "grafica_venta/"+anio+"/"+mes+"";
    $.get(url,function(resul){
    var datos= jQuery.parseJSON(resul);
    var totaldias=datos.totaldias;
    var registrosdia=datos.registrosdia;
    var i=0;
        for(i=1;i<=totaldias;i++){
            options.series[0].data.push( registrosdia[i] );
            options.xAxis.categories.push(i);
        }
        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);
    })
}

