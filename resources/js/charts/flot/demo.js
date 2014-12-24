$(function(){

  // 
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var d1 = [];
  for (var i = 0; i <= 11; i += 1) {
    d1.push([i, parseInt((Math.floor(Math.random() * (1 + 20 - 10))) + 10)]);
  }

  

// Set up our data array  
// The first part of each element specifies it's position on the x-axis  
// The second part is the value, or height of the bar  
 var my_data = [[0, 3], [1, 6], [2, 5], [3, 2], [4, 8]];  
// // Setup labels for use on the Y-axis  
var tickLabels = [[0, 'Jan'], [1, 'Feb'], [2, 'March'], [3, 'April'], [4, 'May']];  
  var myStringArray = ["Jan","Feb","March","April","May"];

function getTooltip2(label, x, y) {
    return myStringArray[x] + " " + y + " users"; 
}

$.plot($("#flot-color"), [  
{  
    data: my_data,  
    
  }],
   {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.2
                    }]
                }
            },
            points: {
                radius: 5,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            color: "#fff",
            hoverable: true,
            clickable: true,
            tickColor: "#f0f0f0",
            borderWidth: 0
        },
        // 5dcff3
        colors: ["#86206E"],
        xaxis: {
            mode: "categories",
            ticks:tickLabels,
            tickDecimals: 0            
        },
        yaxis: {
            ticks: 5,
            tickDecimals: 0,            
        },
        tooltip: true,
        tooltipOpts: {
          content: getTooltip2,
          defaultTheme: false,
          shifts: {
            x: 0,
            y: 20
          }
        }
      }
  );



});