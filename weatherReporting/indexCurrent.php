<!-- Styles -->
<style>
#schartdiv {
  width: 400px;
  height: 300px;
}

.chart {
  width: 400px;
  height: 300px;
}


</style>

<!-- Resources -->
    <script src="../amcharts4/core.js"></script>
    <script src="../amcharts4/charts.js"></script>
    <script src="../amcharts4/themes/animated.js"></script>
    <script src="../amcharts4/themes/kelly.js"></script>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end



// create chart
var chart = am4core.create("chartdivTem", am4charts.GaugeChart);
chart.innerRadius = am4core.percent(82);

chart.dataSource.url = "myDataCurrent.php?a=current";
chart.dataSource.parser = new am4core.JSONParser();


/**
 * Normal axis
 */

var axis = chart.xAxes.push(new am4charts.ValueAxis());
axis.min = 0;
axis.max = 100;
axis.strictMinMax = true;
axis.renderer.radius = am4core.percent(80);
axis.renderer.inside = true;
axis.renderer.line.strokeOpacity = 1;
axis.renderer.ticks.template.disabled = false
axis.renderer.ticks.template.strokeOpacity = 1;
axis.renderer.ticks.template.length = 10;
axis.renderer.grid.template.disabled = true;
axis.renderer.labels.template.radius = 40;
axis.renderer.labels.template.fontSize = 10;
axis.renderer.labels.template.adapter.add("text", function(text) {
  return text + "°C";
})

/**
 * Axis for ranges
 */

var colorSet = new am4core.ColorSet();

var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
axis2.min = 0;
axis2.max = 100;

axis2.strictMinMax = true;
axis2.renderer.labels.template.disabled = true;
axis2.renderer.ticks.template.disabled = true;
axis2.renderer.grid.template.disabled = true;

var range0 = axis2.axisRanges.create();
range0.value = 0;
range0.endValue = 50;
range0.axisFill.fillOpacity = 1;
range0.axisFill.fill = colorSet.getIndex(0);

var range1 = axis2.axisRanges.create();
range1.value = 50;
range1.endValue = 100;
range1.axisFill.fillOpacity = 1;
range1.axisFill.fill = colorSet.getIndex(2);

/**
 * Label
 */

var label = chart.radarContainer.createChild(am4core.Label);
label.isMeasured = false;
label.fontSize = 15;
label.x = am4core.percent(50);
label.y = am4core.percent(100);
label.horizontalCenter = "middle";
label.verticalCenter = "bottom";
label.text = "Temperatura";



/**
 * Hand
 */

var hand = chart.hands.push(new am4charts.ClockHand());
hand.axis = axis2;
hand.innerRadius = am4core.percent(20);
hand.startWidth = 10;
hand.pin.disabled = true;
hand.value = 50;

hand.events.on("propertychanged", function(ev) {
  range0.endValue = ev.target.value;
  range1.value = ev.target.value;
  label.text = "Temperatura: "+axis2.positionToValue(hand.currentPosition).toFixed(1)+" °C";
  axis2.invalidate();
});

// Center after render
chart.dataSource.events.on("done", function(ev) {

  var value = Math.round(ev.data[0].temperatura);
  hand.value = value;
  var animation = new am4core.Animation(hand, {
    property: "value",
    to: value
  }, 1000, am4core.ease.cubicOut).start();



  var value = Math.round(ev.data[0].humedad);
  handHum.value = value;
  var animation = new am4core.Animation(handHum, {
    property: "value",
    to: value
  }, 1000, am4core.ease.cubicOut).start();


  var value = Math.round(ev.data[0].vel_viento);
  handVel.value = value;
  var animation = new am4core.Animation(handVel, {
    property: "value",
    to: value
  }, 1000, am4core.ease.cubicOut).start();


  var value = Math.round(ev.data[0].presion);
  handPre.value = value;
  var animation = new am4core.Animation(handPre, {
    property: "value",
    to: value
  }, 1000, am4core.ease.cubicOut).start();
});




//Humedad
// create chart
var chartHum = am4core.create("chartdivHum", am4charts.GaugeChart);
chartHum.innerRadius = am4core.percent(82);



/**
 * Normal axis
 */

var axisHum = chartHum.xAxes.push(new am4charts.ValueAxis());
axisHum.min = 0;
axisHum.max = 100;
axisHum.strictMinMax = true;
axisHum.renderer.radius = am4core.percent(80);
axisHum.renderer.inside = true;
axisHum.renderer.line.strokeOpacity = 1;
axisHum.renderer.ticks.template.disabled = false
axisHum.renderer.ticks.template.strokeOpacity = 1;
axisHum.renderer.ticks.template.length = 10;
axisHum.renderer.grid.template.disabled = true;
axisHum.renderer.labels.template.radius = 40;
axisHum.renderer.labels.template.fontSize = 10;
axisHum.renderer.labels.template.adapter.add("text", function(text) {
  return text + "%";
})

/**
 * Axis for ranges
 */

var colorSet = new am4core.ColorSet();

var axis2Hum = chartHum.xAxes.push(new am4charts.ValueAxis());
axis2Hum.min = 0;
axis2Hum.max = 100;

axis2Hum.strictMinMax = true;
axis2Hum.renderer.labels.template.disabled = true;
axis2Hum.renderer.ticks.template.disabled = true;
axis2Hum.renderer.grid.template.disabled = true;

var range0Hum = axis2Hum.axisRanges.create();
range0Hum.value = 0;
range0Hum.endValue = 50;
range0Hum.axisFill.fillOpacity = 1;
range0Hum.axisFill.fill = colorSet.getIndex(0);

var range1Hum = axis2Hum.axisRanges.create();
range1Hum.value = 50;
range1Hum.endValue = 100;
range1Hum.axisFill.fillOpacity = 1;
range1Hum.axisFill.fill = colorSet.getIndex(2);

/**
 * Label
 */

var labelHum = chartHum.radarContainer.createChild(am4core.Label);
labelHum.isMeasured = false;
labelHum.fontSize = 15;
labelHum.x = am4core.percent(50);
labelHum.y = am4core.percent(100);
labelHum.horizontalCenter = "middle";
labelHum.verticalCenter = "bottom";
labelHum.text = "Humedad";



/**
 * Hand
 */

var handHum = chartHum.hands.push(new am4charts.ClockHand());
handHum.axis = axis2Hum;
handHum.innerRadius = am4core.percent(20);
handHum.startWidth = 10;
handHum.pin.disabled = true;
handHum.value = 50;

handHum.events.on("propertychanged", function(ev) {
  range0Hum.endValue = ev.target.value;
  range1Hum.value = ev.target.value;
  labelHum.text = "Humedad: "+axis2Hum.positionToValue(handHum.currentPosition).toFixed(1)+" %";
  axis2Hum.invalidate();
});


//Fin Humedad




//Velocidad
// create chart
var chartVel = am4core.create("chartdivVel", am4charts.GaugeChart);
chartVel.innerRadius = am4core.percent(82);


/**
 * Normal axis
 */

var axisVel = chartVel.xAxes.push(new am4charts.ValueAxis());
axisVel.min = 0;
axisVel.max = 25;
axisVel.strictMinMax = true;
axisVel.renderer.radius = am4core.percent(80);
axisVel.renderer.inside = true;
axisVel.renderer.line.strokeOpacity = 1;
axisVel.renderer.ticks.template.disabled = false
axisVel.renderer.ticks.template.strokeOpacity = 1;
axisVel.renderer.ticks.template.length = 10;
axisVel.renderer.grid.template.disabled = true;
axisVel.renderer.labels.template.radius = 40;
axisVel.renderer.labels.template.fontSize = 10;
axisVel.renderer.labels.template.adapter.add("text", function(text) {
  return text + "";
})

/**
 * Axis for ranges
 */

var colorSet = new am4core.ColorSet();

var axis2Vel = chartVel.xAxes.push(new am4charts.ValueAxis());
axis2Vel.min = 0;
axis2Vel.max = 25;

axis2Vel.strictMinMax = true;
axis2Vel.renderer.labels.template.disabled = true;
axis2Vel.renderer.ticks.template.disabled = true;
axis2Vel.renderer.grid.template.disabled = true;

var range0Vel = axis2Vel.axisRanges.create();
range0Vel.value = 0;
range0Vel.endValue = 25;
range0Vel.axisFill.fillOpacity = 1;
range0Vel.axisFill.fill = colorSet.getIndex(0);

var range1Vel = axis2Vel.axisRanges.create();
range1Vel.value = 25;
range1Vel.endValue = 50;
range1Vel.axisFill.fillOpacity = 1;
range1Vel.axisFill.fill = colorSet.getIndex(2);

/**
 * Label
 */

var labelVel = chartVel.radarContainer.createChild(am4core.Label);
labelVel.isMeasured = false;
labelVel.fontSize = 15;
labelVel.x = am4core.percent(50);
labelVel.y = am4core.percent(100);
labelVel.horizontalCenter = "middle";
labelVel.verticalCenter = "bottom";
labelVel.text = "Velocidad del viento";



/**
 * Hand
 */

var handVel = chartVel.hands.push(new am4charts.ClockHand());
handVel.axis = axis2Vel;
handVel.innerRadius = am4core.percent(20);
handVel.startWidth = 10;
handVel.pin.disabled = true;
handVel.value = 50;

handVel.events.on("propertychanged", function(ev) {
  range0Vel.endValue = ev.target.value;
  range1Vel.value = ev.target.value;
  labelVel.text = "Velocidad: "+axis2Vel.positionToValue(handVel.currentPosition).toFixed(1)+" km/h";
  axis2Vel.invalidate();
});


//Fin Presion


//Velocidad
// create chart
var chartPre = am4core.create("chartdivPre", am4charts.GaugeChart);
chartPre.innerRadius = am4core.percent(82);


/**
 * Normal axis
 */

var axisPre = chartPre.xAxes.push(new am4charts.ValueAxis());
axisPre.min = 0;
axisPre.max = 25;
axisPre.strictMinMax = true;
axisPre.renderer.radius = am4core.percent(80);
axisPre.renderer.inside = true;
axisPre.renderer.line.strokeOpacity = 1;
axisPre.renderer.ticks.template.disabled = false
axisPre.renderer.ticks.template.strokeOpacity = 1;
axisPre.renderer.ticks.template.length = 10;
axisPre.renderer.grid.template.disabled = true;
axisPre.renderer.labels.template.radius = 40;
axisPre.renderer.labels.template.fontSize = 10;
axisPre.renderer.labels.template.adapter.add("text", function(text) {
  return text + "";
})

/**
 * Axis for ranges
 */

var colorSet = new am4core.ColorSet();

var axis2Pre = chartPre.xAxes.push(new am4charts.ValueAxis());
axis2Pre.min = 0;
axis2Pre.max = 25;

axis2Pre.strictMinMax = true;
axis2Pre.renderer.labels.template.disabled = true;
axis2Pre.renderer.ticks.template.disabled = true;
axis2Pre.renderer.grid.template.disabled = true;

var range0Pre = axis2Pre.axisRanges.create();
range0Pre.value = 0;
range0Pre.endValue = 25;
range0Pre.axisFill.fillOpacity = 1;
range0Pre.axisFill.fill = colorSet.getIndex(0);

var range1Pre = axis2Pre.axisRanges.create();
range1Pre.value = 25;
range1Pre.endValue = 50;
range1Pre.axisFill.fillOpacity = 1;
range1Pre.axisFill.fill = colorSet.getIndex(2);

/**
 * Label
 */

var labelPre = chartPre.radarContainer.createChild(am4core.Label);
labelPre.isMeasured = false;
labelPre.fontSize = 15;
labelPre.x = am4core.percent(50);
labelPre.y = am4core.percent(100);
labelPre.horizontalCenter = "middle";
labelPre.verticalCenter = "bottom";
labelPre.text = "Preocidad del viento";



/**
 * Hand
 */

var handPre = chartPre.hands.push(new am4charts.ClockHand());
handPre.axis = axis2Pre;
handPre.innerRadius = am4core.percent(20);
handPre.startWidth = 10;
handPre.pin.disabled = true;
handPre.value = 50;

handPre.events.on("propertychanged", function(ev) {
  range0Pre.endValue = ev.target.value;
  range1Pre.value = ev.target.value;
  labelPre.text = "Presión: "+axis2Pre.positionToValue(handPre.currentPosition).toFixed(1)+" ";
  axis2Pre.invalidate();
});


//Fin Presion




setInterval(function() {
 chart.dataSource.load();

 
}, 10000);

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdivTem" class="chart"></div>
<div id="chartdivHum" class="chart"></div>
<div id="chartdivVel" class="chart"></div>
<div id="chartdivPre" class="chart"></div>
