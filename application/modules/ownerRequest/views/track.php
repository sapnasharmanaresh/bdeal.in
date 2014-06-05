<form action='<?php echo BASEURL; ?>ownerRequest/track' method='post'>
    Enter your email-id(must be same as entered while submitting request)<br/>
    <input type='text' name='request_email'><br/>
    <input type='submit' name='find'>
</form>
<?php
if(isset($this->res)){
    if(!empty($this->res)){
    //echo "not valid";
    $result = $this->res;
    //print_r($this->res);
    
    //Modules::run('ownerRequest','track_result',$result);
    foreach($result as $key=>$value){
    ?>
<div>
    Request ID :<?php echo "ore_".$value['id'];?><br/>
    Request Date : <?php echo date('d M,Y',strtotime($value['timestamp']))?><br/>
    You are:<?php echo $value['ownerName'];?><br/>
    Application Status:<br/>
        <?php 
             $status = $value['status'];
            if($status !=NULL)
            {
                echo "Stage 1 : Admin Report=>".$value['status']."<br/>";
                echo "Stage 2 : Quality Deptt Report => ";
                $qlty = $value['replyfromqualitydpt'];
                if($qlty != NULL){
                    echo $qlty;
                }
                else{
                    echo "Sent to quality deptt";
                }
                echo "<br/>Stage 3 : Final Report => ";
                if($status == "Approved" && $qlty == "Approved"){
                    echo "You have been succesfully allotted Shop!!";
                }
                elseif($status == "Rejected"){
                    echo "Sorry,We can't process your application Further!";
                }
                elseif($status == "Approved" && $qlty == "Rejected"){
                    echo "You can again Submit your products description within 15 days";
                }
                else
                {
                    echo "Wait for final results";
                }
                
            }
            else
            {
                echo "No report yet!";
            }
            
    }
         ?>
    
</div>


<?php
}

else
{
    echo "No such email found";
}
}
?>
<p>
        
    <a href="<?php echo BASEURL;?>">Return to main page</a>
 </p>

