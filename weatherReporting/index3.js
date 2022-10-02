/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 *
 * For more information visit:
 * https://www.amcharts.com/
 *
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */
 am4core.useTheme(am4themes_animated);

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.paddingRight=20;
// Set up data source
chart.dataSource.url = "myData3.php";
chart.bottomAxesContainer.layout = "horizontal";

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";

// Create value axis	
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "°C | % Humedad";
//valueAxis.min = 0;


// Create value axis	
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Presion";
valueAxis.max = 900;

// Create series


var series1 = chart.series.push(new am4charts.LineSeries());
series1.id = "s1";
series1.dataFields.valueY = "temperatura";
series1.dataFields.categoryX = "year";
series1.name = "Temperatura";
series1.strokeWidth = 1;
series1.tensionX = 0.7;
series1.tooltipText= "Temp";
//series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.id = "s2";
series2.dataFields.valueY = "presion";
series2.dataFields.categoryX = "year";
series2.name = "Presión Atm";
series2.strokeWidth = 1;
series2.tensionX = 0.7;
series2.tooltipText= "Pres";
//series2.bullets.push(new am4charts.CircleBullet());

var series3 = chart.series.push(new am4charts.LineSeries());
series3.id = "s3";
series3.dataFields.valueY = "humedad";
series3.dataFields.categoryX = "year";
series3.name = "Humedad";
series3.strokeWidth = 1;
series3.tensionX = 0.7;
series3.tooltipText= "Hum";
//series3.bullets.push(new am4charts.CircleBullet());


var series4 = chart.series.push(new am4charts.LineSeries());
series4.id = "s4";
series4.dataFields.valueY = "vel_viento";
series4.dataFields.categoryX = "year";
series4.name = "Velocidad del viento";
series4.strokeWidth = 1;
series4.tensionX = 0.7;
series4.tooltipText= "Viento";
//series3.bullets.push(new am4charts.CircleBullet());

var scrollbarX = new am4charts.XYChartScrollbar();
scrollbarX.series.push(series1);
scrollbarX.series.push(series2);
scrollbarX.series.push(series3);
scrollbarX.series.push(series4);

chart.scrollbarX = scrollbarX;
chart.cursor = new am4charts.XYCursor();
chart.legend = new am4charts.Legend();





// Create chart instance
var chart2 = am4core.create("chartdiv2", am4charts.XYChart);
chart2.paddingRight=20;
// Set up data source
chart2.dataSource.url = "myData3.php";
chart2.bottomAxesContainer.layout = "horizontal";

// Create axes
var categoryAxis2 = chart2.xAxes.push(new am4charts.CategoryAxis());
categoryAxis2.dataFields.category = "year";

// Create value axis	
var valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());
valueAxis2.title.text = "Voltaje";
//valueAxis2.min = 0;


// Create value axis	
var valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());
valueAxis2.title.text = "Voltaje";
valueAxis2.max = 900;

// Create series

var series4 = chart2.series.push(new am4charts.LineSeries());
series4.id = "s4";
series4.dataFields.valueY = "vol";
series4.dataFields.categoryX = "year";
series4.name = "Voltaje celdas solares";
series4.strokeWidth = 1;
series4.tensionX = 0.7;
series4.tooltipText= "Volt";
//series2.bullets.push(new am4charts.CircleBullet());

var scrollbarX2 = new am4charts.XYChartScrollbar();
scrollbarX2.series.push(series4);
chart2.scrollbarX = scrollbarX2;
chart2.cursor = new am4charts.XYCursor();
chart2.legend = new am4charts.Legend();


