@extends('myweb.layouts.welcome')

@section('content')
<div class="hero-section">
    <h1 class="hero-title">Welcome to My Awesome Website</h1>
    <p class="lead">We provide amazing services that will help your business grow.</p>
    <a href="#features" class="hero-btn">Learn More</a>
</div>
<div id="wrapper">
    <div id="wrapper-i">
      <div id="header">
        <h1><a href="#"><img src="images/logo.jpg" width="286" height="114" alt="" /></a></h1>
        <div id="header-cap"></div>
      </div>
      <div id="spacer"> </div>
      <div id="body">
        <div id="body-i">
          <div id="left">
            <div id="bullets">
              <ul>
                <li><a href="#"><img src="images/box_1.jpg" width="261" height="22" alt="advanced web technologies" /></a></li>
                <li><a href="#"><img src="images/box_2.jpg" width="261" height="25" alt="high-end solutions" /></a></li>
                <li><a href="#"><img src="images/box_3.jpg" width="261" height="25" alt="scalability and reliability" /></a></li>
              </ul>
            </div>
            <h2><img src="images/title_out_technologies.jpg" width="224" height="50" alt="our technologies" /></h2>
            <div class="i">
              <p><a href="#">Technology</a> at its best Technology at its best Technology at its best Technology at its best Technology at its best </p>
              <img src="images/photo_1.gif" width="95" height="96" alt="" class="left" />
              <p><a href="#">Technology</a> at its best Technology at its best Technology at its best. Tech at the best it can get, brought to you.</p>
            </div>
          </div>
          <div id="right">
            <h2><img src="images/title_welcome.jpg" width="162" height="50" alt="welcome to our site" /></h2>
            <div class="j"> <img src="images/photo_2.gif" width="94" height="71" alt="photo 2" class="left" />
              <ul class="bigbullets">
                <li>HIGH QUALITY</li>
                <li>SUPERB UPTIME</li>
                <li>UNLIMITED SCALABILITY</li>
              </ul>
            </div>
            <div class="i">
              <p><a href="#">Company description</a> goes here... Company description goes here... Company description goes here... Company description.</p>
            </div>
            <div class="clear"><img src="images/divider_h.gif" width="442" height="1" alt="" /></div>
            <h2><img src="images/title_some_words.jpg" width="233" height="50" alt="some words about our company" /></h2>
            <img src="images/photo_3.gif" width="105" height="75" alt="photo 3" class="left" />
            <p><a href="#">Company description</a> goes here... Company description goes here... Company description goes </p>
            <p>A few words about our company goes here A few rds about our company goes here A few rds about our company goes here A few rds about our </p>
          </div>
          <div id="footer-p"> </div>
        </div>
      </div>
    </div>
  </div>
<div id="features" class="features-section">
    <h2 class="features-title">Our Amazing Features</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card feature-card">
                    <i class="fas fa-cogs fa-3x mt-4"></i>
                    <div class="card-body">
                        <h5 class="card-title">Customizable</h5>
                        <p class="card-text">Our platform allows full customization to fit your needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card">
                    <i class="fas fa-chart-line fa-3x mt-4"></i>
                    <div class="card-body">
                        <h5 class="card-title">Growth Focused</h5>
                        <p class="card-text">We help your business grow with our advanced tools.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card">
                    <i class="fas fa-headset fa-3x mt-4"></i>
                    <div class="card-body">
                        <h5 class="card-title">24/7 Support</h5>
                        <p class="card-text">Our team is available 24/7 to assist with any issues.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
