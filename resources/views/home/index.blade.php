
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<!-- ==============================================
		TITLE AND META TAGS
		=============================================== -->
		<title>FARM ASSIST</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Quickdev">
        <meta name="theme-color" content="#EEC344">

		<!-- ==============================================
		FAVICON
		=============================================== -->  
             
		<!-- ==============================================
		CSS
		=============================================== -->  
        <link rel="stylesheet" href="home/css/bootstrap.min.css">
        <link rel="stylesheet" href="home/css/timeline.css">
        <link rel="stylesheet" href="home/css/stylesheet.css">
        <link rel="stylesheet" href="home/css/home-1-styles.css">
        <link rel="stylesheet" href="home/css/responsive.css">
        <link rel="stylesheet" href="home/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="home/fonts/css/all.min.css">
        <link rel="stylesheet" href="home/css/slick.min.css"> 
        <link rel="stylesheet" href="home/css/owl.carousel.min.css">
        <link rel="stylesheet" href='home/css/animation.aos.min.css'>
        <link rel="stylesheet" href="home/css/animate.min.css">
        <script src="js/modernizr-custom.js"></script>
        
        <script>document.getElementsByTagName("html")[0].className += " js";</script>
	</head>
    
<body>
    
    <!-- LOADER -->
    <!-- <div id="loader-wrapper">
        <div class="loader">
          <div class="square" ></div>
          <div class="square"></div>
          <div class="square last"></div>
          <div class="square clear"></div>
          <div class="square"></div>
          <div class="square last"></div>
          <div class="square clear"></div>
          <div class="square "></div>
          <div class="square last"></div>
        </div>
    </div> -->
    <!-- LOADER -->
    
    <!--HEADER START-->
    <header>
        <!--NAVIGATION-->
        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="../agrom/"><div class="logo-brand"><img src="img/master/logo.png" alt=""></div></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>				
                    </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">HOME</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
        </div>
        <!--NAVIGATION END-->
    </header> 
    <!--HEADER END-->
    
    <!--SLIDER START-->
    <div class="main-slider">
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('home/image/p1.jpg')">
            <div class="carousel-caption">
              <h2 class="display-4 animated fadeInLeft">Cultivating <br><span>Growing Ideas</span></h2>
              <p class="lead animated fadeInRight">Long established fact that a reader will be distracted by the readable content</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('home/image/farmer.jpg')">
            <div class="carousel-caption">
              <h2 class="display-4 animated fadeInLeft">Farmer <br> <span>feeding the world</span></h2>
              <p class="lead animated fadeInRight">Long established fact that a reader will be distracted by the readable content</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('home/image/FARM (2).jpg')">
            <div class="carousel-caption">
              <h2 class="display-4 animated fadeInLeft">Finest Products <br> <span>For Agriculture </span></h2>
              <p class="lead animated fadeInRight">Long established fact that a reader will be distracted by the readable content</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
    </div>
    <!--SLIDER END-->
    
    <!--HOME ABOUT START-->
    <section>
        <div class="item-background">
            <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="home-about">
                        <h5>Grow Naturally</h5> 
                        <h2>Leaders In The Field</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        <p>Search for 'lorem ipsum' will uncover many web sites still in their infancy, uncover many web sites still in their infancy.</p>
                        <div class="btn-more-box"><a class="btn-hover-corner" href="#">LEARN MORE</a></div>
                    </div>
                  </div>
                  <div class="col-lg-6 space-break">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="home-icon-box">
                          <figure class="icon-pic"><img src="img/master/seeding.png" alt=""></figure>
                          <h3>CROP MANAGEMENT</h3>
                          <p>A crop management system is a machine learning-based project that uses algorithms to predict crops, recommend fertilizers, and provide rainfall and yield predictions to help farmers make informed decisions</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="home-icon-box">
                          <figure class="icon-pic"><img src="img/master/cow.png" alt=""></figure>
                          <h3>Cattle</h3>
                          <p>Many desktop publishing packages and web page.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="home-icon-box">
                          <figure class="icon-pic"><img src="img/master/wheat.png" alt=""></figure>
                          <h3>Wheat Cultivation</h3>
                          <p>Many desktop publishing packages and web page.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="home-icon-box">
                          <figure class="icon-pic"><img src="img/master/truck.png" alt=""></figure>
                          <h3>Modern Truck</h3>
                          <p>Many desktop publishing packages and web page.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--HOME ABOUT END-->
        
        <!--PROCESS STEPS START-->
        <div class="container-fluid inner-color box-steps">
            <div class="container">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="front-options">
                      <h3>01 <br> <span>Crop Selection</span></h3>
                      <p>It is a long established fact that a reader will be distracted by the readable.</p>
                    </div>
                  </div>
                  <div class="col-lg-4 center-space">
                    <div class="front-options">
                      <h3>02 <br> <span>Land Preparation</span></h3>
                      <p>It is a long established fact that a reader will be distracted by the readable.</p>    
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="front-options">
                      <h3>03 <br> <span>Seed Selection</span></h3>
                      <p>It is a long established fact that a reader will be distracted by the readable.</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
         <!--PROCESS STEPS END-->
        
         <!--FEATURES START-->
        <div class="container services-container">
            <div class="row">
              <div class="col-lg-4">
                <div class="front-thumb" data-aos="fade-up">
                    <figure class="from-thumb-pic"><img src="img/images/img6.jpg" alt=""></figure>
                    <div class="thumb-caption">
                        <h3>Nutrition Wheat</h3>
                        <p>Getting the most effective keywords</p>
                        <div class="btn-box">
                            <p><a class="btn-hover-corner" href="#">READ MORE</a></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-4 center-space">
                <div class="front-thumb" data-aos="fade-up">
                    <figure class="from-thumb-pic"><img src="img/images/img7.jpg" alt=""></figure>
                    <div class="thumb-caption">
                        <h3>High Technology</h3>
                        <p>Getting the most effective keywords</p>
                        <div class="btn-box">
                            <p><a class="btn-hover-corner" href="#">READ MORE</a></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="front-thumb" data-aos="fade-up">
                    <figure class="from-thumb-pic"><img src="img/images/img8.jpg" alt=""></figure>
                    <div class="thumb-caption">
                        <h3>Quality Products</h3>
                        <p>Getting the most effective keywords</p>
                        <div class="btn-box">
                            <p><a class="btn-hover-corner" href="#">READ MORE</a></p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <!--FEATURES END-->
        
       
        
        <!--CLIENTS START-->
        <div class="container">
            <div class="row">
              <div class="col-6 col-sm-6 col-md-4 col-lg-2 tablet-view">
                <figure class="partners-logo"><img src="img/images/client-1.png" alt=""></figure>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-2 tablet-view">
                <figure class="partners-logo"><img src="img/images/client-5.png" alt=""></figure>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-2 tablet-view">
                <figure class="partners-logo"><img src="img/images/client-3.png" alt=""></figure>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                <figure class="partners-logo"><img src="img/images/client-7.png" alt=""></figure>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                <figure class="partners-logo"><img src="img/images/client-2.png" alt=""></figure>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                <figure class="partners-logo"><img src="img/images/client-6.png" alt=""></figure>
              </div>
            </div> 
        </div>
        <!--CLIENTS END-->

        <!--CONTACT US START-->
        <div class="container-fluid home-contact">
            <div class="row">
              <div class="col-lg-6" data-aos="fade-right">
                <div class="contact-info">
                  <p>Get In Touch</p>
                  <h2>Contact Us</h2>
                  <div class="block-address">
                    <figure class="address-icon"><img src="img/master/map.png" alt=""></figure>
                    <div class="inner-info">
                        <h4>ADDRESS</h4> 
                        <p>8273 NW 56th ST Miami, 33195 US</p>
                    </div>
                  </div>
                  <div class="block-phone">
                    <figure class="phone-icon"><img src="img/master/phone.png" alt=""></figure>
                    <div class="inner-info">
                        <h4>OFFICE PHONE</h4> 
                        <p>+ 0511 01220 3320</p>
                    </div>
                  </div>
                  <div class="block-email">
                    <figure class="phone-icon"><img src="img/master/mail.png" alt=""></figure>
                    <div class="inner-info">
                        <h4>EMAIL</h4> 
                        <p>info@agrom.com</p>
                    </div>
                  </div>
                  <div class="social-networks">
                    <div class="networks-list"><a href="#"><i class="fab fa-facebook-f"></i></a></div>  
                    <div class="networks-list"><a href="#"><i class="fab fa-twitter"></i></a></div>  
                    <div class="networks-list"><a href="#"><i class="fab fa-instagram"></i></a></div>  
                    <div class="networks-list"><a href="#"><i class="fab fa-linkedin-in"></i></a></div>  
                  </div>
                </div>  
              </div>
              <div class="col-lg-6 custom-map" data-aos="fade-left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167616.99483399244!2d-74.08279002518668!3d40.67646407501496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a560db693e3%3A0xb05e8b0bdf854b54!2sGowanus%2C+Brooklyn%2C+Nueva+York%2C+EE.+UU.!5e0!3m2!1ses-419!2sdo!4v1560863423970!5m2!1ses-419!2sdo" class="map-iframe"></iframe>
              </div>
            </div>
            <div class="form-box">
                <form id="contact-form" method="post" action="contact.php">
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_phone" type="tel" name="phone" class="form-control customize" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="5" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 contact-btn">
                                <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        <!--CONTACT US END-->
        
    </section>
    
    <!--FOOTER START-->
    <footer>
        <div class="container">
            <div class="row">
              <div class="col-lg-5">
                <div class="footer-col">
                    <a href="../agrom/">
                        <figure class="footer-logo"><img src="img/master/logo-2.png" alt=""></figure>
                    </a>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                    <p class="copyright">© 2019 Agrom Organic & Agriculture Food HTML Template</p>
                </div>
              </div>
              <div class="col-lg-3 footer-center-col">
                <h4>FIND US</h4> 
                <div class="location">
                    <p>Adddres:  8273 NW 56th ST Miami, Florida, 33195 United States</p>
                    <p>Phone: + 0511 0000 3322</p>
                    <p>Email: INFO@AGROM.COM</p>
                    <p>Fax: + 0511 01220 3320</p>
                </div>
              </div>
              <div class="col-lg-4 footer-col-right">
                <h4>NEWSLETTER</h4>
                <div class="newsletter-box">
                <p>Suscribe to our newsletter and get the lastest scoop right to your inbox!</p>
                 <form  action="#" method="post" name="sign-up">
                    <input type="email" class="input" id="email" name="email" placeholder="Your email address" required>
                    <input type="submit" class="button" id="submit" value="SIGN UP">
                  </form>           
                </div>
                <p class="cursive">Your email is safe with us, we don't spam.</p>
              </div>
            </div>  
        </div>
    </footer>
    <!--FOOTER END-->

    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->
    
	<!-- ==============================================
	JAVASCRIPTS
	=============================================== -->
    <script src="home/js/plugins.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/agrom.js"></script>
    <script src="home/js/util.js"></script> 
    <script src="home/js/swipe-content.js"></script> 
    <script src="home/js/main.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-101241150-1', 'auto');
      ga('send', 'pageview');
    </script> 
    
    </body>
    
</html>