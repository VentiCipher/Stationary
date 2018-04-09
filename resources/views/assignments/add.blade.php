
@extends('layouts.app')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
  <script type="text/javascript">
  $('#starttime').datetimepicker({
    format: 'YY-MM-DD HH:mm:ss'
  });
   $('#endtime').datetimepicker({
    format: 'YY-MM-DD HH:mm:ss'
  });

</script>  
<style>
.hideplz
{
    visibility: hidden;
}
</style>
@section('content')
<div class="container">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                    <h2>Create Assignment</h2>
                    <h5>* Required</h5>
                </div>
            </div>
            <div class="panel-body">
               
                <form action="{{ route('admin.assignments.create') }}" method="POST" class="form-horizontal " enctype="multipart/form-data">
                    {{ csrf_field() }} 
              
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Assignment Name* </label>

                        <div class="col-md-6">
                             <input type="hidden" name="courses_id" id="courses_id" class="form-control" required value="{{$id}}">

                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Compile language* </label>
                        &nbsp;
                        <select name="language" id="language">
                            <option value="c">GCC C</option>
                            <option value="java">JAVA JDK</option>
                            <option value="python">Python py</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Max Attempts</label>

                        <div class="col-md-1">
                            <input type="integer" name="max_attempts" id="max_attempts" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Full Score* </label>

                        <div class="col-md-1">
                            <input type="integer" name="fullscore" id="fullscore" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Allow Send Now ? </label>

                        <div class="col-md-6">
                              <input name="allow_send" type="checkbox" >
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label" >Question File*</label>

                        <div class="col-md-1">
                             <input class="field" id = "fpath" name="fpath" type="file" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Input File Set 1</label>

                        <div class="col-md-1">
                             <input class="field" id = "finput" name="finput" type="file">
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" >Input File Set 2</label>

                        <div class="col-md-1">
                             <input class="field" id = "finput2" name="finput2" type="file">
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" >Input File Set 3</label>

                        <div class="col-md-1">
                             <input class="field" id = "finput3" name="finput3" type="file">
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" >Input File Set 4</label>

                        <div class="col-md-1">
                             <input class="field" id = "finput4" name="finput4" type="file">
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" >Input File Set 5</label>

                        <div class="col-md-1">
                             <input class="field" id = "finput5" name="finput5" type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Output File (Key) Set 1</label>

                        <div class="col-md-1">
                             <input class="field" id = "foutput" name="foutput" type="file">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Output File (Key) Set 2</label>

                        <div class="col-md-1">
                             <input class="field" id = "foutput2" name="foutput2" type="file">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Output File (Key) Set 3</label>

                        <div class="col-md-1">
                             <input class="field" id = "foutput3" name="foutput3" type="file">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Output File (Key) Set 4</label>

                        <div class="col-md-1">
                             <input class="field" id = "foutput4" name="foutput4" type="file">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Output File (Key) Set 5</label>

                        <div class="col-md-1">
                             <input class="field" id = "foutput5" name="foutput5" type="file">
                        </div>
                    </div>
                    
                     
               <!-- This is Zone -->
                      <div class="form-group">
                      <label class="col-md-4 control-label" >Start </label>
               
                      <div class="col-md-5">


  <div>
      <label for="dropdate">Date</label>
      <!-- SDay -->
    <select name="SDay" id="SDay">
 <option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>  
</select>
    <token for="token1"> : </token>
 <!-- SMonth -->
    <select name="SMonth" id = "SMonth">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
   <token for="token2"> : </token>
     <!-- SYear-->
    <select name="SYear" id = "SYear">
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option>
<option value="2030">2030</option>
<option value="2031">2031</option>
<option value="2032">2032</option>
<option value="2033">2033</option>
<option value="2034">2034</option>
<option value="2035">2035</option>
<option value="2036">2036</option>
<option value="2037">2037</option>
<option value="2038">2038</option>
<option value="2039">2039</option>
<option value="2040">2040</option>
<option value="2041">2041</option>
<option value="2042">2042</option>
<option value="2043">2043</option>
<option value="2044">2044</option>
<option value="2045">2045</option>
<option value="2046">2046</option>
<option value="2047">2047</option>
<option value="2048">2048</option>
<option value="2049">2049</option>
<option value="2050">2050</option>
<option value="2051">2051</option>
<option value="2052">2052</option>
<option value="2053">2053</option>
<option value="2054">2054</option>
<option value="2055">2055</option>
<option value="2056">2056</option>
<option value="2057">2057</option>
<option value="2058">2058</option>
<option value="2059">2059</option>
<option value="2060">2060</option>
<option value="2061">2061</option>
<option value="2062">2062</option>
<option value="2063">2063</option>
<option value="2064">2064</option>
<option value="2065">2065</option>
<option value="2066">2066</option>
<option value="2067">2067</option>
<option value="2068">2068</option>
<option value="2069">2069</option>
<option value="2070">2070</option>
<option value="2071">2071</option>
<option value="2072">2072</option>
<option value="2073">2073</option>
<option value="2074">2074</option>
<option value="2075">2075</option>
<option value="2076">2076</option>
<option value="2077">2077</option>
<option value="2078">2078</option>
<option value="2079">2079</option>
<option value="2080">2080</option>
<option value="2081">2081</option>
<option value="2082">2082</option>
<option value="2083">2083</option>
<option value="2084">2084</option>
<option value="2085">2085</option>
<option value="2086">2086</option>
<option value="2087">2087</option>
<option value="2088">2088</option>
<option value="2089">2089</option>
<option value="2090">2090</option>
<option value="2091">2091</option>
<option value="2092">2092</option>
<option value="2093">2093</option>
<option value="2094">2094</option>
<option value="2095">2095</option>
<option value="2096">2096</option>
<option value="2097">2097</option>
<option value="2098">2098</option>
<option value="2099">2099</option>
<option value="2100">2100</option>
<option value="2101">2101</option>
<option value="2102">2102</option>
<option value="2103">2103</option>
<option value="2104">2104</option>
<option value="2105">2105</option>
<option value="2106">2106</option>
<option value="2107">2107</option>
<option value="2108">2108</option>
<option value="2109">2109</option>
<option value="2110">2110</option>
<option value="2111">2111</option>
<option value="2112">2112</option>
<option value="2113">2113</option>
<option value="2114">2114</option>
<option value="2115">2115</option>
<option value="2116">2116</option>
</select>
      </div>
   <!-- Line -->
  <p></p>
  <div>
      <label for="droptime">Time</label>
    <!-- SHour -->
    <select name="SHour" id = "SHour">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
</select>
    <kind for="kind1">Hours</kind>
   <token for="token1"> : </token>
     <!-- SMinute -->
    <select name="SMinute" id= "SMinute">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
    <kind for="kind2">Minutes</kind>
   <token for="token2"> : </token>
     <!-- SSecond -->
    <select name="SSecond" id = "SSecond">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
    <kind for="kind3">Seconds</kind>
        </div>





                      </div>
                      </div>
                        <!-- This is Zone -->
                      <!-- This is Zone -->
                      <div class="form-group">
                      <label class="col-md-4 control-label" >End </label>
               
                      <div class="col-md-5">

                            <div>
      <label for="dropdate">Date</label>
      <!-- EDay -->
    <select name="EDay" id = "EDay">
 <option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>  
</select>
    <token for="token1"> : </token>
 <!-- EMonth -->
    <select name="EMonth" id = "EMonth">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
   <token for="token2"> : </token>
     <!-- EYear-->
    <select name="EYear" id = "EYear">
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option>
<option value="2030">2030</option>
<option value="2031">2031</option>
<option value="2032">2032</option>
<option value="2033">2033</option>
<option value="2034">2034</option>
<option value="2035">2035</option>
<option value="2036">2036</option>
<option value="2037">2037</option>
<option value="2038">2038</option>
<option value="2039">2039</option>
<option value="2040">2040</option>
<option value="2041">2041</option>
<option value="2042">2042</option>
<option value="2043">2043</option>
<option value="2044">2044</option>
<option value="2045">2045</option>
<option value="2046">2046</option>
<option value="2047">2047</option>
<option value="2048">2048</option>
<option value="2049">2049</option>
<option value="2050">2050</option>
<option value="2051">2051</option>
<option value="2052">2052</option>
<option value="2053">2053</option>
<option value="2054">2054</option>
<option value="2055">2055</option>
<option value="2056">2056</option>
<option value="2057">2057</option>
<option value="2058">2058</option>
<option value="2059">2059</option>
<option value="2060">2060</option>
<option value="2061">2061</option>
<option value="2062">2062</option>
<option value="2063">2063</option>
<option value="2064">2064</option>
<option value="2065">2065</option>
<option value="2066">2066</option>
<option value="2067">2067</option>
<option value="2068">2068</option>
<option value="2069">2069</option>
<option value="2070">2070</option>
<option value="2071">2071</option>
<option value="2072">2072</option>
<option value="2073">2073</option>
<option value="2074">2074</option>
<option value="2075">2075</option>
<option value="2076">2076</option>
<option value="2077">2077</option>
<option value="2078">2078</option>
<option value="2079">2079</option>
<option value="2080">2080</option>
<option value="2081">2081</option>
<option value="2082">2082</option>
<option value="2083">2083</option>
<option value="2084">2084</option>
<option value="2085">2085</option>
<option value="2086">2086</option>
<option value="2087">2087</option>
<option value="2088">2088</option>
<option value="2089">2089</option>
<option value="2090">2090</option>
<option value="2091">2091</option>
<option value="2092">2092</option>
<option value="2093">2093</option>
<option value="2094">2094</option>
<option value="2095">2095</option>
<option value="2096">2096</option>
<option value="2097">2097</option>
<option value="2098">2098</option>
<option value="2099">2099</option>
<option value="2100">2100</option>
<option value="2101">2101</option>
<option value="2102">2102</option>
<option value="2103">2103</option>
<option value="2104">2104</option>
<option value="2105">2105</option>
<option value="2106">2106</option>
<option value="2107">2107</option>
<option value="2108">2108</option>
<option value="2109">2109</option>
<option value="2110">2110</option>
<option value="2111">2111</option>
<option value="2112">2112</option>
<option value="2113">2113</option>
<option value="2114">2114</option>
<option value="2115">2115</option>
<option value="2116">2116</option>
</select>
      </div>
   <!-- Line -->
  <p></p>
  <div>
      <label for="droptime">Time</label>
    <!-- EHour -->
    <select name="EHour" id = "EHour">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
</select>
    <kind for="kind1">Hours</kind>
   <token for="token1"> : </token>
     <!-- EMinute -->
    <select name="EMinute" id = "EMinute">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
    <kind for="kind2">Minutes</kind>
   <token for="token2"> : </token>
     <!-- ESecond -->
    <select name="ESecond" id = "ESecond">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
    <kind for="kind3">Seconds</kind>
        </div>





                      </div>
                      </div>
                        <!-- This is Zone -->


                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <input type="submit" class="btn btn-default"  value="Create Assignment" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
 
@endsection

