<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">


          <div class="col-lg-3 col-md-6 footer-contact">
            <img width="50%" height="70%" src="{{ asset('img/republic.png')}}" alt="">
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>CvSU<span> TANZA</span></h3>
            <p>
              Pabahay, Bagtas <br>
              Tanza, Cavite<br>
              Philippines <br><br>
              <strong>Phone:</strong> 09876543210<br>
              <strong>Email:</strong> info@example.com<br> 
              
            </p>
            <div class="totalVisits d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="300">
              <div class="totalVisits-info">
                  <p><span>Total Visits: </span>{{ $totalVisits }}</p>
              </div>
          </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Other Links</h4>
            <ul>
              @foreach ($others as $other)
              <li><i class="bi bi-chevron-right"></i> <a href="#">{{$other->link}}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Quick Links</h4>
            <ul>
              @foreach ($quicks as $quick)
              <li><i class="bi bi-chevron-right"></i> <a href="#">{{$quick->link}}</a></li>
              @endforeach
            </ul>
          </div>

          {{-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione inventore hic possimus quia, dicta dolor magni amet ducimus ipsa provident quae sequi porro officia doloribus enim. Et eum eius inventore?</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-google"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div> --}}

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong>2023 Cavite State University | <span>TANZA</span> Campus</strong>. All Rights Reserved
      </div>
    </div>
    </footer>
    <!-- End Footer -->
