$(document).ready(function(e) {
    //alert("welcome");
       $("#email").keyup(function(){
           $("#result").html("checking...");
           check_avail();
       }) 
    
    function check_avail(){
      var username = $('#email').val();
      console.log(username);
      $.post("check_email_avail",
        {username:username},
            function(result){
              
                   if(result==false){
                        $("#result").html("<div class='success'>Available</div>");
            }
            else if(result == true)
                {
                    $("#result").html("<div class='error'>not available</div>");
                }
        })
    }
});
