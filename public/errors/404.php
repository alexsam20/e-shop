<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404</title>

    <style id="" media="all">
        @import url('https://fonts.googleapis.com/css?family=Dosis:300,400,500');

        @-moz-keyframes rocket-movement { 100% {-moz-transform: translate(1200px,-600px);} }
        @-webkit-keyframes rocket-movement {100% {-webkit-transform: translate(1200px,-600px); } }
        @keyframes rocket-movement { 100% {transform: translate(1200px,-600px);} }
        @-moz-keyframes spin-earth { 100% { -moz-transform: rotate(-360deg); transition: transform 20s;  } }
        @-webkit-keyframes spin-earth { 100% { -webkit-transform: rotate(-360deg); transition: transform 20s;  } }
        @keyframes spin-earth{ 100% { -webkit-transform: rotate(-360deg); transform:rotate(-360deg); transition: transform 20s; } }

        @-moz-keyframes move-astronaut {
            100% { -moz-transform: translate(-160px, -160px);}
        }
        @-webkit-keyframes move-astronaut {
            100% { -webkit-transform: translate(-160px, -160px);}
        }
        @keyframes move-astronaut{
            100% { -webkit-transform: translate(-160px, -160px); transform:translate(-160px, -160px); }
        }
        @-moz-keyframes rotate-astronaut {
            100% { -moz-transform: rotate(-720deg);}
        }
        @-webkit-keyframes rotate-astronaut {
            100% { -webkit-transform: rotate(-720deg);}
        }
        @keyframes rotate-astronaut{
            100% { -webkit-transform: rotate(-720deg); transform:rotate(-720deg); }
        }

        @-moz-keyframes glow-star {
            40% { -moz-opacity: 0.3;}
            90%,100% { -moz-opacity: 1; -moz-transform: scale(1.2);}
        }
        @-webkit-keyframes glow-star {
            40% { -webkit-opacity: 0.3;}
            90%,100% { -webkit-opacity: 1; -webkit-transform: scale(1.2);}
        }
        @keyframes glow-star{
            40% { -webkit-opacity: 0.3; opacity: 0.3;  }
            90%,100% { -webkit-opacity: 1; opacity: 1; -webkit-transform: scale(1.2); transform: scale(1.2); border-radius: 999999px;}
        }

        .spin-earth-on-hover{

            transition: ease 200s !important;
            transform: rotate(-3600deg) !important;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* hebrew */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* hebrew */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/opensans/v35/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        html, body{
            margin: 0;
            width: 100%;
            height: 100%;
            font-family: 'Dosis', sans-serif;
            font-weight: 300;
            -webkit-user-select: none; /* Safari 3.1+ */
            -moz-user-select: none; /* Firefox 2+ */
            -ms-user-select: none; /* IE 10+ */
            user-select: none; /* Standard syntax */
        }

        .bg-purple{
            background: url(http://salehriaz.com/404Page/img/bg_purple.png);
            background-repeat: repeat-x;
            background-size: cover;
            background-position: left top;
            height: 100%;
            overflow: hidden;

        }

        .custom-navbar{
            padding-top: 15px;
        }

        .brand-logo{
            margin-left: 25px;
            margin-top: 5px;
            display: inline-block;
        }

        /*.navbar-links{*/
        /*    display: inline-block;*/
        /*    float: right;*/
        /*    margin-right: 15px;*/
        /*    text-transform: uppercase;*/


        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            /*    overflow: hidden;*/
            display: flex;
            align-items: center;
        }

        li {
            float: left;
            padding: 0px 15px;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            text-decoration: none;
            letter-spacing : 2px;
            font-size: 12px;

            -webkit-transition: all 0.3s ease-in;
            -moz-transition: all 0.3s ease-in;
            -ms-transition: all 0.3s ease-in;
            -o-transition: all 0.3s ease-in;
            transition: all 0.3s ease-in;
        }

        li a:hover {
            color: #ffcb39;
        }

        .btn-request{
            padding: 10px 25px;
            border: 1px solid #FFCB39;
            border-radius: 100px;
            font-weight: 400;
        }

        .btn-request:hover{
            background-color: #FFCB39;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0px 20px 20px rgba(0,0,0,0.1);
        }

        .btn-go-home{
            position: relative;
            z-index: 200;
            margin: 15px auto;
            width: 100px;
            padding: 10px 15px;
            border: 1px solid #FFCB39;
            border-radius: 100px;
            font-weight: 400;
            display: block;
            color: white;
            text-align: center;
            text-decoration: none;
            letter-spacing : 2px;
            font-size: 11px;

            -webkit-transition: all 0.3s ease-in;
            -moz-transition: all 0.3s ease-in;
            -ms-transition: all 0.3s ease-in;
            -o-transition: all 0.3s ease-in;
            transition: all 0.3s ease-in;
        }

        .btn-go-home:hover{
            background-color: #FFCB39;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0px 20px 20px rgba(0,0,0,0.1);
        }

        .central-body{
            /*    width: 100%;*/
            padding: 17% 5% 10% 5%;
            text-align: center;
        }

        .objects img{
            z-index: 90;
            pointer-events: none;
        }

        .object_rocket{
            z-index: 95;
            position: absolute;
            transform: translateX(-50px);
            top: 75%;
            pointer-events: none;
            animation: rocket-movement 200s linear infinite both running;
        }

        .object_earth{
            position: absolute;
            top: 20%;
            left: 15%;
            z-index: 90;
            /*    animation: spin-earth 100s infinite linear both;*/
        }

        .object_moon{
            position: absolute;
            top: 12%;
            left: 25%;
            /*
                transform: rotate(0deg);
                transition: transform ease-in 99999999999s;
            */
        }

        .earth-moon{

        }

        .object_astronaut{
            animation: rotate-astronaut 200s infinite linear both alternate;
        }

        .box_astronaut{
            z-index: 110 !important;
            position: absolute;
            top: 60%;
            right: 20%;
            will-change: transform;
            animation: move-astronaut 50s infinite linear both alternate;
        }

        .image-404{
            position: relative;
            z-index: 100;
            pointer-events: none;
        }

        .stars{
            background: url(http://salehriaz.com/404Page/img/overlay_stars.svg);
            background-repeat: repeat;
            background-size: contain;
            background-position: left top;
        }

        .glowing_stars .star{
            position: absolute;
            border-radius: 100%;
            background-color: #fff;
            width: 3px;
            height: 3px;
            opacity: 0.3;
            will-change: opacity;
        }

        .glowing_stars .star:nth-child(1){
            top: 80%;
            left: 25%;
            animation: glow-star 2s infinite ease-in-out alternate 1s;
        }
        .glowing_stars .star:nth-child(2){
            top: 20%;
            left: 40%;
            animation: glow-star 2s infinite ease-in-out alternate 3s;
        }
        .glowing_stars .star:nth-child(3){
            top: 25%;
            left: 25%;
            animation: glow-star 2s infinite ease-in-out alternate 5s;
        }
        .glowing_stars .star:nth-child(4){
            top: 75%;
            left: 80%;
            animation: glow-star 2s infinite ease-in-out alternate 7s;
        }
        .glowing_stars .star:nth-child(5){
            top: 90%;
            left: 50%;
            animation: glow-star 2s infinite ease-in-out alternate 9s;
        }

        @media only screen and (max-width: 600px){
            .navbar-links{
                display: none;
            }

            .custom-navbar{
                text-align: center;
            }

            .brand-logo img{
                width: 120px;
            }

            .box_astronaut{
                top: 70%;
            }

            .central-body{
                padding-top: 25%;
            }
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="robots" content="noindex, follow">
    <script nonce="384bd511-0989-4ac9-9ab6-349abc9fe268">(function(w,d){!function(f,g,h,i){f[h]=f[h]||{};f[h].executed=[];f.zaraz={deferred:[],listeners:[]};f.zaraz.q=[];f.zaraz._f=function(j){return function(){var k=Array.prototype.slice.call(arguments);f.zaraz.q.push({m:j,a:k})}};for(const l of["track","set","debug"])f.zaraz[l]=f.zaraz._f(l);f.zaraz.init=()=>{var m=g.getElementsByTagName(i)[0],n=g.createElement(i),o=g.getElementsByTagName("title")[0];o&&(f[h].t=g.getElementsByTagName("title")[0].text);f[h].x=Math.random();f[h].w=f.screen.width;f[h].h=f.screen.height;f[h].j=f.innerHeight;f[h].e=f.innerWidth;f[h].l=f.location.href;f[h].r=g.referrer;f[h].k=f.screen.colorDepth;f[h].n=g.characterSet;f[h].o=(new Date).getTimezoneOffset();if(f.dataLayer)for(const s of Object.entries(Object.entries(dataLayer).reduce(((t,u)=>({...t[1],...u[1]})),{})))zaraz.set(s[0],s[1],{scope:"page"});f[h].q=[];for(;f.zaraz.q.length;){const v=f.zaraz.q.shift();f[h].q.push(v)}n.defer=!0;for(const w of[localStorage,sessionStorage])Object.keys(w||{}).filter((y=>y.startsWith("_zaraz_"))).forEach((x=>{try{f[h]["z_"+x.slice(7)]=JSON.parse(w.getItem(x))}catch{f[h]["z_"+x.slice(7)]=w.getItem(x)}}));n.referrerPolicy="origin";n.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(f[h])));m.parentNode.insertBefore(n,m)};["complete","interactive"].includes(g.readyState)?zaraz.init():f.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>

<body class="bg-purple">

<div class="stars">
    <div class="custom-navbar">
        <div class="brand-logo">
            <img src="<?php echo IMAGE;?>/404/logo.svg" width="80px">
        </div>
<!--        <div class="navbar-links">-->
<!--        </div>-->
    </div>
    <div class="central-body">
        <img class="image-404" src="<?php echo IMAGE;?>/404/404.svg" width="300px">
        <a href="<?php echo HOME?>" class="btn-go-home" target="_blank">GO BACK HOME</a>
    </div>
    <div class="objects">
        <img class="object_rocket" src="<?php echo IMAGE;?>/404/rocket.svg" width="40px">
        <div class="earth-moon">
            <img class="object_earth" src="<?php echo IMAGE;?>/404/earth.svg" width="100px">
            <img class="object_moon" src="<?php echo IMAGE;?>/404/moon.svg" width="80px">
        </div>
        <div class="box_astronaut">
            <img class="object_astronaut" src="<?php echo IMAGE;?>/404/astronaut.svg" width="140px">
        </div>
    </div>
    <div class="glowing_stars">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>

    </div>

</div>

</body>
</html>