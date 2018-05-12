
<!DOCTYPE html>
<html>
<body>
<img src="{{url('/images/logo.png')}}" style="width: 150%;margin-left: -100px;">
<br>
<h1>Dear, {{ $name }}</h1>
<br>
<h3>This is Rewards Update!</h3>
<p>Because you are special customer that bought our product reach VIP price range!</p>
<p>With Promotion Code: {{$coupon}}</p>
<p>Information: {{$couponitem->info}}</p>
<br>
<p>@if(!is_null($couponitem->freeship))With Free shipping when shop upto {{$couponitem->freeship}}BHT!@endif</p>
<p>@if(($couponitem->salemore !=0))and Discount: {{$couponitem->salemore}}BHT!@endif</p>
<br>
<p>Check this promotion on website out now ! </p>
<br><br>
<p>Sending Mail from TryThis Stationary.</p>
</body>
</html>