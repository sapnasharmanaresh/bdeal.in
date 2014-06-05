function updateQuantity(value,p_id){
    alert(value);
    $.post('updateQuantity',
    {
        'quantity':value,
        'product_id':p_id
    },
    function(data){
       alert(data); 
    });
}