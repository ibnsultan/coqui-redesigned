@extends('layouts.public.app')
@section('content')
    <section class="section cmn-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cmn-banner__content wow fadeInUp" data-wow-duration="600ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <h3 class="h3 text-dark mb-2">Blog</h3>
                        <h4 class="h4 text-muted">Your most favorite news feed</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="anime">
            <img src="assets/images/anime-one.png" alt="Image" class="one">
            <img src="assets/images/anime-two.png" alt="Image" class="two">
        </div>
    </section>

    <section class="section pb-0 news-section">
        <div class="container">
            
            <div class="row items-gap">
                @foreach ($blogs as $blog)

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="news__slider-item wow fadeInUp" data-wow-duration="600ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 600ms; animation-delay: 300ms; animation-name: fadeInUp;">
                            <div class="thumb" style="background:url({{ $blog->cover }}); height: 200px">
                                <!--div class="publish-date">
                                    <h4 class="h4">21</h4>
                                    <p>JAN</p>
                                </div-->
                            </div>
                            <div class="content" style="height: 166px">
                                <h6 class="h6">
                                    <a href="javascript:void(0)">
                                        {{$blog->title}}
                                    </a>
                                </h6>
                                <div>
                                    <a href="javascript:void(0)" data-title="{{$blog->title}}" data-url="{{$blog->link}}" class="text-primary offCanvas-lightbox">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </section>

    <div class="offcanvas offcanvas-bottom" style="height: 100vh" tabindex="-1" id="blogCanvas" aria-labelledby="blogCanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="blogCanvasLabel">Offcanvas bottom</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small blog-canvas">

            <div class="loading" id="loading">Loading</div>
            
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // when offCanvas-lightbox clicked
            $('.offCanvas-lightbox').click(function(){
                var url = $(this).data('url');

                // set the title
                $('#blogCanvasLabel').html($(this).data('title'));


                $('#blogCanvas').offcanvas('show');

                $('#loading').show();
                
                // wait for the iframe to fully load
                $('#blogCanvas').on('shown.bs.offcanvas', function () {
                    $('#loading').hide();
                    $('.blog-canvas').html('<iframe src="'+url+'" frameborder="0" style="width: 100%; height: 100%;"></iframe>');
                })
            });
        });
    </script>
@endsection