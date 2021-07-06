var jsonparse = JSON.parse(json_eval);
var json_eval_keys = Object.keys(jsonparse);
var json_eval_values = Object.values(jsonparse);
var eval_length = json_eval_keys.length;


var backgroundColor = 'white';
Chart.plugins.register({
    beforeDraw: function(c) {
        var ctx = c.chart.ctx;
        ctx.fillStyle = backgroundColor;
        ctx.fillRect(0, 0, c.chart.width, c.chart.height);
    }
});

var randcomcolor = getRandomColor(eval_length);
Chart.defaults.global.animation.duration = 1000;
var lineChartData = {
  labels: json_eval_keys,
  datasets: [
    {
      backgroundColor: randcomcolor,
      data: json_eval_values
    }
  ]  
}

var options = {
  bezierCurve : false,
  title: {
    display: true,
    text: 'Evaluation'
  },
  legend: {
            display: true,
            position: 'top',
            labels: {
                generateLabels: function(chart) {
                    var data = chart.data;
                    if (data.labels.length && data.datasets.length) {
                        return data.labels.map(function(label, i) {
                            var meta = chart.getDatasetMeta(0);
                            var ds = data.datasets[0];
                            var arc = meta.data[i];
                            var custom = arc && arc.custom || {};
                            var getValueAtIndexOrDefault = Chart.helpers.getValueAtIndexOrDefault;
                            var arcOpts = chart.options.elements.arc;
                            var fill = custom.backgroundColor ? custom.backgroundColor : getValueAtIndexOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);
                            var stroke = custom.borderColor ? custom.borderColor : getValueAtIndexOrDefault(ds.borderColor, i, arcOpts.borderColor);
                            var bw = custom.borderWidth ? custom.borderWidth : getValueAtIndexOrDefault(ds.borderWidth, i, arcOpts.borderWidth);

              // We get the value of the current label
              var value = chart.config.data.datasets[arc._datasetIndex].data[arc._index];

                            return {
                                // Instead of `text: label,`
                                // We add the value to the string
                                text: label + " : " + value,
                                fillStyle: fill,
                                strokeStyle: stroke,
                                lineWidth: bw,
                                hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                index: i
                            };
                        });
                    } else {
                        return [];
                    }
                }
            }
        },
  animation: {
    onComplete: done
  }
};


function done(){
  var url=myPieChart.toBase64Image();
  var table_datas = $("#table_datas").html();

  $("input[name='chart_datas']").val(url);
  $("input[name='table_datas']").val(table_datas);

  $("#submit_export").removeClass("hidden");

  // document.getElementById("url").src=url;
  // console.log("done");
  // console.log(url);
  // var candata = document.getElementById("pieChart").toDataURL("image/png");
  // console.log(candata);
  // $("#export_graph").click(function(){
    
  //   $.ajax({
  //     type : "post",
  //     url : base_url+"admin/get_graph_image",
  //     data : {
  //       chart_datas :url,
  //       table_datas:table_datas,
  //     },
  //     dataType : "json",
  //     success : function(res){
  //       console.log("Success");
  //       console.log(res);
  //     }
  //     ,
  //     error:function(res){
  //       console.log("Error");
  //         console.log(res);
  //     }
  //   });
  // });
}

var canvas = document.getElementById("pieChart");
var ctx = canvas.getContext("2d");
var midX = canvas.width/2;
var midY = canvas.height/2


var myPieChart = new Chart(document.getElementById("pieChart").getContext("2d"), {
    type: 'doughnut',
    showTooltips: false,
    data: lineChartData,
    options: options,
    // onAnimationProgress: drawSegmentValues
});

// Create a pie chart
// var myPieChart = new Chart(ctx).Pie(
//   lineChartData,
//   options, {
//     showTooltips: false,
//     onAnimationProgress: drawSegmentValues
// });


var radius = myPieChart.outerRadius;
function drawSegmentValues()
{
    for(var i=0; i<myPieChart.segments.length; i++) 
    {
        ctx.fillStyle="white";
        var textSize = canvas.width/10;
        ctx.font= textSize+"px Verdana";
        // Get needed variables
        var value = myPieChart.segments[i].value;
        var startAngle = myPieChart.segments[i].startAngle;
        var endAngle = myPieChart.segments[i].endAngle;
        var middleAngle = startAngle + ((endAngle - startAngle)/2);

        // Compute text location
        var posX = (radius/2) * Math.cos(middleAngle) + midX;
        var posY = (radius/2) * Math.sin(middleAngle) + midY;

        // Text offside by middle
        var w_offset = ctx.measureText(value).width/2;
        var h_offset = textSize/4;

        ctx.fillText(value, posX - w_offset, posY + h_offset);
    }
}


function getRandomColor(numcolors) {
  var letters = '0123456789ABCDEF';
  var color = '#';
  var array_color = [];
  for (var i2 = 0; i2 < numcolors; i2++) {
  var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    array_color.push(color);
  }
  return array_color;
}





    


