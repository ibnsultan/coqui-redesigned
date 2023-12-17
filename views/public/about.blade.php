@extends('layouts.public.app')
@section('content')

    <section class="section clone about-main" style="background-image: url('/assets/images/bg.png')">
        <div class="container">
            <div class="row items-gap align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="about__thumb wow fadeInLeft" data-wow-duration="600ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                        <!--img src="assets/images/about-thumb.png" alt="Image"-->
                        <h2 class="h2">With whatever we do,<br> we are the best</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="clone__content section__content wow fadeInUp" data-wow-duration="600ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 600ms; animation-name: fadeInUp;">
                        <div class="m-5">-</div>
                        <div class="paragraph">
                            <p class="fw-5 text-lg">
                                Empowering Voices, Transforming Experiences
                            </p>
                            <p> {{$company->description}} </p>
                        </div>
                        <ul>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                Clone
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                Synthesize
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                Localize
                            </li>
                        </ul>
                        <div class="tour__content-cta">
                            <div class="trust">
                                <div class="review">
                                    ⭐⭐⭐⭐⭐
                                </div>
                                <p class="fw-7">Rated Excellent on Trustpilot</p>
                            </div>
                            <div class="action">
                                <a href="https://t.co/F2OsCp00iI" class="btn btn--primary">
                                    Get you Licence, Today!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sponsor section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sponsor__inner wow fadeInUp" data-wow-duration="600ms" data-wow-delay="300ms" data-background="assets/images/sponsor/sponsor-bg.png" style="background-image: url(&quot;assets/images/sponsor/sponsor-bg.png&quot;); visibility: visible; animation-duration: 600ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="section__header">
                            <h4 class="h4">Trusted by users and teams of all sizes</h4>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <div class="sponsor__slider slick-initialized slick-slider">                                    
                                    <div class="slick-list draggable" style="padding: 0px;">
                                        <div class="slick-track" style="opacity: 1; width: {{ count($trustees) * 172 }}px;">
                                            @foreach ($trustees as $index => $trustee)
                                                <div class="sponsor__slider-item slick-slide{{ $index >= count($trustees) - 6 ? ' slick-active' : '' }}" tabindex="-1" style="width: 172px;" data-slick-index="{{ $index }}" aria-hidden="{{ $index >= count($trustees) - 6 ? 'false' : 'true' }}">
                                                    <img src="{{ $trustee }}" alt="Image">
                                                </div>
                                            @endforeach
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

    <div class="section pt-0">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section__header">
                        <h3 class="h3">A little more about We</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-1">
                    <div class="clone__content section__content wow fadeInUp" data-wow-duration="600ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 600ms; animation-name: fadeInUp;">
                        <div class="card bg-light rounded border-0">
                            <div class="card-body">
                                <p class="small text-success ps-4">
                                    Our Story
                                </p>
                                <div class="row p-2 ps-4 pe-4">
                                    <div class="col-md-8 col-sm-12">
                                        {!! $company->story !!}
                                    </div>
                                    <div class="col-md-4 d-flex">
                                        <div class="d-flex align-items-center"> 
                                            <center><img src="{{ $company->story_image }}" class="w-25 d-block" style="text-align: -webkit-center;" alt="Image"></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-12 mt-5 mb-1">
                    <div class="clone__content section__content wow fadeInUp" data-wow-duration="600ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 600ms; animation-name: fadeInUp;">
                        <div class="card bg-light rounded border-0">
                            <div class="card-body">

                                <p class="small text-success ps-4">
                                    Our Name
                                </p>

                                <div class="row p-2 ps-4 pe-4">
                                    <div class="col-md-12">
                                        {!! $company->name !!}
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-12 mt-5 mb-1">
                    <div class="clone__content section__content wow fadeInUp" data-wow-duration="600ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 600ms; animation-name: fadeInUp;">
                        <div class="card bg-light rounded border-0">
                            <div class="card-body">

                                <p class="small text-success ps-4">
                                    Our Vision
                                </p>

                                <div class="row p-2 ps-4 pe-4">
                                    <div class="col-md-12">
                                        {!! $company->vision !!}
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    @include('layouts.public.partials.subscribe')

@endsection