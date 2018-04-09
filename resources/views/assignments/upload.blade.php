

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Upload Assignment {{$asn->name}}</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
               
                color: #FFFFFF;
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
                font-size: 84px;
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
  background-color: #1ef49b;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
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
.bullshit
{
  color: #F00;
}
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
                opacity:0.7;
            }
          
            .m-b-md {
                margin-bottom: 30px;
            }



/* Loading */
#loader {
  /* Uncomment this to make it run! */
  /*
     animation: loader 5s linear infinite; 
  */
  z-index: 1001;
  position: absolute;
  top: calc(50% - 20px);
  left: calc(50% - 20px);
}
@keyframes loader {
  0% { left: -100px }
  100% { left: 110%; }
}
#box {
  width: 50px;
  height: 50px;
  background: #F12345;
  animation: animate .4s linear infinite;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 3px;
  z-index: 1000;
}
@keyframes animate {
  17% { border-bottom-right-radius: 3px; }
  25% { transform: translateY(9px) rotate(22.5deg); }
  50% {
    transform: translateY(18px) scale(1,.9) rotate(45deg) ;
    border-bottom-right-radius: 40px;
  }
  75% { transform: translateY(9px) rotate(67.5deg); }
  100% { transform: translateY(0) rotate(90deg); }
} 
#shadow { 
  width: 50px;
  height: 5px;
  background: #000;
  opacity: 0.1;
  position: absolute;
  top: 59px;
  left: 0;
  border-radius: 50%;
  animation: shadow .4s linear infinite;
  z-index: 999;
}
@keyframes shadow {
  50% {
    transform: scale(1.2,1);
  }
}


h4 {
  position: absolute;
  bottom: 20px;
  left: 20px;
  margin: 0;
  font-weight: 200;
  opacity: .5;
    font-family: sans-serif;
  color: #fff;
}
        </style>

       
    </head>
 
    <div class = "fixed"><canvas id="c" width="1366" height="1366"></canvas></div>
    <div id="loader" style ="visibility: hidden;">
  <div id="shadow"></div>
  <div id="box"></div>
</div>
<div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md animated bounceInLeft">
                   Assignment
                </div>
                <div class="title m-b-md animated bounceInRight" style="
    font-size: 60px;
">
                    {{$asn->name}}
                </div>
                <div class = "midupdown semititle  animated jello" style="
    font-weight:  200;
">Language : {{$asn->language}}</div>
                @if($asn->max_attempts != 0)
                <div class = "midupdown semititle  animated jello">Oops Limited Max Attempts : {{$asn->max_attempts}}</div>
                @else
                <div class = "midupdown semititle  animated jello"></div>
                @endif
                <div class = "midupdown semititle">
                    <form id = "formid" onsubmit="setup()" action="{{ route('user.assignments.push') }}" method="POST" class="form-horizontal "enctype="multipart/form-data" >
                         {{ csrf_field() }} 
                 <input type="hidden" name="id" id="id" class="form-control" required value="{{$asn->id}}">
                 <br>
                <input class="field" id = "users_ans" name="users_ans" type="file" required>
                <div class="form-group">
                    <br>
                        <div class="col-sm-offset-3 col-sm-10">
                            <input id = "submit" type="submit" class="btn btn-default animated rubberBand"  value="Upload Assignment"/>

                        </div>
                    </div>
                </form>
                </div>
                <button class="button" style="vertical-align:middle; font-size: 20px; padding: 14px;" >
                <a href="{{ route('user.assignments.indexmy',$courseid) }}"><span> Go Back  </span></button></a>
              <!--  <a class="button" href="{{ route('user.assignments.push',$asn->id) }} "><span> Upload Assignment </span></button>-->

            </div>

        </div>

 <script>

            function setup()
            {
              // alert("The Files was submitted");
              document.getElementById("submit").value = "Please Wait while we are Processing ...";
              document.getElementById("submit").disabled = true;
                  // $('submit').value = 'Please Wait we are Processing ...';
                  /*  document.getElementById("content").style.visibility = "hidden";
                  //  document.getElementById("c").style.visibility = "hidden";
                      document.getElementById("loader").style.visibility = "visible";
                      document.getElementById("box").style.visibility = "visible";
                      document.getElementById("shadow").style.visibility = "visible";
                      document.getElementById("footer-distributed").style.visibility = "hidden";
                       //document.getElementById('submit').click();
                    //document.getElementById("app").style.visibility = "visible";*/
                
            }
        </script>


        

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
        var matrix = "|      '     '    ' |       ' ";
      
        //var matrix = "COLONEL CN302 0     ";
        
        //converting the string into an array of single characters
        matrix = matrix.split("");

        var font_size = 14;
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
            ctx.fillStyle = "rgba(0, 0, 0, 0.23)";
            ctx.fillRect(0, 0, c.width, c.height);

            ctx.fillStyle = "#e2e2e2"; //green text
            //ctx.fillStyle = "#0F0"; //green text
           // ctx.fillStyle = "#F00"; //RED text
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
        setInterval( draw, 35 );

        </script>
    </body>
</html>

