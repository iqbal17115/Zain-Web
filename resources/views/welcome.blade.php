@include('layouts.header')

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{asset('home_imgs1/'.$home_imgs->home_img1)}}" alt="" title="#slider-direction-1" style="width=700px;"/>
        <img src="{{asset('home_imgs2/'.$home_imgs->home_img2)}}" alt="" title="#slider-direction-2" style="width=700px;"/>
        <img src="{{asset('home_imgs4/'.$home_imgs->home_img4)}}" alt="" title="#slider-direction-3" style="width=700px;" />
 {{--       <img src="{{asset('home_imgs4/'.$home_imgs->home_img3)}}" alt="" title="#slider-direction-4" />
         <img src="{{asset('home_imgs5/'.$home_imgs->home_img3)}}" alt="" title="#slider-direction-5" />
 --}}      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">{{$homes->home_title}} </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{!!$homes->home_desc!!}</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">{{$homes->home_title}}</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{!!$homes->home_desc!!}</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">{{$homes->home_title}} </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{!!$homes->home_desc!!}</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About {{$homes->name}}</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="{{asset('about_imgs/'.$abouts->about_img)}}" alt="">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">{{$abouts->about_title}}</h4>
              </a>
              <p>
                {!!$abouts->about_desc!!}
              </p>
              {{-- <ul>
                <li>
                  <i class="fa fa-check"></i> Interior design Package
                </li>
                <li>
                  <i class="fa fa-check"></i> Building House
                </li>
                <li>
                  <i class="fa fa-check"></i> Reparing of Residentail Roof
                </li>
                <li>
                  <i class="fa fa-check"></i> Renovaion of Commercial Office
                </li>
                <li>
                  <i class="fa fa-check"></i> Make Quality Products
                </li>
              </ul> --}}
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Start Service area -->
  @foreach ($services as $service)
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Our Services</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="{{$service->service_icon}}"></i>
										</a>
                    
                        
                    
                  <h4>{{$service->service_title}}</h4>
                  <p>
                    {!!$service->service_desc!!}
                  </p>
                </div>
              </div>
              
              <!-- end about-details -->
            </div>
          </div>
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-camera-retro"></i>
										</a>
                  <h4>Creative Designer</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div> --}}
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-wordpress"></i>
										</a>
                  <h4>Wordpress Developer</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div> --}}
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-camera-retro"></i>
										</a>
                  <h4>Social Marketer </h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div> --}}
          <!-- End Left services -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-bar-chart"></i>
										</a>
                  <h4>Seo Expart</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div> --}}
          <!-- End Left services -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-ticket"></i>
										</a>
                  <h4>24/7 Support</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div> --}}
              <!-- end about-details -->
              
           {{--  </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  @endforeach
  

  <!-- Start team Area -->
  {{-- <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our special Team</h2>
          </div>
        </div>
      </div>
      @foreach ($emp as $emp)
          
      
      <div class="row">
        <div class="team-top">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="{{asset('employee_imgs/'.$emp->employee_img)}}" alt="" style="width:100%; height:300px">
									</a>
                
                  <ul>
                    <li>
                      <a href="#">
													
												</a>
                    </li>
                    <li>
                      <a href="#">
													
												</a>
                    </li>
                    <li>
                      <a href="#">
													
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>{{$emp->employee_name}}</h4>
                <p>{{$emp->employee_designation}}</p>
                <p>{{$emp->departments->dept_name}}</p>
              </div>
            </div>
          </div>
          @endforeach --}}
         
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->

  <!-- Start reviews Area -->
  <div class="reviews-area hidden-xs">
    <div class="work-us">
      <div class="work-left-text">
        <a href="#">
						<img src="img/about/2.jpg" alt="">
					</a>
      </div>
      <div class="work-right-text text-center">
        <h2>working with us</h2>
        <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
        <a href="#contact" class="ready-btn">Contact us</a>
      </div>
    </div>
  </div>
  <!-- End reviews Area -->

  <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our Products</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        {{-- <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              
              <ul class="project-menu">
                
                <li>
                  {{-- <a href="#" class="active" data-filter="*">All</a> --}}
                {{-- </li>
                
                    
                
                <li>
                  {{-- <a href="#" data-filter=".{{$p->tag}}">{{$p->cat_name}}</a> --}}
                </li>
                
            {{--   </ul>
            </div>
          </div>
        </div> --}} 
        
        @foreach ($cat as $c)
        <div class="col-md-12">
          <h1 style="text-align: center;"><strong>{{$c->cat_name}}-{{$c->capacity}}</strong></h1><br><br>
          
      </div>
      <div class="col-md-12">
        <div class="row">
          <!-- @foreach($c->products as $p1)
          <div class="col-md-6">
            <ul style="list-style-type: circle; font-size:20px">
              <li style="">{{$p1->prd_title}}</li>
            </ul>
          </div>
        @endforeach -->
<div class="col-md-12">
  <br>
</div>
      </div>
        </div>
              @foreach($c->products as $p)
              
              
        <div class="top-team">
          
          <!-- single-awesome-project start -->
          <div class="col-md-3 col-sm-3 col-xs-12 ">
            <div class="single-awesome-project">
              

             
              <div class="awesome-img">
                
                <a href="#"><img style ="border: 5px inset rgb(233, 222, 222); width:100%; height:200px"src="{{asset('prd_imgs/'.$p->prd_img)}}" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="{{asset('prd_imgs/'.$p->prd_img)}}">
                      <h4>{{$p->prd_title}}</h4>
                      <span>{{$p->categories->cat_name}}</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endforeach 
          <br>
        
          
        
        </div>
      </div>
    </div>
  </div>
  
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          @foreach ($news as $n)
              
          
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="{{route('newsDetails',['id'=>$n->news_id,])}}">
										<img src="{{asset('news_imgs/'.$n->news_img)}}" alt="">
									</a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
										{{-- <i class="fa fa-comment-o"></i> --}}
										{{-- <a href="#">13 comments</a> --}}
									</span>
                <span class="date-type">
										<i class="fa fa-calendar"></i>{{$n->created_at}}
									</span>
              </div>
              <div class="blog-text">
                <h4>
                                        <a href="#">{{$n->news_title}}</a>
									</h4>
                {{-- <p>
                  Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p> --}}
              </div>
              <span>
									<a href="{{route('newsDetails',['id'=>$n->news_id,])}}" class="ready-btn">Read more</a>
								</span>
            </div>
            <!-- Start single blog -->
          </div>
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- End Blog -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Welcome to our company</h3>
            {{-- <a class="sus-btn" href="#">Get A quate</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: {{$contacts->phone}}<br>
                  {{-- <span>Monday-Friday (9am-5pm)</span> --}}
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: {{$contacts->email}}<br>
                  {{-- <span>Web: www.example.com</span> --}}
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Location: {{$contacts->address}}<br>
                  {{-- <span>NY 535022, USA</span> --}}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <iframe src="{{$contacts->gMap}}" width="100%" height="530" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
              
              <form action="{{route('email.submit')}}" method="POST" >
                {{@csrf_field()}}
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name"  id="name" placeholder="Your Name" style="width: 100%; /* Full width */
                  padding: 12px; /* Some padding */ 
                  border: 1px solid #ccc; /* Gray border */
                  border-radius: 4px; /* Rounded borders */
                  box-sizing: border-box; /* Make sure that padding and width stays in place */
                  margin-top: 6px; /* Add a top margin */
                  margin-bottom: 16px; /* Bottom margin */
                  resize: vertical "  /><br>
                  @error('name')
                  <span class="text-danger">{{$message}}</span><br>
                 @enderror
                  
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" placeholder="Your Email"  style="width: 100%; /* Full width */
                  padding: 12px; /* Some padding */ 
                  border: 1px solid #ccc; /* Gray border */
                  border-radius: 4px; /* Rounded borders */
                  box-sizing: border-box; /* Make sure that padding and width stays in place */
                  margin-top: 6px; /* Add a top margin */
                  margin-bottom: 16px; /* Bottom margin */
                  resize: vertical " /><br>
                  @error('email')
                  <span class="text-danger">{{$message}}</span><br>
                 @enderror
                  
                  <label for="subject">Subject</label>
                  <input type="text"  name="subject" id="subject" placeholder="Subject"  style="width: 100%; /* Full width */
                  padding: 12px; /* Some padding */ 
                  border: 1px solid #ccc; /* Gray border */
                  border-radius: 4px; /* Rounded borders */
                  box-sizing: border-box; /* Make sure that padding and width stays in place */
                  margin-top: 6px; /* Add a top margin */
                  margin-bottom: 16px; /* Bottom margin */
                  resize: vertical " /><br>
                  @error('subject')
                  <span class="text-danger">{{$message}}</span><br>
                 @enderror

                  <label for="message">Message</label><br>
                  <textarea  name="message" rows="5"  placeholder="Message"  style="width: 100%; /* Full width */
                  padding: 12px; /* Some padding */ 
                  border: 1px solid #ccc; /* Gray border */
                  border-radius: 4px; /* Rounded borders */
                  box-sizing: border-box; /* Make sure that padding and width stays in place */
                  margin-top: 6px; /* Add a top margin */
                  margin-bottom: 16px; /* Bottom margin */
                  resize: vertical "></textarea><br>
                 @error('message')
                 <span class="text-danger">{{$message}}</span><br>
                @enderror

                <button type="submit" class="submit" value="Send Message" style="background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;">Send</button>
                
              </form>

          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  @include('layouts.footer')
  
