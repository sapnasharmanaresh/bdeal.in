function fade(id) {
    $(id).fadeIn(2000).hide();
}
fade("#msg");

function setLogo(form){
    value = form.logo;
    alert(value);
    $.post('header/set_logo',{
        'logo':value
    },function(data){
        alert(data);
    });
    event.preventDefault();
}


/* 
 * This function confirms the status of the selected option by the admin
 */
function status(id, value) {
    $.get('process?id=' + id, function(data) {
        var dialog = confirm('Kindly Confirm Your Selection=>\nRequest id   : ' + ('ore_' + (id)) + '\nStatus:' + value);
        if (dialog == true) {
            $.when($.post('status', {
                'id': id,
                'status': value
            }
            )).then(function() {
                location.reload();
            })
        }
    }
    );
}

/*
 * Assigns credentials to the new owner
 */
function assign(id) {
    $.when($.post('owner_new', {
        'role': 'owner',
        'id': id
    }, function(data) {
      //  alert(data);
    })
            ).then(function() {
        alert("Succesfully assigned");
        location.reload();
    })
}

/*
 * Dynamically load submenu's in select box as menu selected
 */
function selectSubmenu(menu)
{
    $.post('manageWelcomeSubmenu/' + menu, function(data) {
        $('#submenu').html(data);
    })

}
/*
 * 
 
function edit(id) {
        event.preventDefault();
    value = $("p#" + id).text();
   
    $("p#" + id).wrap("<input type='text' id='" + id + "' value='" + value + "'>");
    $("p#" + id).detach();
    $("input#" + id).after("<button id='btn" + id + "'>ok</button>");
    var ok = "button#" + id;
    alert(ok);
    $('#btn'+id).click(function() {
        value = $('#' + id).val();
         alert(value);
        var c = confirm("Are you sure?");
        if (c == true) {
            $.post('editSubmenu', {'id': id, 'value': value}, function(data) {
                $('#submenu input').detach();
                $('#submenu button').detach();
                $('#submenu p:eq(' + id + ')').prepend("<div id='res'></div>");
                $('#submenu p:eq(' + id + ') div').html(data);
            })
        }
    });
    

}
/*
 * 
 */
function listAll(event) {
    $.post('listAll', function(data) {
        $('#result').html(data);
    })
    event.preventDefault();
}
/*
 * 
 */
function addMenu(event) {
    $.when($.post('addMenu', function(data) {
        $('#result').html(data);
    })).then(function() {
        $.post('navList', function(data) {
            $('select#position').html(data);
        })
    }).then(function() {
        $('body').find('select#position').attr('disabled', 'disabled');
        $('body').find('input.pos').attr('disabled', 'disabled');
        $('body').find('input#text').change(function() {
            var menu = $(this).val();
            if (menu.length > 0) {
                $('body').find('input.pos').removeAttr('disabled');
                $('.pos').change(function() {
                    var selectedVal = "";
                    var selected = $("input[name='position']:checked");
                    if (selected.length > 0)
                        selectedVal = selected.val();
                    if (selectedVal == 'after') {
                        $('select#position').removeAttr('disabled');
                        $('select#position').change(function() {
                            selectedAfter = $('select#position :selected').text();
                            $.post('positionNav', {'menu': menu,
                                'position': selectedAfter});
                        })
                    }
                    else {
                        $.post('positionNav', {'menu': menu,
                            'position': selectedVal});
                    }
                })
            }
            else
            {
                alert('Kindly specify menu name');
            }
        })
    })
    event.preventDefault();
}
/*
 * 
 */
function deleteMenu(event) {
    $.post('')
    event.preventDefault();
}
/*
 * 
 */
function notification() {
    $.post('notification', function(data) {
    })
}
/*
 * 
 */
function search(value) {
    $.post('../search/employee', {
        'value': value
    }, function(data) {
        $('#result').html('Related Searches:<br/>' + data);
    })
}
/*
* 
 */
function account_status(id, value) {
    $.get('process?id=' + id, function(data) {
        var dialog = confirm('Kindly Confirm Your Selection=>' + value);
        if (dialog == true) {
            $.when($.post('account_status', {
                'id': id,
                'status': value
            }
            )).then(function() {
                location.reload();
            })
        }
    })
}
/*
 * 
 */
function mail_type(id, value) {
    $.get('process?id=' + id, function(data) {
        var dialog = confirm('Kindly Confirm Your Selection=>' + value);
        if (dialog == true) {
            $.when($.post('mail_type', {
                'id': id,
                'status': value
            }
            )).then(function() {
                location.reload();
            })
        }
    })
}
/*
 * 
 */
function mail_selection(value) {
    if (value == "--select--") {
        $("#employee").hide();
        $("#customer").hide();
    }
    else if (value == "Employee") {
        $("#employee").show();
        $("#customer").hide();
    }
}
//alert(1);
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

$('userGraph').click(function(){
    gra();
})

function gra(){
    alert("gra");
}

function changePhoto(){
    $('#updatePhoto').show();
}
function showPasswordPanel(){
    $('#passwordPanel').show();
}