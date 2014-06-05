function status(id, value) {
//alert(id);
    alert(value);
    $.get('../ownerRequest/process?id=' + id, function(data) {
// console.log(data);
        var dialog = confirm('Kindly Confirm Your Selection=>\nRequest id   : ' + ('ore_' + (id)) + '\nStatus:' + value);
        //alert(dialog);
        if (dialog == true) {
            $.when($.post('../ownerRequest/replyfromqualitydpt', {
                'id': id,
                'replyfromqualitydpt': value
            })

                    ).then(function() {
                location.reload();
            })
        }

    })

}
function adverStatus(id, value) {
alert(id);
    alert(value);
                var dialog = confirm('Kindly Confirm Your Selection=>\nRequest id   : ' + id + '\nStatus:' + value);
                //alert(dialog);
                if (dialog == true) {
                    $.when($.post('quality_adver_confirmation', {
                        'id': id,
                        'status': value
                    })

                            ).then(function() {
                      location.reload();
                    })
                }

   
}



