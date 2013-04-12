google.load('visualization', '1', {packages:['table']});
google.load("visualization", "1", {packages:["corechart"]});

function drawTable(id) {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Accumulated Yearly Contributions (RM)');
    data.addColumn('number', 'Accumulated Yearly Income Earned (Yearly Compounded) (RM)');
    data.addColumn('number', 'Total Investment Value (RM)');
    data.addColumn('number', 'Year');
    data.addColumn('number', 'Accumulated Monthly Contributions (RM)');
    data.addColumn('number', 'Accumulated Yearly Income Earned (Monthly Compounded) (RM)');
    data.addColumn('number', 'Total Investment Value (RM)');
    data.addRows(push_table);
    var options = {
        showRowNumber: false
    }
    var table = new google.visualization.Table(document.getElementById(id));
    table.draw(data, options);
}

function drawTableGeneral(id) {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Year');
    data.addColumn('number', 'Accumulated Yearly Contributions (RM)');
    data.addColumn('number', 'Accumulated Yearly Income Earned (Yearly Compounded)(RM)');
    data.addColumn('number', 'Total Investment Value (RM)');
    data.addRows(push_table);
    var options = {
        showRowNumber: false
    }
    var table = new google.visualization.Table(document.getElementById(id));
    table.draw(data, options);
}

function drawChart(ctitle,haxis,vaxis,chart_array, id) {
    var data = google.visualization.arrayToDataTable(chart_array);
    console.log(data);
    
    var options = {
        isStacked: true,
        title: ctitle,
        titleTextStyle: {fontSize: 14},
        hAxis: {title: haxis, titleTextStyle:{fontSize: 11}},
        vAxis: {title: vaxis, titleTextStyle:{fontSize: 11}},
        isHtml: true,
        legend:{position: 'bottom', textStyle: {fontSize: 11, fontWeight: 'normal'}},
        tooltip:{showColorCode: true,textStyle: {fontSize: 9}},
        width:'100%', height:'300',
        colors:['#c4c4c4','#ed1b24'],
        backgroundColor: { fill:'transparent' }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById(id));
    chart.draw(data, options);
}

function drawPieChart(ctitle,chart_array, id) {
        var data = google.visualization.arrayToDataTable(chart_array);
        var options = {
          title: ctitle,
          colors:['#0d5f95','#ed1b24','#ffcb05'],
          backgroundColor: { fill:'transparent' }
        };
        var chart = new google.visualization.PieChart(document.getElementById(id));
        chart.draw(data, options);
}


function parsed(thatval) {
    return parseFloat(thatval).toFixed(2);
}

function comma(n,sep) {
    n = n.toFixed(2);
    var sRegExp = new RegExp('(-?[0-9]+)([0-9]{3})'),
    sValue=n+'';     
    if (sep === undefined) {sep=',';}
    while(sRegExp.test(sValue)) {
        sValue = sValue.replace(sRegExp, '$1'+sep+'$2');
    }
    return sValue;
}