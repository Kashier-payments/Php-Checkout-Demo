<?php
return array(
    "mode" => "staging-test",
    "live-live" => array(
        baseUrl => "https://iframe.kashier.io",
        iFrameSecret => "",
        HPPSecret =>"",        
        mid => ""
    ),
    "live-test" => array(
        baseUrl => "https://test-iframe.kashier.io",
        iFrameSecret => "",
        HPPSecret => "",        
        mid => ""
    ),
    "staging-live" => array(
        baseUrl => "https://iframe.payformance.io",
        iFrameSecret => "",
        HPPSecret => "",        
        mid => ""
    ),
    "staging-test"=> array(
        baseUrl => "https://test-iframe.payformance.io",
        iFrameSecret => "285126c8-cb13-4ef5-bb02-491144145b97",
        HPPSecret => "cdfd5c4c-4ddd-4fb7-9460-1f393a4bd2b6",
        mid=>"MID-24-989"
    )
);