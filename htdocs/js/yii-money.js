//
//
//jQuery(function($){
//
//    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=range.json&callback=?', function(data) {
//    
//    	window.chart = new Highcharts.Chart({
//    	
//		    chart: {
//		        renderTo: 'cashflow-chart',
//		        type: 'arearange'
//		    },
//		    
//		    title: {
//		        text: 'Cashflow for the next 30 days'
//		    },
//		
//		    xAxis: {
//		        type: 'datetime'
//		    },
//		    
//		    yAxis: {
//		        title: {
//		            text: null
//		        }
//		    },
//		
//		    tooltip: {
//		        crosshairs: true,
//		        shared: true,
//		        valueSuffix: '°C'
//		    },
//		    
//		    legend: {
//		        enabled: false
//		    },
//		
//		    series: [{
//		        name: 'Temperatures',
//		        data: data
//		    }]
//		
//		});
//    });
//
//});