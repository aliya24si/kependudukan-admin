<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('layouts.admin.css')

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('layouts.admin.topbar')
    <!-- Topbar End -->

    <!-- Main Content Start -->

    @yield('content')

    <!-- Main Content end -->

    <!-- Event Start -->
    <!-- Event End -->

    <!-- Service Start
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-title">
                        <h1 class="display-6 mb-4">What We Do for Those in Need.</h1>
                        <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row g-5">
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-droplet fa-2x text-secondary"></i>
                                </div>
                                <h3>Pure Water</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="#!">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-hospital fa-2x text-secondary"></i>
                                </div>
                                <h3>Health Care</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="#!">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-hands-holding-child fa-2x text-secondary"></i>
                                </div>
                                <h3>Social Care</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="#!">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-bowl-food fa-2x text-secondary"></i>
                                </div>
                                <h3>Healthy Food</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="#!">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-school-flag fa-2x text-secondary"></i>
                                </div>
                                <h3>Primary Education</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="#!">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-home fa-2x text-secondary"></i>
                                </div>
                                <h3>Residence Facilities</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="#!">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    Service End -->

    <!-- Donation Start
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Donation</p>
                <h1 class="display-6 mb-4">Our Donation Causes Around the World</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="donation-item d-flex h-100 p-4">
                        <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                            <h6 class="mb-0">Raised</h6>
                            <span class="mb-2">$8000</span>
                            <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                <div class="progress-bar w-100 bg-secondary" role="progressbar" aria-valuenow="85"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="fs-4">85%</span>
                                </div>
                            </div>
                            <h6 class="mb-0">Goal</h6>
                            <span>$10000</span>
                        </div>
                        <div class="donation-detail">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="{{ asset('assets-admin/img/donation-1.jpg') }}"
                                    alt="">
                                <a href="#!"
                                    class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">Food</a>
                            </div>
                            <a href="#!" class="h3 d-inline-block">Healthy Food</a>
                            <p>Through your donations and volunteer work, we spread kindness and support to children.
                            </p>
                            <a href="#!" class="btn btn-primary w-100 py-3"><i
                                    class="fa fa-plus me-2"></i>Donate
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.13s">
                    <div class="donation-item d-flex h-100 p-4">
                        <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                            <h6 class="mb-0">Raised</h6>
                            <span class="mb-2">$8000</span>
                            <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                <div class="progress-bar w-100 bg-secondary" role="progressbar" aria-valuenow="95"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="fs-4">95%</span>
                                </div>
                            </div>
                            <h6 class="mb-0">Goal</h6>
                            <span>$10000</span>
                        </div>
                        <div class="donation-detail">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="{{ asset('assets-admin/img/donation-2.jpg') }}"
                                    alt="">
                                <a href="#!"
                                    class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">Health</a>
                            </div>
                            <a href="#!" class="h3 d-inline-block">Water Treatment</a>
                            <p>Through your donations and volunteer work, we spread kindness and support to children.
                            </p>
                            <a href="#!" class="btn btn-primary w-100 py-3"><i
                                    class="fa fa-plus me-2"></i>Donate
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="donation-item d-flex h-100 p-4">
                        <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                            <h6 class="mb-0">Raised</h6>
                            <span class="mb-2">$8000</span>
                            <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                <div class="progress-bar w-100 bg-secondary" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="fs-4">75%</span>
                                </div>
                            </div>
                            <h6 class="mb-0">Goal</h6>
                            <span>$10000</span>
                        </div>
                        <div class="donation-detail">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="{{ asset('assets-admin/img/donation-3.jpg') }}"
                                    alt="">
                                <a href="#!"
                                    class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">Education</a>
                            </div>
                            <a href="#!" class="h3 d-inline-block">Education Support</a>
                            <p>Through your donations and volunteer work, we spread kindness and support to children.
                            </p>
                            <a href="#!" class="btn btn-primary w-100 py-3"><i
                                    class="fa fa-plus me-2"></i>Donate
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --> <!-- Donation End -->


    <!-- Testimonial Start
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="testimonial-title">
                            <h1 class="display-6 mb-4">What People Say About Our Activities.</h1>
                            <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 col-xl-9">
                        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                            <div class="testimonial-item">
                                <div class="row g-5 align-items-center">
                                    <div class="col-md-6">
                                        <div class="testimonial-img">
                                            <img class="img-fluid"
                                                src="{{ asset('assets-admin/img/testimonial-1.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="testimonial-text pb-5 pb-md-0">
                                            <div class="mb-2">
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                            </div>
                                            <p class="fs-5">Education is the foundation of change. By funding
                                                schools,
                                                scholarships, and training programs, we can help children and adults
                                                unlock
                                                their potential for a better future.</p>
                                            <div class="d-flex align-items-center">
                                                <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                    <i class="fa fa-quote-right fa-2x"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h5 class="mb-0">Alexander Bell</h5>
                                                    <span>CEO, Founder</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="row g-5 align-items-center">
                                    <div class="col-md-6">
                                        <div class="testimonial-img">
                                            <img class="img-fluid" src="img/testimonial-2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="testimonial-text pb-5 pb-md-0">
                                            <div class="mb-2">
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                            </div>
                                            <p class="fs-5">Every hand extended in kindness brings us closer to a
                                                world
                                                free
                                                from suffering. Be part of a global movement dedicated to building a
                                                future
                                                where equality and compassion thrive.</p>
                                            <div class="d-flex align-items-center">
                                                <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                    <i class="fa fa-quote-right fa-2x"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h5 class="mb-0">Donald Pakura</h5>
                                                    <span>CEO, Founder</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="row g-5 align-items-center">
                                    <div class="col-md-6">
                                        <div class="testimonial-img">
                                            <img class="img-fluid" src="img/testimonial-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="testimonial-text pb-5 pb-md-0">
                                            <div class="mb-2">
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                                <i class="fa fa-star text-primary"></i>
                                            </div>
                                            <p class="fs-5">Love and compassion have the power to heal. Through your
                                                donations and volunteer work, we can spread kindness and support to
                                                children, families, and communities struggling to find stability.</p>
                                            <div class="d-flex align-items-center">
                                                <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                    <i class="fa fa-quote-right fa-2x"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h5 class="mb-0">Boris Johnson</h5>
                                                    <span>CEO, Founder</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Testimonial End -->

    <h1></h1>
    <h1></h1>
    <h1></h1>

    <!-- footer End -->
    @include('layouts.admin.footer')
    <!-- footer End -->


    <!-- js End -->
    @include('layouts.admin.js')
    <!-- js End -->
</body>

</html>
