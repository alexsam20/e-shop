<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <style>
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
        h1 {
            text-align: center;
            color: darkblue;
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
    </style>
</head>
<body>
<h1>An Error Has Occurred</h1>
<a href="<?php echo HOME?>" class="btn-go-home" target="_blank">GO BACK HOME</a>
</body>
</html>
