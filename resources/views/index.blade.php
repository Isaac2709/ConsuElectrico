@extends('layouts.layout')

@section('title_page')
	Pagina Principal
@endsection

@section('title_container')
	Consumo de Energia
@endsection

@section('container')
	<div id="chartContainer" style="height: 300px; width:100%;"></div>
@endsection

@section('js_functions')
	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$.getJSON( "/getData/"+"A")
		// 	    .done(function( data, textStatus, jqXHR ) {
		// 	        if ( console && console.log ) {
		// 	            console.log( "La solicitud se ha completado correctamente." );
		// 	        }
		// 	    })
		// 	    .fail(function( jqXHR, textStatus, errorThrown ) {
		// 	        if ( console && console.log ) {
		// 	            console.log( "Algo ha fallado: " +  textStatus );
		// 	        }
		// 	});
		// });
	</script>
	<script type="text/javascript">

		function sleep(milliseconds) {
		  var start = new Date().getTime();
		  for (var i = 0; i < 1e7; i++) {
		    if ((new Date().getTime() - start) > milliseconds){
		      break;
		    }
		  }
		}
	</script>

	<script type="text/javascript">
		window.onload = function () {

		// dataPoints
		var dataPoints1 = [];

		var chart = new CanvasJS.Chart("chartContainer",{
			zoomEnabled: true,
			title: {
				text: "Consumo Electrico"
			},
			toolTip: {
				shared: true

			},
			legend: {
				verticalAlign: "top",
				horizontalAlign: "center",
                                fontSize: 14,
				fontWeight: "bold",
				fontFamily: "calibri",
				fontColor: "dimGrey"
			},
			axisX: {
				title: "Datos"
			},
			axisY:{
				prefix: '$',
				includeZero: false
			},
			data: [{
				// dataSeries1
				type: "line",
				xValueType: "dateTime",
				showInLegend: true,
				name: "Watts",
				dataPoints: dataPoints1
			}],
          legend:{
            cursor:"pointer",
            itemclick : function(e) {
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
              }
              else {
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
		});

		var updateInterval = 5000;
		// initial value
		var yValue1 = 20;

		var time = new Date;
		var dataLength = 10;
		// starting at 9.30 am

		var updateChart = function (count, myjson) {
			count = count || 1;
			myjson = myjson || [];
			//sleep(5000);
			// count is number of times loop runs to generate random dataPoints.
			var mySQLDate;
			var newDate;
			for (var i = 0; i < count; i++) {

				// add interval duration to time
				// time.setTime(time.getTime()+ updateInterval);

				// adding random value and rounding it to two digits.
				if(count == 1){
					var json = $.getJSON( "/getData/"+"A")
					    .done(function( data, textStatus, jqXHR ) {
					        if ( console && console.log ) {
					            console.log( "La solicitud se ha completado correctamente.");
					        }
					        myjson = data;
					        var length = data['length'];
					        yValue1 = data[0][length-1]['Reg_Vaue'];
					        mySQLDate = data[0][length-1]['Reg_Date'];
					        newDate =  new Date(Date.parse(mySQLDate.replace('-','/','g')));
					        var watts =  dataPoints1[dataPoints1.length - 1]['y'];
					        var date =  dataPoints1[dataPoints1.length - 1]['x'];
					        if(watts != yValue1 && date != newDate.getTime()){
						        dataPoints1.push({
									x: newDate.getTime(),
									y: Math.round(yValue1 * 100 ) / 100
								});
						    }
					    })
					    .fail(function( jqXHR, textStatus, errorThrown ) {
					        if ( console && console.log ) {
					            console.log( "Algo ha fallado: " +  textStatus );
					        }
					});
				}
				else{
					yValue1 = myjson[0][i]['Reg_Vaue'];
					mySQLDate = myjson[0][i]['Reg_Date'];
					newDate=  new Date(Date.parse(mySQLDate.replace('-','/','g')));

					dataPoints1.push({
						x: newDate.getTime(),
						y: Math.round(yValue1 * 100 ) / 100
					});
				}
			};

			// updating legend text with  updated with y Value
			chart.options.data[0].legendText = " Medición " + yValue1;

			if (dataPoints1.length > dataLength)
			{
				dataPoints1.shift();
			}

			chart.render();
		};

		var myjson = [];
		$.getJSON( "/getData/"+"A")
		    .done(function( data, textStatus, jqXHR ) {
		        if ( console && console.log ) {
		            console.log( "La solicitud se ha completado correctamente.");
		        }
		        myjson = data;
		        updateChart(myjson.length, myjson);
		    })
		    .fail(function( jqXHR, textStatus, errorThrown ) {
		        if ( console && console.log ) {
		            console.log( "Algo ha fallado: " +  textStatus );
		        }
		});
		// generates first set of dataPoints
		// updateChart(myjson.length, myjson);

		// update chart after specified interval
		setInterval(function(){updateChart()}, updateInterval);
	}
	</script>
	<script type="text/javascript" src="canvasjs.min.js"></script>
@endsection