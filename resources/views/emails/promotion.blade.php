
<!DOCTYPE html>
<html>
<body>
<img src="{{url('/images/logo.png')}}" style="width: 150%;margin-left: -100px;">
<br>
<h1>Dear, {{ $name }}</h1>
<br>
<h3>This is Promotion Update!</h3>
<p>With Promotion Code: {{$newpro->promocoder}}</p>
<p>Information: {{$newpro->info}}</p>
<br>
<p>@if(!is_null($newpro->freeship))With Free shipping when shop upto {{$newpro->freeship}}BHT!@endif</p>
<p>@if(($newpro->salemore !=0))and Discount: {{$newpro->salemore}}BHT!@endif</p>
<br>
<p>Check this promotion on website out now ! </p>
<br><br>
<p>Sending Mail from TryThis Stationary.</p>
</body>
</html>