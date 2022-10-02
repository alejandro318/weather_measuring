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

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Set up data source
chart.dataSource.url = "myData.php";

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "date";

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "value1";
series1.dataFields.categoryX = "date";
series1.name = "Temp";
series1.strokeWidth = 3;
series1.tensionX = 0.7;
series1.bullets.push(new am4charts.CircleBullet());

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "value2";
series2.dataFields.categoryX = "date";
series2.name = "Presion";
series2.strokeWidth = 3;
series2.tensionX = 0.7;
series2.bullets.push(new am4charts.CircleBullet());

var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "value3";
series3.dataFields.categoryX = "date";
series3.name = "Humedad";
series3.strokeWidth = 3;
series3.tensionX = 0.7;
series3.bullets.push(new am4charts.CircleBullet());

// Add legend
chart.legend = new am4charts.Legend();
