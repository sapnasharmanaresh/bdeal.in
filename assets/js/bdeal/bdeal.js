


function visitor(){
    $.post('visitors/prev',function(data){
    // var d = Date();
   //  alert(d.getMonth()); 
      data++;
      $.post('visitors/update',{'data':data},function(data){
          
      })
    })
}

window.onload=visitor;


//alert(1);
$('document').ready(function(){
  // alert(1); 
    /*$('body').find('#check').onChange(function(){
            alert( this.val());
        });
      */
     
        
       /* $('#request').onchange(function(){
           $.post('../../ownerrequest/admin',function(data){
               alert(1);
                   alert(data);
               } ) 
        });
        
        
        $('body').find('#logout').onclick(function(){
            $.post( '../logout',function(data){
                
                 alert(data);
            })
        })
        */
   
    
});
    