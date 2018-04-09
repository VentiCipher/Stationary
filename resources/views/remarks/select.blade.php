@extends('layouts.app')
<link href='https://fonts.googleapis.com/css?family=Lato|Roboto:400,900' rel='stylesheet' type='text/css'>
@section('content')
<style>
.btn {
    position: relative;
    display: inline-block;
    width: 277px;
    height: 50px;
    font-size: 1em;
    font-weight: bold;
    line-height: 60px;
    text-align: center;
    text-transform: uppercase;
    background-color: transparent;
    cursor: pointer;
    text-decoration:none;
    font-family: 'Roboto', sans-serif;
    font-weight:900;
    font-size:17px;
    letter-spacing: 0.045em;
}

.btn svg {
    position: absolute;
    top: 0;
    left: 0;
}

.btn svg rect {
    //stroke: #EC0033;
    stroke-width: 4;
    stroke-dasharray: 353, 0;
    stroke-dashoffset: 0;
    -webkit-transition: all 600ms ease;
    transition: all 600ms ease;
}

.btn span{
  background: rgb(255,130,130);
  background: -moz-linear-gradient(left,  rgba(255,130,130,1) 0%, rgba(225,120,237,1) 100%);
  background: -webkit-linear-gradient(left,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  background: linear-gradient(to right,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8282', endColorstr='#e178ed',GradientType=1 );
  
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btn:hover svg rect {
    stroke-width: 4;
    stroke-dasharray: 196, 543;
    stroke-dashoffset: 437;
}
</style>
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('message1'))
    <div class="alert alert-info">{{ Session::get('message1') }}</div>
    @endif
    <!-- courses list -->
  
        <div class="row">
            <h3>Select Mode to explore</h3>
          
              <a href="{{route('admin.couses.routeremark')}}" class="btn">
              <svg width="277" height="62">
                <defs>
                    <linearGradient id="grad1">
                        <stop offset="0%" stop-color="#FF8282"/>
                        <stop offset="100%" stop-color="#E178ED" />
                    </linearGradient>
                </defs>
                 <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
              </svg>
              <!--<span>Voir mes réalisations</span>-->
                <span>View By Courses</span>
            </a>
     
              
          
              <a href="{{route('admin.courses.callcourse')}}" class="btn">
              <svg width="277" height="62">
                <defs>
                    <linearGradient id="grad1">
                        <stop offset="0%" stop-color="#FF8282"/>
                        <stop offset="100%" stop-color="#E178ED" />
                    </linearGradient>
                </defs>
                 <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
              </svg>
              <!--<span>Voir mes réalisations</span>-->
                <span>View By Users</span>
            </a>
         


            </div>
           </div>
        </div>

    </div>
</div>
@endsection