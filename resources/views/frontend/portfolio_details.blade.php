@extends('frontend.main_master')

@section('main')

<main>



    <!-- portfolio-details-area -->
    <section class="services__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="services__details__thumb">
                        <img src="{{asset($PortDetails->protfolio_image)}}" alt="">
                    </div>
                    <div class="services__details__content">
                        <h2 class="title">{{$PortDetails->protfolio_title}}</h2>

                        <p>{!!$PortDetails->protfolio_description!!}</p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">
                        <div class="widget">
                            <h5 class="title">{{$PortDetails->protfolio_title}}</h5>
                            <form action="#" class="sidebar__contact">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter your mail*">
                                <textarea name="message" id="message" placeholder="Massage*"></textarea>
                                <button type="submit" class="btn">send massage</button>
                            </form>
                        </div>
                        <div class="widget">
                            <h5 class="title">Project Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Date :</span> January, 2021</li>
                                <li><span>Location :</span> East Meadow NY 11554</li>
                                <li><span>Client :</span> American</li>
                                <li class="cagegory"><span>Category :</span>
                                    <a href="portfolio.html">Photo,</a>
                                    <a href="portfolio.html">UI/UX</a>
                                </li>
                                <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="title">Contact Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                                <li><span>Mail :</span> yourmail@gmail.com</li>
                                <li><span>Phone :</span> +7464 0187 3535 645</li>
                                <li><span>Fax id :</span> +9 659459 49594</li>
                            </ul>
                            <ul class="sidebar__contact__social">
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-details-area-end -->


    <!-- contact-area -->

    <!-- contact-area-end -->

</main>

@endsection
