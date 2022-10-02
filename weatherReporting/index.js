// Set theme
am4core.useTheme(am4themes_animated);

// Generate random data
var data = [];
var visits = 10;
var visits2 = 10;

for (var i = 1; i < 366; i++) {

  visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
  visits2 += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
  data.push({
    date: new Date(2018, 0, i),
    name: "name" + i,
    value: visits,
    value: visits2   
  });
}

// Create chart
var chart = am4core.createFromConfig({
  // Set settings and data
  "paddingRight": 20,
  "data": data,

  // Create X axes
  "xAxes": [{
    "type": "DateAxis",
    "renderer": {
      "grid": {
        "location": 0
      }
    }
  }],

  // Create Y axes
  "yAxes": [{
    "type": "ValueAxis",
    "tooltip": {
      "disabled": true
    },
    "renderer": {
      "minWidth": 35
    }
  }],

  // Create series
  "series": [{
    "id": "s1",
    "type": "LineSeries",
    "dataFields": {
      "dateX": "date",
      "valueY": "value"
    },
    "tooltipText": "{valueY.value}"
  },
  {
    "id": "s2",
    "type": "LineSeries",
    "dataFields": {
      "dateX": "date",
      "valueY": "value2"
    },
    "tooltipText": "{valueY.value}"
  }],

  // Add cursor
  "cursor": {
    "type": "XYCursor"
  },

  // Add horizontal scrollbar
  "scrollbarX": {
    "type": "XYChartScrollbar",
    "series": ["s1","s2"]
  }
}, "chartdiv", "XYChart");
