

<style type="text/css">

    .follow li {
        display: inline-block;
        height: 36px;
        width: 36px;
        line-height: 38px;
        text-align: center;
        border-radius: 50%;
        background-color: #fff;
        margin-right: 10px;
        opacity: 1 !important;
    }

    .follow li:last-child {
        margin-right: 0px;
    }

    .follow li.facebook i {
        color: #3b5998;
    }

    .follow li.facebook:hover {
        background-color: #3b5998;
        transition: 0.3s all;
    }

    .follow li.facebook:hover i,
    .follow li.twitter:hover i,
    .follow li.instagram:hover i,
    .follow li.google:hover i,
    .follow li.youtube:hover i {
        color: #fff;
    }

    .follow li.twitter i {
        color: #1da1f2;
    }

    .follow li.twitter:hover {
        background-color: #1da1f2;
        transition: 0.3s all;
    }

    .follow li.instagram i {
        color: #f56040;
    }

    .follow li.instagram:hover {
        background-color: #f56040;
        transition: 0.3s all;
    }

    .follow li.google i {
        color: #dd4b39;
    }

    .follow li.google:hover {
        background-color: #dd4b39;
        transition: 0.3s all;
    }

    .follow li.youtube i {
        color: #cd201f;
    }

    .follow li.youtube:hover {
        background-color: #cd201f;
        transition: 0.3s all;
    }

    .follow li i {
        font-size: 18px;
    }

    i fa{
        font-family: fontawesome !important ;
    }

    </style>

    <!--====== Footer Area Start ======-->
    <footer class="section footer-area">
            <!-- Footer Top -->
            <div class="footer-top ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <!-- <h2>Logo</h2> -->
                                 <img class="navbar-brand-sticky" src="{{ asset('assets/img/logo/footer.png') }}" alt="sticky brand-logo"> 
                                <p class="mb-2 sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur, quae.Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur, quae.Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur, quae.</p>
                                <!-- Social Icons -->
                                <ul class="social-icons list-inline pt-2">
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-google-plus"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <!-- Footer Items -->
                            <div class="footer-items">

                            <ul>
                                    <li><a class="sub-title" href="/home">Home</a></li>
                                    <li><a class="sub-title" href="#">About Us</a></li>
                                    <li class=""><a class="sub-title" href="#">Blog</a></li>
                                    <li><a class="sub-title" href="/features">Features</a></li>
                                    <li><a class="sub-title" href="#">Contact Us</a></li>
                                    <li><a class="sub-title" href="/faq">FAQ</a></li>
                                    <li><a class="sub-title" href="{{route('term-and-condition')}}">Term and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4" style="text-align:end;">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title text-uppercase mb-2">Subscribe Now</h3>
                                <p class="mb-2 sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur, quae.Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur, quae.</p>
                                    <form action="" method="post">
                                        <div class="input-group mb-3">
                                          <input type="email" class="form-control" placeholder="E-mail">
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                                Subscribe
                                           
                                            </div>
                                          </div>
                                        </div>
                                       
                                        
                                      </form>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <p class="text-white">Copyright 2021</p> 
                </div>
            </div>

        </footer>
        <!--====== Footer Area End ======-->
