<section class="section7">
<div class="footercontainer">
    <footer class="l-footer">
       <?php
       if(!isset($_SESSION['loggedIn'])){
       ?>
        <section class="foot foot-1">
            <div class="foot-1__align">
                
                <span class="foot-1__text1">Get started with bdeal today. </span><span class="font-1__text2"><a class="btn font-1__btn" href="">Create an Account</a></span>
            </div>
        </section>
        <?php
       }
       ?>
        <section class="foot foot-2">
            <div class="container">
                <div class="row">
                    <div class="col span_1_of_4">
                        <h5>Overview</h5>
                        <ul>
                            <li><a href="<?php echo BASEURL ?>desc/aboutus">About Us</a></li>
                             <li><a href="">Careers</a></li>
                             <li><a href="">Sell with us</a></li>
                             <li><a href="">Responsible Disclosure Policy </a>
                        </ul>
                    </div>
                     <div class="col span_1_of_4">
                         <h5>Resources</h5>
                         <ul>
                             <li><a href="">Getting Started</a></li>
                             <li><a href="<?php echo BASEURL ?>user_guide/home">User guide</a></li>
                         </ul>
                    </div>
                 <div class="col span_1_of_4">
                     <h5>Help</h5>
                     <ul>
                         <li><a href="">Frequently asked Questions</a></li>
                         <li><a href="">Track Orders</a></li>
                         <li><a href=''>Be an owner</a></li>
                         <li><a href=''>Shipping</a></li>
                         <li><a href="">Cancellation</a></li>
                         <li><a href="">Returns</a></li>
                     </ul>
                    </div>
                 <div class="col span_1_of_4">
                      <h5>Contact Us</h5>
                        <ul>
                            <li><a href="">7307676941</a></li>
                             <li><a href="">Email Us</a>
                                 <ul class="social">
                                     <li><a href="">Facebook</a></li>
                                     <li><a href="">Twitter</a></li>
                                     <li><a href="">Google+</a></li>
                                     <li><a href="">Linkedin</a></li>
                                     <li><a href="">Github</a></li>
                                 </ul>
                             </li>
                        </ul>
                    </div>
                
                </div>
            </div>
        </section>
        <section class="foot foot-3">
            <div class="col span">
                <div class="copyright">
                    <span>&copy;2014 Bdeal inc.</span>
                    <span>Mobile: 7307676941</span>
                    <span>support-india@bdeal.in</span>
                    <span>Terms of service</span>
                    <span>Privacy</span>
                </div>
            </div>
        </section>
    </footer>
</div>

</section>
</div><!-- wrapper -->