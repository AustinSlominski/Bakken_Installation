<?php

// ctwitter_max3.php
//
// this code replaces twitterStreamMaxGeo.php for the Twitter v1.1 API requiring Oauth
//
// You will need to create a Twitter App from your account and replace the fields below with
// your: consumer key, consumer secret, access token, and access secret - strings
//
// A simple class to access the Twitter streaming API, with OAuth authentication
//
//	Mike (mike@mikepultz.com)
//
// Simple Example:
require 'osc-twitter-api.php';

$terms = array();
foreach ($argv as $key => $value) {
    if ($key > 0) {
        array_push($terms, $value);
    }
}

    $t = new TwitterStream();
    $t->login('SYCXESOYdnvDB1rIBQ6ZyCMwa', 'K9A35CvGMKYYFk9jGCb6iIsrusj3Tkz4dm9CsOzTXstKPFlcRa', '258501539-nRYu3JTfSs5t4VB8OXClL1e8nWIbctkzsAlrQU79', 'VLVGCYQx54NMJZkarHgvLBZKEyP798WNheSrt0DNUy5rI');
    $t->start($terms);
    $t->start(array(), array('-180','-90','180','90'));    // search entire world for geo-coded tweets;
