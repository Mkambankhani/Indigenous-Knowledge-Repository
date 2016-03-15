function getRandomData(){
        data = [0,0,0,0,0,0,0,0,0,0,0,0];
        for (var i = 0; i < 12; i++){
            data[i] = parseInt(Math.random() * 100);
        }
        return data;
}
function Graph(data){
           $('#line-graph').highcharts({
            title: {
                text: 'Monthly',
                x: -20 //center
            },
            subtitle: {
                text: 'Number of Visits For each Category',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number of Visits'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Cases'
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                borderWidth: 1
            },
            series: data
        });

    }
$(document).ready(function(){
        if($("textarea") != undefined){
            tinymce.init({selector:'textarea'});
        }
});
function drawPieChart(pieData){

            // Make monochrome colors and set them as default for all pies
            Highcharts.getOptions().plotOptions.pie.colors = (function () {
                var colors = ['#000099', '#070d13', '#1a324c', '#346498', '#6797cb', '#b3cbe5', '#ccccff', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4', '#395C9B', '#923532', '#7B972E', '#6A538D', '#3B83A1', '#CB7221', '#F2E200'],
                    base = Highcharts.getOptions().colors[0],
                    i;

                for (i = 0; i < 10; i += 1) {
                    // Start out with a darkened base color (negative brighten), and end
                    // up with a much brighter color
                    colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                }
                return colors;
            }());

            // Build the chart
            $('#piechart').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '<font style="color:#004586;font-size:0.9em;font-weight:bold">Proportion of content</font>',
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %',
                            style: {
                                color:[ (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black']
                            }
                        }
                    }
                },
                series: [{
                    name: "Proportion of content",
                    data: interPieData(pieData)
                }]
            });

}
function interPieData(data) {
  data_str = [] ; total = 0; 
  
  for(var i = 0; i < data.length ; i++) {
    total += parseFloat(data[i]["count"]);
  }

  for(var i = 0; i < data.length ; i++) {
    //data_str.push({name: "Registered",color:'#729fcf',y: parseFloat(ever_registered_percent)});
    data_str.push({name: data[i]['category'], y: (parseFloat(data[i]["count"])/total)*100});
  }
  return data_str;
}
function loadPiechart(){
    var xmlhttp;
    var result;
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
    } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {

                        result = xmlhttp.responseText;
                        result = JSON.parse(result);
                        console.log(result);
                        drawPieChart(result);

                    }
                    else if (xmlhttp.status == 400) {
                        alert('There was an error 400')
                    }
                    else {
                        alert('something else other than 200 was returned')
                    }
                }
            }

    xmlhttp.open("GET", "/admin/piechart", true);
    xmlhttp.send();
}
function loadPanelData(){
    var xmlhttp;
    var result;
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
    } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {

                        result = xmlhttp.responseText;
                        result = JSON.parse(result);
                        console.log(result);
                        $("#visitors").html(result.visitors);
                        $("#users").html(result.users);
                         $("#authors").html(result.authors);
                         $("#editors").html(result.editors);

                    }
                    else if (xmlhttp.status == 400) {
                        alert('There was an error 400')
                    }
                    else {
                        alert('something else other than 200 was returned')
                    }
                }
            }

    xmlhttp.open("GET", "/admin/panel_data", true);
    xmlhttp.send();
}
function loadGraph(){
      var xmlhttp;
    var result;
    if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
    } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {

                        result = xmlhttp.responseText;
                        result = JSON.parse(result);
                        console.log(result);
                        Graph(result);

                    }
                    else if (xmlhttp.status == 400) {
                        alert('There was an error 400')
                    }
                    else {
                        alert('something else other than 200 was returned')
                    }
                }
            }

    xmlhttp.open("GET", "/admin/graph_data", true);
    xmlhttp.send();
}