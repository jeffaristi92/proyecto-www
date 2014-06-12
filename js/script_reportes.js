
google.load('visualization', '1.1', {packages: ['controls']});
google.setOnLoadCallback(consultaDatos);

var arrayJson;

function consultaDatos() {

        var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              
              //alert(xmlhttp.responseText);
              arrayJson = JSON.parse(xmlhttp.responseText);
              drawVisualization();
            }
          }
        
        xmlhttp.open("GET","../Controlador/ControllerReporte.php",true);
        xmlhttp.send();
}

function drawVisualization() {

  var arreglo = new Array();

        for(var i = 0; i < arrayJson.length; i++){
          arreglo[i] = new Array(arrayJson[i][0], arrayJson[i][1], arrayJson[i][2]); 
        }

        var data = google.visualization.arrayToDataTable(arreglo);
      
        // Define a slider control for the Age column.
        var slider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'control1',
          'options': {
            'filterColumnLabel': 'Precio',
            'ui': {'labelStacking': 'vertical'}
          }
        });
      
        // Define a category picker control for the Gender column
        /*var categoryPicker = new google.visualization.ControlWrapper({
          'controlType': 'CategoryFilter',
          'containerId': 'control2',
          'options': {
            'filterColumnLabel': 'Gender',
            'ui': {
            'labelStacking': 'vertical',
              'allowTyping': false,
              'allowMultiple': false
            }
          }
        });*/
      
        // Define a Pie chart
        var pie = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart1',
          'options': {
            'width': 300,
            'height': 300,
            'legend': 'none',
            'title': 'Platos vendidos',
            'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
            'pieSliceText': 'label'
          },
          // Instruct the piechart to use colums 0 (Name) and 3 (Donuts Eaten)
          // from the 'data' DataTable.
          'view': {'columns': [0, 2]}
        });
      
        // Define a table
        var table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'chart2',
          'options': {
            'width': '300px'
          }
        });
      
        new google.visualization.Dashboard(document.getElementById('dashboard')).
            // Establish bindings, declaring the both the slider and the category
            // picker will drive both charts.
            //bind([slider, categoryPicker], [pie, table]).
            //bind([slider], [pie, table]).draw(data);
            bind([slider], [pie, table]).draw(data);
}