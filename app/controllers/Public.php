<?php
class cPublic {

    function home(){

        view( 'public.home', [
            'title' => 'Home',
            'faqs' => load('mPublic')->getFaqs(),
            'langs' => load('mPublic')->getLangs(),
            'cases' => load('mPublic')->getCases(),
            'reviews' => load('mPublic')->getReviews(),
            'samples' => load('mPublic')->getSamples()
        ]);

    }

    function about(){

        view( 'public.about', [
            'title' => 'About',
            'company' => load('mPublic')->getAbout(),
            'trustees' => load('mPublic')->getTrustees()
        ]);

    }

    function blog(){

        view( 'public.blog', [
            'title' => 'Blog',
            'blogs' => load('mPublic')->getBlogs()
        ]);

    }

    function contact(){

        view( 'public.contact', [
            'title' => 'Contact'
        ]);

    }
}