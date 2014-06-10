
<div class="col span_1_of_6">
   <?php
if(!isset($_SESSION['loggedIn'])){
?> 
    <div class="createAccount right">
      <a class="btn btn-color3" href="<?php echo BASEURL?>user/login#register">Create Account></a>
    </div>
</div>



<div class="show_none">
    <p>New User can register here,Only for customers</p>
    <form name="register" method="post" action="<?php echo BASEURL; ?>user/register">
        <input type="text" name="username" placeholder="Choose a Username">
        <input type="email" name="email" placeholder="Your Email">
        <input type="password" name="password" placeholder="Choose Password">
        <input type="number" name="contact" placeholder="Contact">
        <input type="submit" value="Register" name="signup">

    </form>
    <?php
    if (isset($this->msg)) {
        echo $this->msg;
    }
}
    ?>
</div>




