function getRandomData(){
        data = [0,0,0,0,0,0,0,0,0,0,0,0];
        for (var i = 0; i < 12; i++){
            data[i] = parseInt(Math.random() * 100);
        }
        return data;
}
function Graph(data1,data2,data3){
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
            series: [{
                name: 'Category 1',
                data: data1
            },{
                name: 'Category 2',
                data: data2,
                color: 'red'
            },{
                name: 'Category 3',
                data: data3,
                color: 'green'
            }]
        });

    }
$(document).ready(function(){
        if($("textarea") != undefined){
            tinymce.init({selector:'textarea'});
        }
});