<!-- Start Footer bottom Area -->
<footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <img src="{{asset('home_imgs/'.$homes->logo)}}" style="width: 200px; height:80px">
                </div>

                <p>{!!$homes->home_desc!!}</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4><br><br>
                <p>
                  {{$homes->name}}
                </p>
                <p>
                  {{$contacts->address}}
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> {{$contacts->phone}}</p>
                  <p><span>Email:</span> {{$contacts->email}}</p>
                  {{-- <p><span>Working Hours:</span> 9am-5pm</p> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                 <h4>Services</h4> <br><br>

                 <ul>
                  @foreach ($cat as $service)
                  <li>
                    {{$service->cat_name}}
                  </li>
                  @endforeach
                 </ul>
                {{-- <div class="flicker-img"> --}}
                  {{-- <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/6.jpg" alt=""></a> --}}
                {{-- </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>{{$homes->name}}</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../../lib/jquery/jquery.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../lib/venobox/venobox.min.js"></script>
  <script src="../../lib/knob/jquery.knob.js"></script>
  <script src="../../lib/wow/wow.min.js"></script>
  <script src="../../lib/parallax/parallax.js"></script>
  <script src="../../lib/easing/easing.min.js"></script>
  <script src="../../lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="../../lib/appear/jquery.appear.js"></script>
  <script src="../../lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../../contactform/contactform.js"></script>

  <script src="../../js/main.js"></script>
</body>

</html>