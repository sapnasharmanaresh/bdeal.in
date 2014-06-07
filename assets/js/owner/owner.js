
function category() {

    category = $('#cat').val();
    $.post('selectSubcat', {
        'category': category
    }, function(data) {
        $('#subcategory').html(data);
    });
}

function deleteMenu($pos) {

    var con = confirm('Are you sure? ');
    if (con == true) {
        $.post('deleteMenu', {
            'menu_pos': $pos
        }, function(data) {

        })
    }
}

function submenus($pos) {
    $.post('submenus', {
        'menu_pos': $pos
    }, function(data) {

    })
}

function addSubmenu($pos) {
    $.post('addSubmenu', {
        'menu_pos': $pos
    }, function(data) {

    })
}


function graph(myData,title,vAxis,hAxis,divID){
//myD = JSON.stringify(myData);
//alert(myData);
//alert(title);

///myD = JSON.parse(myData);
//alert(myData.replace(/"/g,' '));
console.log(divID);
     google.load("visualization", "1", {packages:["corechart"],callback:drawChart});
  //  google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
      data.addColumn('number','a');
     data.addColumn('number','b');
          data.addRows([
                        
	   ]);

        var options = {
          title: title,
		  vAxis: {title:vAxis},
		  hAxis: {title:hAxis}
        };

        var chart = new google.visualization.ComboChart(document.getElementById(divID));
        chart.draw(data, options);
      }
}

function trackRequest(){
    $('#track').slideToggle("slow");

}