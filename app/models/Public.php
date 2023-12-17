<?php
class mPublic {
    # storage files
    private $storage = [
        
        # partial data
        'faqs' => 'storage/data/faqs.json',
        'langs' => 'storage/data/langs.json',
        'cases' => 'storage/data/cases.json',
        'reviews' => 'storage/data/reviews.json',
        'samples' => 'storage/data/samples.json',
        'trustees' => 'storage/data/trustees.json',

        # page data
        'about' => 'storage/data/about.json',
        'blogs' => 'storage/data/blogs.json'
    ];

    # get faqs
    function getFaqs(){
        return json_decode(file_get_contents($this->storage['faqs']));
    }

    # get cases
    function getCases(){
        return json_decode(file_get_contents($this->storage['cases']));
    }

    # get reviews
    function getReviews(){
        return json_decode(file_get_contents($this->storage['reviews']));
    }

    # get samples
    function getSamples(){
        return json_decode(file_get_contents($this->storage['samples']));
    }

    # get About
    function getAbout(){
        return json_decode(file_get_contents($this->storage['about']));
    }

    # get Trustees
    function getTrustees(){
        return json_decode(file_get_contents($this->storage['trustees']));
    }

    # get blogs
    function getBlogs(){
        return json_decode(file_get_contents($this->storage['blogs']));
    }

    # get langs
    function getLangs(){
        return json_decode(file_get_contents($this->storage['langs']));
    }
}