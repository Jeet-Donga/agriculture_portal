<footer class="footer">
    <div class="footer-first-row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <ul class="call-email-alt">
                        <a href="tel:7698010709" class="offer-link"><i class="fa fa-phone"></i>+91 7698010709</a>
                        <a href="mailto:agricultureportal2044@gmail.com" class="offer-link"><i class="far fa-envelope"></i></i>agricultureportal2044@gmail.com</a>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="social-links-footer">
                        <ul>
                            <li><a href="https://www.facebook.com/agriculture.portal.9" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/agricultureportal2044" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com/AgriculturePor2" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/agriculture-portal-5425b5207/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-second-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="second-row-item">
                        <h4>About Us</h4>
                        <div class="about-content">
                        <p style="text-align: justify">Agriculture Portal is India’s largest Agri Inputs Marketplace Platform providing wide choice of quality inputs to farmers at their doorstep. Agriculture Portal has adapted multichannel strategy to reach out growers across India and addressing their Agricultural Input needs. Our portfolio offering includes broad range of Seeds, Plant Protection, Plant Nutrition and Agri Implements. Our clientele includes farmers, and other institutional growers. Our data strategy enables various stakeholders of Agri value chain to come together and build end to end ecosystem for farming community and driving sustainable agriculture.</p>
                        <a href="<?php base_url()?>about-us" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="second-row-item">
                        <h4>Our Pages</h4>
                        <ul>
                            <li><a href="<?php echo base_url();?>about-us">About Us</a></li>
                            <li><a href="<?php echo base_url();?>contact-us">Contact Us</a></li>
                            <li><a href="<?php echo base_url();?>suggest-us">Suggest Us</a></li>
                            <li><a href="<?php echo base_url();?>privacy-policy">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url();?>return-refund-policy">Return & Refund</a></li>
                            <li><a href="<?php echo base_url();?>term-and-conditions">Term & Conditions</a></li>
                            <li><a href="<?php echo base_url();?>faqs">FAQs</a></li>
                            <li><a href="<?php echo base_url();?>login">Login</a></li>
                            <li><a href="<?php echo base_url();?>register">Registration</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="second-row-item-app">
                        <div class="second-row-item">
                            <h4>Get in Touch</h4>
                            
                            <h6>Rai University,Saroda,Dholka Taluka,</h6><h6>Ahmedabad,Gujarat–382260</h6>

                            <h6><a href="tel:7698010709" class="offer-link"><i class="fa fa-phone"></i>+91 7698010709</a></h6>
                            <h6><a href="mailto:agricultureportal2044@gmail.com" class="offer-link"><i class="far fa-envelope"></i></i>agricultureportal2044@gmail.com</a></h6>
                        </div>    
                            <h4>Email Subscriber</h4>
                        </div>
                                                   
                            <h6 >Put your email here,</h6>
                            <h6>we will update about letest offers and</h6><h6>stock.</h6>
                            <div class="newsletter-input">
                                <input id="email" name="email" id="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
                                <input class="newsletter-btn hover-btn" class="button" type="submit" onclick="subscriber()"  value="Subscribe Now">
                                <p style="color: orangered;" id="err-msg"></p>
                            </div>
                        <div class="second-row-item-payment">
                            <h4>Payment Method</h4>
                            <div class="footer-payments">
                                <ul id="paypal-gateway" class="financial-institutes">
                                    <li class="financial-institutes__logo">
                                        <img alt="Visa" title="Visa" src="<?php echo base_url(); ?>assets/images/footer-icons/pyicon-6.svg">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="Visa" title="Visa" src="<?php echo base_url(); ?>assets/images/footer-icons/pyicon-1.svg">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="MasterCard" title="MasterCard" src="<?php echo base_url(); ?>assets/images/footer-icons/pyicon-2.svg">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="American Express" title="American Express" src="<?php echo base_url(); ?>assets/images/footer-icons/pyicon-3.svg">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="Discover" title="Discover" src="<?php echo base_url(); ?>assets/images/footer-icons/pyicon-4.svg">
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-last-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            Copyright <i class="uil uil-copyright"></i> 2021 <b>Agriculture Portal</b> . All Rights Reserved. Design by : <a href="https://www.instagram.com/mr.jeet_donga/" target="_blank">Jeet Donga</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
    function subscriber()
    {
        var email = document.getElementById('email').value;
        
        if( email != "" )
        {
            var ptn = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            
            if(email.match(ptn))
            {
               $data = { email:email};
               var path = "http://localhost/agriculture_portal/backend/subscriber";
               
               $.post( path , $data , function(output){
                   
                   if( output == "1")
                   {
                       $("#err-msg").html("Thank You For Subscribe.");
                       document.getElementById('email').value ='';
                       
                   }
                   if( output == "2")
                   {
                       $("#err-msg").html("You Already Subscribe.");
                       document.getElementById('email').value ='';
                   }
                   
               });
            }
            else
            {
                $("#err-msg").html("Please Enter Valid Email");
            }
            
        }
        else
        {
           $("#err-msg").html("Please Enter Email."); 
        }
    }
    </script>
</footer>
