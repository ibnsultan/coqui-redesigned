@extends('layouts.public.app')
@section('title', 'Home')
@section('content')
        <!-- ==== banner start ==== -->
        <section class="section banner-one bg-img" data-background="/assets/images/banner/banner-one-bg-light.png">
            <div class="container">
                <div class="row items-gap align-items-center">
                    <div class="col-12 col-md-10 col-lg-6">
                        <div class="banner-one__content">
                            <p class="h6">
                                <span>Coqui AI</span>
                            </p>
                            <h1 class="h1">Your Complete Voice Recognition Toolkit</h1>
                            <div class="section__content-cta">
                                <a href="javascript:void(0)" class="btn btn--primary">
                                    Explore Demo
                                </a>
                                <a href="javascript:void(0)" class="btn btn--quaternary">
                                    Acquire License
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="banner-one__thumb text-start text-lg-end  wow fadeInRight">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-lg-8">
                                            <!--select name="language" class="form-control subject w-100" id="language">
                                                <option value="auto" hidden selected>Select Language</option>
                                                <option value="auto">Automatic</option>
                                                
                                                @ foreach ($langs as $lang)
                                                    <option value="{ {$lang->code} }">{ {$lang->name} }</option>
                                                @ endforeach
                                                
                                            </select-->
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <button type="button" id="synthesize" class="form-control bg-primary text-light">Generate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-1">
                                    <textarea maxlength="250" name="audioSample" id="audioSample" cols="30" rows="10" placeholder="write something here" class="form-control border-0 rounded" style="box-shadow: none !important"></textarea>
                                    <div class="maxChars">
                                        <span id="curCount">250 characters left</span>
                                    </div>
                                </div>
                                <div class="card-footer" style="background: #f1f3f4;">
                                    <div id="audioPlayer">
                                        <audio class="w-100" id="audioGen" controls>
                                            <source src="" type="audio/mpeg">
                                            Your browser does not support the audio tag.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / banner end ==== -->
        <!-- ==== overview start ==== -->
        <div class="overview">
            <div class="container">
                <div class="row items-gap">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="overview__single wow fadeInUp" data-wow-duration="600ms">
                            <img src="/assets/images/icons/overview-one.png" alt="Image">
                            <p class="h6">Text-to-Speech</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="overview__single wow fadeInUp" data-wow-duration="600ms" data-wow-delay="200ms">
                            <img src="/assets/images/icons/overview-two.png" alt="Image">
                            <p class="h6">Speech-to-Speech</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="overview__single wow fadeInUp" data-wow-duration="600ms" data-wow-delay="400ms">
                            <img src="/assets/images/icons/overview-three.png" alt="Image">
                            <p class="h6">Neural Editing</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="overview__single wow fadeInUp" data-wow-duration="600ms" data-wow-delay="600ms">
                            <img src="/assets/images/icons/overview-four.png" alt="Image">
                            <p class="h6">Language Dubbing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== / overview end ==== -->
        <!-- ==== voice start ==== -->
        <section class="section voice">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section__header--secondary">
                            <div class="row align-items-center items-gap">
                                <div class="col-12 col-lg-8">
                                    <h2 class="h2 wow fadeInUp" data-wow-duration="600ms">
                                        There's a voice for every need
                                    </h2>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="cmn-pagination cmn-pagination-light voice-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="voice__slider"> 
                            @foreach ($samples as $sample)
                                <div class="voice__slider-single {{$sample->bg}}">
                                    <div class="voice__slider-single-thumb">
                                        <img src="{{$sample->avatar}}" alt="" srcset="">
                                    </div>
                                    <div class="voice__slider-single-content">
                                        <h5 class="h5">{{$sample->name}}</h5>
                                        <div class="voice__slider-single-content-play">
                                            <button aria-label="play audio" class="play-track">
                                                <i class="fa-solid fa-play"></i>
                                            </button>
                                            <audio class="player" src="{{$sample->audio}}"></audio>
                                        </div>
                                    </div>
                                </div>
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / voice end ==== -->
        <!-- ==== clone start ==== -->
        <section class="section clone pt-0">
            <div class="container">
                <div class="row items-gap align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="clone__thumb wow fadeInUp" data-wow-duration="600ms" data-background="/assets/images/clone-arrow.png, assets/images/clone-bg.png">
                            <div class="clone__thumb-single">
                                <i class="fa-solid fa-signal"></i>
                                <div class="thumb">
                                    <img src="/assets/images/people/source-female.jpg" alt="Image">
                                </div>
                                <div class="content">
                                    <p>Source Audio</p>
                                    <p>Jenny</p>
                                </div>
                                <div class="voice__slider-single-content-play">
                                    <button aria-label="play audio" class="play-track">
                                        <i class="fa-solid fa-play"></i>
                                    </button>
                                    <audio class="player" src="/assets/audio/source-female.wav"></audio>
                                </div>
                                <span class="tag">Original voice</span>
                            </div>
                            <div class="text-end">
                                <div class="clone__thumb-single">
                                    <i class="fa-solid fa-signal"></i>
                                    <div class="thumb">
                                        <img src="/assets/images/people/clone-female.jpg" alt="Image">
                                    </div>
                                    <div class="content">
                                        <p>Output</p>
                                        <p>Jenny clone</p>
                                    </div>
                                    <div class="voice__slider-single-content-play">
                                        <button aria-label="play audio" class="play-track">
                                            <i class="fa-solid fa-play"></i>
                                        </button>
                                        <audio class="player" src="/assets/audio/clone-female.wav"></audio>
                                    </div>
                                    <span class="tag">Genarated voice</span>
                                </div>
                            </div>
                            <div class="anime">
                                <img src="/assets/images/anime-one.png" alt="Image" class="anime-one">
                                <img src="/assets/images/anime-two.png" alt="Image" class="anime-two">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="clone__content section__content">
                            <h2 class="h2 wow fadeInUp" data-wow-duration="600ms">
                                Pitch Perfect Voice Clones
                            </h2>
                            <div class="paragraph wow fadeInUp" data-wow-duration="600ms">
                                <p class="fw-5 text-lg">
                                    Coqui's AI voice generator lets you create realistic
                            human-like voiceovers in seconds.
                                </p>
                                <p>
                                    Create a spot-on match of the voice you like with Coqui.
                            Customize the voice by adjusting pitch, tone, speed, and
                            more to produce life-like narration for your content. Make
                            modifications to your script anytime during the creative
                                </p>
                            </div>
                            <ul class="wow fadeInUp" data-wow-duration="600ms">
                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Emotions
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Speech-To-Speech
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    Localize
                                </li>
                            </ul>
                            <div class="section__content-cta wow fadeInUp" data-wow-duration="600ms">
                                <a href="javascript:void(0)" class="btn btn--primary">
                                    Acquire License
                                </a>
                                <a href="javascript:void(0)" class="btn btn--quaternary">
                                    Request Demo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / clone end ==== -->
        
        <!-- ==== case start ==== -->
        <section class="section case-sec">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section__header--secondary">
                            <div class="row align-items-center items-gap">
                                <div class="col-12 col-lg-8">
                                    <h2 class="h2 wow fadeInUp" data-wow-duration="600ms" data-wow-delay="300ms">
                                        Use Cases
                                    </h2>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="case-pagination cmn-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="case__slider">
                            @foreach ($cases as $case)

                                <div class="case__slider-single">
                                    <div class="thumb">
                                        <i class="{{$case->icon}}"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="h5">{{$case->title}}</h5>
                                        <p>
                                            {{$case->short}}
                                        </p>
                                        <a href="javascript:void(0)">
                                            View Details
                                            <i class="fa-solid fa-angles-right"></i>
                                        </a>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== case start ==== -->
        <!-- ==== broadcast start ==== -->
        <section class="section broadcast pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 fix-scroll">
                        <div class="broadcast__inner wow fadeInUp" data-wow-duration="600ms" data-background="/assets/images/broadcast-bg.png">
                            <div class="row align-items-center items-gap-two">
                                <div class="col-12 col-xl-8 col-xxl-7">
                                    <div class="section__content broadcast__inner-content">
                                        <h2 class="h2">Insanely Powerfull & Easy To Use</h2>
                                        <div class="paragraph">
                                            <p>
                                                Embrace a seamless and intuitive experience as you harness the incredible potential of our technology, where complexity is tamed, and efficiency is elevated. our tools are not just powerful; They're user-friendly and very well documented
                                            </p>
                                        </div>
                                        <div class="section__content-cta">
                                            <a href="javascript:void(0)" class="btn btn--secondary">
                                                Acquire License
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4 col-xxl-5">
                                    <div class="broadcast__thumb text-xl-center">
                                        <img src="/assets/images/broadcast-thumb.png" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <div class="anime">
                                <img src="/assets/images/anime-three.png" alt="Image" class="anime-one">
                                <img src="/assets/images/anime-two.png" alt="Image" class="anime-two">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / broadcast end ==== -->
        <!-- ==== faq start ==== -->
        <section class="section faq faq-light pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-6">
                        <div class="section__header">
                            <h2 class="h2">frequently ask questions</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-10">
                        <div class="accordion" id="accordion">
                            <!--div class="accordion-item wow fadeInUp" data-wow-duration="600ms" data-wow-delay="900ms">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="collapseTwo"
                                    >
                                        How is Chatsonic different from ChatGPT by Open AI?
                                    </button>
                                </h5>
                                <div
                                    id="collapseTwo"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo"
                                    data-bs-parent="#accordion"
                                >
                                    <div class="accordion-body">
                                        <p>
                                            analyses the speaker's face and gaze during a video
                                conversation to maintain eye contact before changing the
                                camera position. io at a later time. Clear, consistent,
                                and professional voices for marketing, explainer,
                                product, and YouTube videos.
                                        </p>
                                    </div>
                                </div>
                            </div-->

                            @foreach ($faqs as $faq)

                                <div class="accordion-item wow fadeInUp" data-wow-duration="600ms" data-wow-delay="900ms">
                                    <h5 class="accordion-header" id="heading{{$faq->id}}">
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$faq->id}}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{$faq->id}}"
                                        >
                                            {{$faq->q}}
                                        </button>
                                    </h5>
                                    <div
                                        id="collapse{{$faq->id}}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="heading{{$faq->id}}"
                                        data-bs-parent="#accordion"
                                    >
                                        <div class="accordion-body">
                                            <p>
                                                {{$faq->a}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / faq end ==== -->
        <!-- ==== language start ==== -->
        <section class="section language pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <div class="section__header">
                            <h2 class="h2">Coqui is a Polyglot</h2>
                            <p>
                                Generate realistic Text to Speech (TTS) audio in multiple languages. Instantly
                                convert text in to natural-sounding speech and download as MP3
                                or WAV audio files.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="language__slider">
                <!--div class="language__slider-single">
                    <div class="thumb">
                        <img src="/assets/images/flag/canada.png" alt="Image">
                    </div>
                    <p class="fw-5">canada english</p>
                </div-->

                @foreach ($langs as $language)
                        
                    <div class="language__slider-single">
                        <div class="thumb">
                            <img src="{{$language->flag}}" alt="Image">
                        </div>
                        <p class="fw-5">{{$language->name}}</p>
                    </div>

                @endforeach
            </div>
            <div dir="rtl">
                <div class="language__slider-rtl">
                    @foreach ($langs as $language)
                        
                        <div class="language__slider-single">
                            <div class="thumb">
                                <img src="{{$language->flag}}" alt="Image">
                            </div>
                            <p class="fw-5">{{$language->name}}</p>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
        <!-- ==== / language end ==== -->
        <!-- ==== review start ==== -->
        <section class="section review review-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8">
                        <div class="section__header wow fadeInUp" data-wow-duration="600ms" data-wow-delay="300ms">
                            <h2 class="h2">our Customer Reviews</h2>
                        </div>
                    </div>
                </div>
                <div class="row items-gap">

                    @foreach ($reviews as $review)

                        <div class="col-12 col-lg-6">
                            <div class="review__single wow fadeInUp" data-wow-duration="600ms">
                                <div class="review-head">
                                    <div class="review__icons">
                                        {{$review->stars}}
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p class="fw-7">
                                        {{$review->review}}
                                    </p>
                                </div>
                                <div class="review-meta">
                                    <div class="thumb">
                                        <img src="{{$review->avatar}}" alt="Image">
                                    </div>
                                    <div class="content">
                                        <p class="h6">{{$review->name}}</p>
                                        <p>{{$review->role}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ==== / review end ==== -->
        <!-- ==== cta start ==== -->
        <section class="section cta bg-img ctaa">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-6">
                        <div class="section__header m-0 text-center wow fadeInUp" data-wow-duration="600ms" data-wow-delay="300ms">
                            <h2 class="h2">
                                Start creating a custom voice for your brand today
                            </h2>
                            <div class="form-cta">
                                <a href="javascript:void(0)" class="btn btn--quinary">
                                    Acquire your License
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <!-- ==== / cta end ==== -->
@endsection

@section('scripts')
    <script>
        // page ready
        $(document).ready(function(){

            $('#audioSample').keyup(function () {
                var max = 250;
                var len = $(this).val().length;
                if (len >= max) {
                    $('#curCount').text(' Max characters reached');
                } else {
                    var char = max - len;
                    $('#curCount').text(char + ' characters left');
                }
            });

            // on synthesize button click
            $('#synthesize').click(function(){
                
                // disable button and show loading
                $('#synthesize').attr('disabled', true);
                $('#synthesize').html('Loading...');

                // get text string
                var string = $('#audioSample').val();

                // string cannot be empty
                if(string == ''){
                    
                    // remove the attribute disabled
                    $('#synthesize').removeAttr('disabled');
                    $('#synthesize').html('Generate');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter a text to synthesize',
                    })

                    return false;                   
                    
                }

                // send to /api/tts
                $.ajax({
                    url: '/api/tts',
                    type: 'POST',
                    data: {
                        string: string
                    },
                    success: function (data) {
                        
                        // serialize data to json
                        var json = JSON.parse(data);

                        if(json.status == 'success'){

                            // set audio source | audio = json.data as base64
                            $('#audioGen').attr('src', 'data:audio/mpeg;base64,' + json.data);

                            // play audio
                            $('#audioGen')[0].play();

                            // remove the attribute disabled
                            $('#synthesize').removeAttr('disabled');
                            $('#synthesize').html('Generate');

                        }else{
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message,
                            })

                            $('#synthesize').removeAttr('disabled');
                            $('#synthesize').html('Generate');
                        }

                    }
                });

            });

        });


            
    </script>
@endsection