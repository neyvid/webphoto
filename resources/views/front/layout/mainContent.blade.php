@include('front.layout.carousel')

<div class="home-intro bg-primary" id="home-intro">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-8">
                <p>
                    The fastest way to grow your business with the leader in <span class="highlighted-word">Technology</span>
                    <span>Check out our options and features included.</span>
                </p>
            </div>
            <div class="col-lg-4">
                <div class="get-started text-start text-lg-end">
                    <a href="#" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a>
                    <div class="learn-more">or <a href="index.html">learn more.</a></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container">

    <div class="row text-center pt-3">
        <div class="col-md-10 mx-md-auto">
            <h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeInUpShorter">
                <span>Porto is </span>
                <span class="word-rotator-words bg-dark">
                    <b class="is-visible">incredibly</b>
                    <b>especially</b>
                    <b>extremely</b>
                </span>
                <span> beautiful and fully responsive.</span>
            </h1>
            <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
            </p>
        </div>
    </div>

</div>

<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
    <div class="home-concept mt-5">
        <div class="container">

            <div class="row text-center">
                <span class="sun"></span>
                <span class="cloud"></span>
                <div class="col-lg-2 ms-lg-auto">
                    <div class="process-image">
                        <img src={{ asset('/frontAsset/img/home/home-concept-item-1.png') }} alt="" />
                        <strong>Strategy</strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="process-image process-image-on-middle">
                        <img src={{ asset('/frontAsset/img/home/home-concept-item-2.png') }} alt="" />
                        <strong>Planning</strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="process-image">
                        <img src={{ asset('/frontAsset/img/home/home-concept-item-3.png') }} alt="" />
                        <strong>Build</strong>
                    </div>
                </div>
                <div class="col-lg-4 ms-lg-auto">
                    <div class="project-image">
                        <div id="fcSlideshow" class="fc-slideshow">
                            <ul class="fc-slides">
                                <li><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src={{ asset('/frontAsset/img/projects/project-home-1.jpg') }} alt="" /></a></li>
                                <li><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src={{ asset('/frontAsset/img/projects/project-home-2.jpg') }} alt="" /></a></li>
                                <li><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src={{ asset('/frontAsset/img/projects/project-home-3.jpg') }} alt="" /></a></li>
                            </ul>
                        </div>
                        <strong class="our-work">Our Work</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container mb-5 pb-4">
@include('front.layout.ourFeature')
</div>

<section class="section section-custom-map appear-animation lazyload" data-appear-animation="fadeInUpShorter" data-src-bg="img/map.png" style="background-color: transparent; background-position: center 0; background-repeat: no-repeat;">
    <section class="section section-default section-footer">
        <div class="container">
            <div class="row mt-5 appear-animation" data-appear-animation="fadeInUpShorter">
                <div class="col-lg-6">
                    <div class="recent-posts mb-5">
                        <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">Latest</strong> Posts</h2>
                        <div class="owl-carousel owl-theme dots-title mb-0" data-plugin-options="{'items': 1, 'autoHeight': true, 'autoplay': true, 'autoplayTimeout': 8000}">
                            <div class="row">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <article>
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <div class="date">
                                                    <span class="day font-weight-extra-bold">15</span>
                                                    <span class="month text-1">JAN</span>
                                                </div>
                                            </div>
                                            <div class="col ps-1">
                                                <h4 class="text-primary text-4"><a class="d-block" href="blog-post.html">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                <p class="pe-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="/" class="read-more text-color-dark font-weight-semibold text-2">read more <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-lg-6">
                                    <article>
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <div class="date">
                                                    <span class="day font-weight-extra-bold">14</span>
                                                    <span class="month text-1">JAN</span>
                                                </div>
                                            </div>
                                            <div class="col ps-1">
                                                <h4 class="text-primary text-4"><a class="d-block" href="blog-post.html">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                <p class="pe-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="/" class="read-more text-color-dark font-weight-semibold text-2">read more <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <article>
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <div class="date">
                                                    <span class="day font-weight-extra-bold">13</span>
                                                    <span class="month text-1">JAN</span>
                                                </div>
                                            </div>
                                            <div class="col ps-1">
                                                <h4 class="text-primary text-4"><a class="d-block" href="blog-post.html">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                <p class="pe-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="/" class="read-more text-color-dark font-weight-semibold text-2">read more <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-lg-6">
                                    <article>
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <div class="date">
                                                    <span class="day font-weight-extra-bold">12</span>
                                                    <span class="month text-1">JAN</span>
                                                </div>
                                            </div>
                                            <div class="col ps-1">
                                                <h4 class="text-primary text-4"><a class="d-block" href="blog-post.html">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                <p class="pe-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="/" class="read-more text-color-dark font-weight-semibold text-2">read more <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <article>
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <div class="date">
                                                    <span class="day font-weight-extra-bold">11</span>
                                                    <span class="month text-1">JAN</span>
                                                </div>
                                            </div>
                                            <div class="col ps-1">
                                                <h4 class="text-primary text-4"><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                <p class="pe-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="/" class="read-more text-color-dark font-weight-semibold text-2">read more <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-lg-6">
                                    <article>
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <div class="date">
                                                    <span class="day font-weight-extra-bold">10</span>
                                                    <span class="month text-1">JAN</span>
                                                </div>
                                            </div>
                                            <div class="col ps-1">
                                                <h4 class="text-primary text-4"><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                <p class="pe-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="/" class="read-more text-color-dark font-weight-semibold text-2">read more <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">What</strong> Client’s Say</h2>
                    <div class="row">
                        <div class="owl-carousel owl-theme dots-title dots-title-pos-2 mb-0" data-plugin-options="{'items': 1, 'autoHeight': true}">
                            <div>
                                <div class="col">
                                    <div class="testimonial testimonial-primary">
                                        <blockquote>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
                                        </blockquote>
                                        <div class="testimonial-arrow-down"></div>
                                        <div class="testimonial-author">
                                            <div class="testimonial-author-thumbnail">
                                                <img src="img/clients/client-1.jpg" class="rounded-circle" alt="" />
                                            </div>
                                            <p><strong>John Doe</strong><span>Okler</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col">
                                    <div class="testimonial testimonial-primary">
                                        <blockquote>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
                                        </blockquote>
                                        <div class="testimonial-arrow-down"></div>
                                        <div class="testimonial-author">
                                            <div class="testimonial-author-thumbnail">
                                                <img src="img/clients/client-1.jpg" class="rounded-circle" alt="" />
                                            </div>
                                            <p><strong>John Doe</strong><span>Okler</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>