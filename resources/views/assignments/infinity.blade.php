@extends('layouts.app')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>INFINITY LOOP DETECT</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
               
                color: ##C2C2C2;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

  

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
                color:#0F0;
            }

            .semititle{
                font-size: 30px;
                color:#00000;
                font-weight: 600;
            }

            .midupdown
            {
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .entersite
            {
                margin-top: 100px;
                font-size: 22px;
                color:#00000;
                font-weight: 600;
            }
           .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 23px;
  padding: 20px;
  width: 300px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
            .links > a {
                color: #0F0;
               
                padding: 0 25px;
                font-size: 19px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .fixed
            {
                position: fixed;
                color:#fff;
                background: white;
                opacity:1;
            }
          
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
      


    @section('content')

    <div class = "fixed"><canvas id="c" width="1366" height="1366"></canvas></div>

<div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md">
                    <div class = "animated bounceInDown">
                   WTF<br>
                    </div>
                    <div class = "animated bounceInLeft">
                   THIS IS INFINITY
                    </div>
                     <div class = "animated bounceInRight">
                   LOOP DETECTED !
                    </div>
                </div>
               <div class = "entersite links animated bounceInUp">
                <button class="button" style="vertical-align:middle" >
                <a href="{{ route('user.assignments.indexmy',$courseid) }}"><span> GG WP GET BACK !  </span></button>
                
               </div>
                </div>
           

            </div>

        </div>




        

 <script>
        // geting canvas by id c
        var c = document.getElementById("c");
        var ctx = c.getContext("2d");
       // ctx.background : #000;
        //making the canvas full screen
        c.height = window.innerHeight;
        c.width = window.innerWidth;
        //chinese characters - taken from the unicode charset
        var rand = Math.floor((Math.random() * 5) + 1);
        var matrix = "E R R O R";
      
        //var matrix = "COLONEL CN302 0     ";
        
        //converting the string into an array of single characters
        matrix = matrix.split("");

        var font_size = 12;
        var columns = c.width / font_size; //number of columns for the rain
        //an array of drops - one per column
        var drops = [];
        //x below is the x coordinate
        //1 = y co-ordinate of the drop(same for every drop initially)
        for(var x = 0; x < columns; x++)
            drops[x] = 1; 

        //drawing the characters
        function draw()
        {
            //Black BG for the canvas
            //translucent BG to show trail
            ctx.fillStyle = "rgba(0, 0, 0, 0.04)";
            ctx.fillRect(0, 0, c.width, c.height);

            //ctx.fillStyle = "#FFFFFF"; //green text
            ctx.fillStyle = "#DF0101"; //green text
            ctx.font = font_size + "px arial";
            //looping over drops
            for( var i = 0; i < drops.length; i++ )
            {
                //a random chinese character to print
                var text = matrix[ Math.floor( Math.random() * matrix.length ) ];
                //x = i*font_size, y = value of drops[i]*font_size
                ctx.fillText(text, i * font_size, drops[i] * font_size);

                //sending the drop back to the top randomly after it has crossed the screen
                //adding a randomness to the reset to make the drops scattered on the Y axis
                if( drops[i] * font_size > c.height && Math.random() > 0.975 )
                    drops[i] = 0;

                //incrementing Y coordinate
                drops[i]++;
            }
        }

        //setInterval( draw, 35 );
        setInterval( draw, 25 );

        </script>
@endsectino

