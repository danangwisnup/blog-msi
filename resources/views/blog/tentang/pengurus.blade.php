@extends('layouts/blog/main')
@section('content')
    @include('layouts/blog/header')

    <!-- Content -->
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
      
              <div class="d-flex justify-content-between align-items-center">
                <h2>Pengurus</h2>
                <ol>
                  <li><a href="/">Beranda</a></li>
                  <li>Pengurus</li>
                </ol>
              </div>
      
            </div>
          </section><!-- End Breadcrumbs -->
      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Team <strong>Kami</strong></h2>
          </div>
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up">
                <div class="member-img">
                  <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                  <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="200">
                <div class="member-img">
                  <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="300">
                <div class="member-img">
                  <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                </div>
              </div>
            </div>
        
      </section><!-- End Our Team Section -->

        @include('layouts/blog/footer')
@endsection
