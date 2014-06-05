
<div class='content'>
    
    <div class='user-login'>
    
        <span class='login__text'>Login with your account</span>
        
   
        <form action="<?php echo BASEURL; ?>user/login" method="post">
            <input type="text" name="username" placeholder="Username"><br/>
            <input type="password" name="password" placeholder="Password"><br/>
            <input type="submit" name="submit" value="Login">
        </form>
<?php
        if (isset($this->msg)) {
            echo $this->msg;
        }
        ?>
        If you don't have an account <span class='register__link'><a href='#register'>Register here</a></span>
    </div>
    <div class='clearfix'></div>
    <hr/> 
<img src='<?php echo IMAGE ?>banner5.jpg' width='1360px'>
<div class='clearfix'></div>
<hr>
    <div id='register' class="user-register">
        <span class='register__text'>Create your account</span>
        <form name="register" method="post" action="<?php echo BASEURL; ?>user/register">
            <table>
                <tr>
                      <td><input type="text" name="username" placeholder="Choose a Username"></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Your Email"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Choose Password"></td>
                </tr>
                <tr>
                     <td> <input type="number" name="contact" placeholder="Contact"></td>
                </tr>
                <tr>
                     <td>  <input type="submit" value="Register" name="signup"></td>
                </tr>
            </table>
        </form>
     

    </div>
</div>

<div class='clearfix'></div>
<hr/>