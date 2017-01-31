@extends('layouts.admin')

@section('content')
<link href="../admin/assets/order_styles/styles.css" rel="stylesheet" type="text/css">
<script>
$(document).ready(function(){
    $('#vas_per_page_0').change(function(){
        if($(this).prop('checked') === true){
           $('#topwriter').val($(this).attr('value'));
        }else{
             $('#topwriter').val('');
        }
    });
  $('#o_interval').change(function(){
        if($(this).prop('checked') === true){
           $('#spacing').val($(this).attr('value'));
        }else{
             $('#spacing').val('');
        }
    });

  $('#vas_per_order_1').change(function(){
        if($(this).prop('checked') === true){
           $('#vip_support').val($(this).attr('value'));
        }else{
             $('#vip_support').val('');
        }
    });

});
</script>
@if(Auth::user()->hasRole('client'))
    <div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">Create New Order</h3>

            <div class="md-card">
             @if(Session::has('success_message'))
                          <div class="uk-alert uk-alert-success">{!! session('success_message') !!}</div>
                         @endif

  <div class="md-card-content large-padding">
  <form action="{{URL::route('create_order')}}" method="post"  name="placeOrderForm" id="placeOrderForm" >
  {{ csrf_field() }}
 <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-2">
  <div class="parsley-row">
    <label for="email">Title<br></label>
    <input type="text" id="topic" name="topic" value="{{ old('topic') }}" data-parsley-trigger="change" class="form-control" required="text" />
     @if ($errors->has('topic'))
          <span class="help-block" style="color:#a94442">
           <strong>{{ $errors->first('topic') }}</strong>
          </span>
      @endif
  </div>
</div>

<div class="uk-width-medium-1-2">
          <div class="parsley-row">
          <label for="fullname">Subject or Discipline<br></label>
         <select id="select_demo_2" title="Subject area" required="" class="form-control" name="order_category" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();" value="{{ old('order_category') }}">
        <option value="" selected=""></option>
        <option value="10">Art</option>
        <option value="12">&nbsp;&nbsp;Architecture</option>
        <option value="15">&nbsp;&nbsp;Dance</option>
        <option value="17">&nbsp;&nbsp;Design Analysis</option>
        <option value="13">&nbsp;&nbsp;Drama</option>
        <option value="16">&nbsp;&nbsp;Movies</option>
        <option value="18">&nbsp;&nbsp;Music</option>
        <option value="11">&nbsp;&nbsp;Paintings</option>
        <option value="14">&nbsp;&nbsp;Theatre</option>
        <option value="112">Biology</option>
        <option value="52">Business</option>
        <option value="111">Chemistry</option>
        <option value="102">Communications and Media</option>
        <option value="105">&nbsp;&nbsp;Advertising</option>
        <option value="107">&nbsp;&nbsp;Communication Strategies</option>
        <option value="103">&nbsp;&nbsp;Journalism</option>
        <option value="104">&nbsp;&nbsp;Public Relations</option>
        <option value="115">Creative writing</option>
        <option value="53">Economics</option>
        <option value="60">&nbsp;&nbsp;Accounting</option>
        <option value="61">&nbsp;&nbsp;Case Study</option>
        <option value="58">&nbsp;&nbsp;Company Analysis</option>
        <option value="62">&nbsp;&nbsp;E-Commerce</option>
        <option value="59">&nbsp;&nbsp;Finance</option>
        <option value="57">&nbsp;&nbsp;Investment</option>
        <option value="63">&nbsp;&nbsp;Logistics</option>
        <option value="64">&nbsp;&nbsp;Trade</option>
        <option value="87">Education</option>
        <option value="93">&nbsp;&nbsp;Application Essay</option>
        <option value="89">&nbsp;&nbsp;Education Theories</option>
        <option value="88">&nbsp;&nbsp;Pedagogy</option>
        <option value="90">&nbsp;&nbsp;Teacher's Career</option>
        <option value="67">Engineering</option>
        <option value="9">English</option>
        <option value="24">Ethics</option>
        <option value="36">History</option>
        <option value="38">&nbsp;&nbsp;African-American Studies</option>
        <option value="37">&nbsp;&nbsp;American History</option>
        <option value="42">&nbsp;&nbsp;Asian Studies</option>
        <option value="41">&nbsp;&nbsp;Canadian Studies</option>
        <option value="44">&nbsp;&nbsp;East European Studies</option>
        <option value="45">&nbsp;&nbsp;Holocaust</option>
        <option value="40">&nbsp;&nbsp;Latin-American Studies</option>
        <option value="39">&nbsp;&nbsp;Native-American Studies</option>
        <option value="43">&nbsp;&nbsp;West European Studies</option>
        <option value="47">Law</option>
        <option value="49">&nbsp;&nbsp;Criminology</option>
        <option value="48">&nbsp;&nbsp;Legal Issues</option>
        <option value="7">Linguistics</option>
        <option value="2">Literature</option>
        <option value="4">&nbsp;&nbsp;American Literature</option>
        <option value="5">&nbsp;&nbsp;Antique Literature</option>
        <option value="6">&nbsp;&nbsp;Asian Literature</option>
        <option value="3">&nbsp;&nbsp;English Literature</option>
        <option value="116">&nbsp;&nbsp;Shakespeare Studies</option>
        <option value="54">Management</option>
        <option value="56">Marketing</option>
        <option value="51">Mathematics</option>
        <option value="94">Medicine and Health</option>
        <option value="99">&nbsp;&nbsp;Alternative Medicine</option>
        <option value="97">&nbsp;&nbsp;Healthcare</option>
        <option value="101">&nbsp;&nbsp;Nursing</option>
        <option value="95">&nbsp;&nbsp;Nutrition</option>
        <option value="100">&nbsp;&nbsp;Pharmacology</option>
        <option value="96">&nbsp;&nbsp;Sport</option>
        <option value="78">Nature</option>
        <option value="85">&nbsp;&nbsp;Agricultural Studies</option>
        <option value="113">&nbsp;&nbsp;Anthropology</option>
        <option value="86">&nbsp;&nbsp;Astronomy</option>
        <option value="83">&nbsp;&nbsp;Environmental Issues</option>
        <option value="79">&nbsp;&nbsp;Geography</option>
        <option value="80">&nbsp;&nbsp;Geology</option>
        <option value="28">Philosophy</option>
        <option value="110">Physics</option>
        <option value="29">Political Science</option>
        <option value="21">Psychology</option>
        <option value="108">Religion and Theology</option>
        <option value="22">Sociology</option>
        <option value="65">Technology</option>
        <option value="71">&nbsp;&nbsp;Aeronautics</option>
        <option value="70">&nbsp;&nbsp;Aviation</option>
        <option value="72">&nbsp;&nbsp;Computer Science</option>
        <option value="73">&nbsp;&nbsp;Internet</option>
        <option value="75">&nbsp;&nbsp;IT Management</option>
        <option value="77">&nbsp;&nbsp;Web Design</option>
        <option value="114">Tourism</option>
  </select>
  @if ($errors->has('order_category'))
      <span class="help-block" style="color:#a94442">
      <strong>{{ $errors->first('order_category') }}</strong>
   </span>
  @endif
    </div>
</div>
</div>


<div class="uk-grid" data-uk-grid-margin>
<div class="uk-width-medium-1-2">
<div class="parsley-row">
  <label for="worktype">Type of document<br></label>
  <select name="doctype_x" id="doctype_x"  class="form-control" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">


    <option value="1">Essay</option>

    <option value="2">Term Paper</option>

    <option value="3">Research Paper</option>

    <option value="4">Coursework</option>

    <option selected="selected" value="5">Book Report</option>

    <option value="6">Book Review</option>

    <option value="7">Movie Review</option>

    <option value="8">Dissertation</option>

    <option value="9">Thesis</option>

    <option value="10">Thesis Proposal</option>

    <option value="11">Research Proposal</option>

    <option value="12">Dissertation Chapter - Abstract</option>

    <option value="13">Dissertation Chapter -  Introduction</option>

    <option value="14">Dissertation Chapter - Literature Review</option>

    <option value="15">Dissertation Chapter - Methodology</option>

    <option value="16">Dissertation Chapter - Results</option>

    <option value="17">Dissertation Chapter - Discussion</option>

    <option value="18">Dissertation Services - Editing</option>

    <option value="19">Dissertation Services - Proofreading</option>

    <option value="20">Formatting</option>

    <option value="21">Admission Services - Admission Essay</option>

    <option value="22">Admission Services - Scholarship Essay</option>

    <option value="23">Admission Services - Personal Statement</option>

    <option value="24">Admission Services - Editing</option>

    <option value="25">Editing</option>

    <option value="26">Proofreading</option>

    <option value="27">Case Study</option>

    <option value="28">Lab Report</option>

    <option value="29">Speech Presentation</option>

    <option value="30">Math Problem</option>

    <option value="31">Article</option>

    <option value="32">Article Critique</option>

    <option value="33">Annotated Bibliography</option>

    <option value="34">Reaction Paper</option>

    <option value="35">PowerPoint Presentation</option>

    <option value="36">Statistics Project</option>

    <option value="37">Multiple Choice Questions (None-Time-Framed)</option>

    <option value="38">Other (Not listed)</option>
  </select>
  @if ($errors->has('doctype_x'))
    <span class="help-block" style="color:#a94442">
     <strong>{{ $errors->first('doctype_x') }}</strong>
    </span>
@endif
      </div>
    </div>

  <div class="uk-width-medium-1-2">
  <div class="parsley-row">
  <label for="worktype">Number of pages/words:<br></label>
 <select title="Number of pages" class="form-control" required="" name="numpages" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">

  <option value="1">1 page/approx 550 words</option>

  <option value="2">2 pages/approx 1100 words</option>

  <option value="3">3 pages/approx 1650 words</option>

  <option value="4">4 pages/approx 2200 words</option>

  <option value="5">5 pages/approx 2750 words</option>

  <option value="6">6 pages/approx 3300 words</option>

  <option value="7">7 pages/approx 3850 words</option>

  <option value="8">8 pages/approx 4400 words</option>

  <option value="9">9 pages/approx 4950 words</option>

  <option value="10">10 pages/approx 5500 words</option>

  <option value="11">11 pages/approx 6050 words</option>

  <option value="12">12 pages/approx 6600 words</option>

  <option value="13">13 pages/approx 7150 words</option>

  <option value="14">14 pages/approx 7700 words</option>

  <option value="15">15 pages/approx 8250 words</option>

  <option value="16">16 pages/approx 8800 words</option>

  <option value="17">17 pages/approx 9350 words</option>

  <option value="18">18 pages/approx 9900 words</option>

  <option value="19">19 pages/approx 10450 words</option>

  <option value="20">20 pages/approx 11000 words</option>

  <option value="21">21 pages/approx 11550 words</option>

  <option value="22">22 pages/approx 12100 words</option>

  <option value="23">23 pages/approx 12650 words</option>

  <option value="24">24 pages/approx 13200 words</option>

  <option value="25">25 pages/approx 13750 words</option>

  <option value="26">26 pages/approx 14300 words</option>

  <option value="27">27 pages/approx 14850 words</option>

  <option value="28">28 pages/approx 15400 words</option>

  <option value="29">29 pages/approx 15950 words</option>

  <option value="30">30 pages/approx 16500 words</option>

  <option value="31">31 pages/approx 17050 words</option>

  <option value="32">32 pages/approx 17600 words</option>

  <option value="33">33 pages/approx 18150 words</option>

  <option value="34">34 pages/approx 18700 words</option>

  <option value="35">35 pages/approx 19250 words</option>

  <option value="36">36 pages/approx 19800 words</option>

  <option value="37">37 pages/approx 20350 words</option>

  <option value="38">38 pages/approx 20900 words</option>

  <option value="39">39 pages/approx 21450 words</option>

  <option value="40">40 pages/approx 22000 words</option>

  <option value="41">41 pages/approx 22550 words</option>

  <option value="42">42 pages/approx 23100 words</option>

  <option value="43">43 pages/approx 23650 words</option>

  <option value="44">44 pages/approx 24200 words</option>

  <option value="45">45 pages/approx 24750 words</option>

  <option value="46">46 pages/approx 25300 words</option>

  <option value="47">47 pages/approx 25850 words</option>

  <option value="48">48 pages/approx 26400 words</option>

  <option value="49">49 pages/approx 26950 words</option>

  <option value="50">50 pages/approx 27500 words</option>

  <option value="51">51 pages/approx 28050 words</option>

  <option value="52">52 pages/approx 28600 words</option>

  <option value="53">53 pages/approx 29150 words</option>

  <option value="54">54 pages/approx 29700 words</option>

  <option value="55">55 pages/approx 30250 words</option>

  <option value="56">56 pages/approx 30800 words</option>

  <option value="57">57 pages/approx 31350 words</option>

  <option value="58">58 pages/approx 31900 words</option>

  <option value="59">59 pages/approx 32450 words</option>

  <option value="60">60 pages/approx 33000 words</option>

  <option value="61">61 pages/approx 33550 words</option>

  <option value="62">62 pages/approx 34100 words</option>

  <option value="63">63 pages/approx 34650 words</option>

  <option value="64">64 pages/approx 35200 words</option>

  <option value="65">65 pages/approx 35750 words</option>

  <option value="66">66 pages/approx 36300 words</option>

  <option value="67">67 pages/approx 36850 words</option>

  <option value="68">68 pages/approx 37400 words</option>

  <option value="69">69 pages/approx 37950 words</option>

  <option value="70">70 pages/approx 38500 words</option>

  <option value="71">71 pages/approx 39050 words</option>

  <option value="72">72 pages/approx 39600 words</option>

  <option value="73">73 pages/approx 40150 words</option>

  <option value="74">74 pages/approx 40700 words</option>

  <option value="75">75 pages/approx 41250 words</option>

  <option value="76">76 pages/approx 41800 words</option>

  <option value="77">77 pages/approx 42350 words</option>

  <option value="78">78 pages/approx 42900 words</option>

  <option value="79">79 pages/approx 43450 words</option>

  <option value="80">80 pages/approx 44000 words</option>

  <option value="81">81 pages/approx 44550 words</option>

  <option value="82">82 pages/approx 45100 words</option>

  <option value="83">83 pages/approx 45650 words</option>

  <option value="84">84 pages/approx 46200 words</option>

  <option value="85">85 pages/approx 46750 words</option>

  <option value="86">86 pages/approx 47300 words</option>

  <option value="87">87 pages/approx 47850 words</option>

  <option value="88">88 pages/approx 48400 words</option>

  <option value="89">89 pages/approx 48950 words</option>

  <option value="90">90 pages/approx 49500 words</option>

  <option value="91">91 pages/approx 50050 words</option>

  <option value="92">92 pages/approx 50600 words</option>

  <option value="93">93 pages/approx 51150 words</option>

  <option value="94">94 pages/approx 51700 words</option>

  <option value="95">95 pages/approx 52250 words</option>

  <option value="96">96 pages/approx 52800 words</option>

  <option value="97">97 pages/approx 53350 words</option>

  <option value="98">98 pages/approx 53900 words</option>

  <option value="99">99 pages/approx 54450 words</option>

  <option value="100">100 pages/approx 55000 words</option>

  <option value="101">101 pages/approx 55550 words</option>

  <option value="102">102 pages/approx 56100 words</option>

  <option value="103">103 pages/approx 56650 words</option>

  <option value="104">104 pages/approx 57200 words</option>

  <option value="105">105 pages/approx 57750 words</option>

  <option value="106">106 pages/approx 58300 words</option>

  <option value="107">107 pages/approx 58850 words</option>

  <option value="108">108 pages/approx 59400 words</option>

  <option value="109">109 pages/approx 59950 words</option>

  <option value="110">110 pages/approx 60500 words</option>

  <option value="111">111 pages/approx 61050 words</option>

  <option value="112">112 pages/approx 61600 words</option>

  <option value="113">113 pages/approx 62150 words</option>

  <option value="114">114 pages/approx 62700 words</option>

  <option value="115">115 pages/approx 63250 words</option>

  <option value="116">116 pages/approx 63800 words</option>

  <option value="117">117 pages/approx 64350 words</option>

  <option value="118">118 pages/approx 64900 words</option>

  <option value="119">119 pages/approx 65450 words</option>

  <option value="120">120 pages/approx 66000 words</option>

  <option value="121">121 pages/approx 66550 words</option>

  <option value="122">122 pages/approx 67100 words</option>

  <option value="123">123 pages/approx 67650 words</option>

  <option value="124">124 pages/approx 68200 words</option>

  <option value="125">125 pages/approx 68750 words</option>

  <option value="126">126 pages/approx 69300 words</option>

  <option value="127">127 pages/approx 69850 words</option>

  <option value="128">128 pages/approx 70400 words</option>

  <option value="129">129 pages/approx 70950 words</option>

  <option value="130">130 pages/approx 71500 words</option>

  <option value="131">131 pages/approx 72050 words</option>

  <option value="132">132 pages/approx 72600 words</option>

  <option value="133">133 pages/approx 73150 words</option>

  <option value="134">134 pages/approx 73700 words</option>

  <option value="135">135 pages/approx 74250 words</option>

  <option value="136">136 pages/approx 74800 words</option>

  <option value="137">137 pages/approx 75350 words</option>

  <option value="138">138 pages/approx 75900 words</option>

  <option value="139">139 pages/approx 76450 words</option>

  <option value="140">140 pages/approx 77000 words</option>

  <option value="141">141 pages/approx 77550 words</option>

  <option value="142">142 pages/approx 78100 words</option>

  <option value="143">143 pages/approx 78650 words</option>

  <option value="144">144 pages/approx 79200 words</option>

  <option value="145">145 pages/approx 79750 words</option>

  <option value="146">146 pages/approx 80300 words</option>

  <option value="147">147 pages/approx 80850 words</option>

  <option value="148">148 pages/approx 81400 words</option>

  <option value="149">149 pages/approx 81950 words</option>

  <option value="150">150 pages/approx 82500 words</option>

  <option value="151">151 pages/approx 83050 words</option>

  <option value="152">152 pages/approx 83600 words</option>

  <option value="153">153 pages/approx 84150 words</option>

  <option value="154">154 pages/approx 84700 words</option>

  <option value="155">155 pages/approx 85250 words</option>

  <option value="156">156 pages/approx 85800 words</option>

  <option value="157">157 pages/approx 86350 words</option>

  <option value="158">158 pages/approx 86900 words</option>

  <option value="159">159 pages/approx 87450 words</option>

  <option value="160">160 pages/approx 88000 words</option>

  <option value="161">161 pages/approx 88550 words</option>

  <option value="162">162 pages/approx 89100 words</option>

  <option value="163">163 pages/approx 89650 words</option>

  <option value="164">164 pages/approx 90200 words</option>

  <option value="165">165 pages/approx 90750 words</option>

  <option value="166">166 pages/approx 91300 words</option>

  <option value="167">167 pages/approx 91850 words</option>

  <option value="168">168 pages/approx 92400 words</option>

  <option value="169">169 pages/approx 92950 words</option>

  <option value="170">170 pages/approx 93500 words</option>

  <option value="171">171 pages/approx 94050 words</option>

  <option value="172">172 pages/approx 94600 words</option>

  <option value="173">173 pages/approx 95150 words</option>

  <option value="174">174 pages/approx 95700 words</option>

  <option value="175">175 pages/approx 96250 words</option>

  <option value="176">176 pages/approx 96800 words</option>

  <option value="177">177 pages/approx 97350 words</option>

  <option value="178">178 pages/approx 97900 words</option>

  <option value="179">179 pages/approx 98450 words</option>

  <option value="180">180 pages/approx 99000 words</option>

  <option value="181">181 pages/approx 99550 words</option>

  <option value="182">182 pages/approx 100100 words</option>

  <option value="183">183 pages/approx 100650 words</option>

  <option value="184">184 pages/approx 101200 words</option>

  <option value="185">185 pages/approx 101750 words</option>

  <option value="186">186 pages/approx 102300 words</option>

  <option value="187">187 pages/approx 102850 words</option>

  <option value="188">188 pages/approx 103400 words</option>

  <option value="189">189 pages/approx 103950 words</option>

  <option value="190">190 pages/approx 104500 words</option>

  <option value="191">191 pages/approx 105050 words</option>

  <option value="192">192 pages/approx 105600 words</option>

  <option value="193">193 pages/approx 106150 words</option>

  <option value="194">194 pages/approx 106700 words</option>

  <option value="195">195 pages/approx 107250 words</option>

  <option value="196">196 pages/approx 107800 words</option>

  <option value="197">197 pages/approx 108350 words</option>

  <option value="198">198 pages/approx 108900 words</option>

  <option value="199">199 pages/approx 109450 words</option>

  <option value="200">200 pages/approx 110000 words</option>
  </select>

  @if ($errors->has('numpages'))
    <span class="help-block" style="color:#a94442">
     <strong>{{ $errors->first('numpages') }}</strong>
    </span>
@endif
      </div>
       <div id="num_pg_ord" class="num_pg">approx 550 words per page</div>
    </div>

</div>

 <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-2">
  <div class="parsley-row">
    <label for="email">Spacing</label>
    <input  name="o_interval"  id="o_interval" class="form-control" value="1" onClick="javascript:doOrderFormCalculation();" type="checkbox" class="md-input" checked> &nbsp;<b>Single spaced</b>
    <input type="hidden" name="spacing" id="spacing" value="">
     @if ($errors->has('o_interval'))
          <span class="help-block" style="color:#a94442">
           <strong>{{ $errors->first('o_interval') }}</strong>
          </span>
      @endif
  </div>
</div>

<div class="uk-width-medium-1-2">
<div class="parsley-row">
<label for="email">Urgency: </label>
<select title="Paper urgency" class="form-control"  required="" name="urgency" id="urgency" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">
 <option value="15">30 days</option>
 <option value="6">12 hours</option>
 <option selected="selected" value="7">24 hours</option>
 <option value="8">48 hours</option>
 <option value="9">3 days</option>
 <option value="10">4 days</option>
 <option value="11">5 days</option>
 <option value="12">7 days</option>
 <option value="13">10 days</option>
 <option value="14">20 days</option>
 </select>

  @if ($errors->has('urgency'))
          <span class="help-block" style="color:#a94442">
           <strong>{{ $errors->first('urgency') }}</strong>
          </span>
      @endif
 </div>
 </div>

</div>

<div class="uk-grid" data-uk-grid-margin>
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<label for="email">Number of sources/references: </label>
<select id="numberOfSources" name="numberOfSources" class="form-control" size="1" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();" class="md-input">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option selected="selected" value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
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
<option value="60">60</option>
<option value="61">61</option>
<option value="62">62</option>
<option value="63">63</option>
<option value="64">64</option>
<option value="65">65</option>
<option value="66">66</option>
<option value="67">67</option>
<option value="68">68</option>
<option value="69">69</option>
<option value="70">70</option>
<option value="71">71</option>
<option value="72">72</option>
<option value="73">73</option>
<option value="74">74</option>
<option value="75">75</option>
<option value="76">76</option>
<option value="77">77</option>
<option value="78">78</option>
<option value="79">79</option>
<option value="80">80</option>
</select>

  @if ($errors->has('numberOfSources'))
          <span class="help-block" style="color:#a94442">
           <strong>{{ $errors->first('numberOfSources') }}</strong>
          </span>
      @endif
 </div>
 </div>

<div class="uk-width-medium-1-2">
<div class="parsley-row">
<label for="email">Style: </label>
<select id="style" name="writing_style" class="form-control" size="1" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">
  <option value="1">APA</option>
  <option value="2">MLA</option>
  <option value="3">Turabian</option>
  <option value="4">Chicago</option>
  <option value="5">Harvard</option>
  <option selected="selected" value="6">Oxford</option>
  <option value="8">Vancouver</option>
  <option value="9">CBE</option>
  <option value="7">Oxford</option>

</select>

  @if ($errors->has('writing_style'))
          <span class="help-block" style="color:#a94442">
           <strong>{{ $errors->first('writing_style') }}</strong>
          </span>
      @endif
 </div>
 </div>

</div>


<div class="uk-grid" data-uk-grid-margin>
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<label for="email">Academic Level: </label>
<select title="Academic level" class="form-control" name="academic_level" id="academic_level" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">
 <option value="1">High School</option>
 <option value="2">Undergraduate</option>
 <option selected="selected" value="3">Master</option>
 <option value="4">Ph. D.</option>
</select>

  @if ($errors->has('academic_level'))
          <span class="help-block" style="color:#a94442">
           <strong>{{ $errors->first('academic_level') }}</strong>
          </span>
      @endif
 </div>
 </div>

</div>


<div class="uk-grid" data-uk-grid-margin>
<input type="hidden" name="totals" value="0" id="totals">
  <div class="uk-width-medium-1-2">
  <div class="parsley-row">
    <label for="email">Order description<br></label>
    <textarea rows="4" cols="50"  id="details" name="details" class="form-control" value="{{ old('details') }}" required=""></textarea>
   @if ($errors->has('details'))
    <span class="help-block" style="color:#a94442">
    <strong>{{ $errors->first('details') }}</strong>
 </span>
  @endif
  </div>

  <div>If you have additional files, you will upload them at the order details page.</div>
</div>

<table>

  <tr>
  <td>
  <div style="padding: 10 5px  10px 0; font-size:16px;  width:auto; float:left;"> Cost per page: </div>
  <div style="padding: 10px; width:auto; float:right; font-size:18px; font-weight:bold;"> <span id="cost_per_page" class="readonlyinput"></span></div>  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td>
  </td>
    <td colspan="2">
  <div style="margin-left:-80px;">
  <div style="padding: 10px 5px 10px 0; font-size:20px; font-weight:bold; width:auto; float:left;"> Total </div>
  <div style="padding: 10px 2px; width:auto;float:left;">
  <select name="curr" id="curr" onChange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">
 <option selected="selected" value="1">USD</option>
 </select>
 </div>
  <div style="padding: 10px; width:auto; float:right; font-size:25px; font-weight:bold; color:#039;">  <span id="total"></span></div>
  </div>
    </td>
  </tr>
 </table>
<input name="0bb6c36d0203642ba42e79df168efa3a" value="MGJiNmMzNmQwMjAzNjQyYmE0MmU3OWRmMTY4ZWZhM2E=" type="hidden">
<input name="29cece43ba2d4bcaea8c78eb02aea395" value="MjljZWNlNDNiYTJkNGJjYWVhOGM3OGViMDJhZWEzOTU=" type="hidden">
<input name="ee52948c809e658a2e2bfd66f90aef6b" value="ZWU1Mjk0OGM4MDllNjU4YTJlMmJmZDY2ZjkwYWVmNmI=" type="hidden">
<input name="MTIuOTUYGREXGHNMKJGT23467GGFDSSSbbbbbIOK" value="NzAuOTk=" type="hidden">
<input name="MMNBGFREWQASCXZSOPJHGVNMTIuOTU" class="MMNBGFREWQASCXZSOPJHGVNMTIuOTU" value="NDk2Ljk2" type="hidden">

<p>
<div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
    <button type="submit" class="md-btn md-btn-primary" style="margin-left:300px">Proceed to Checkout >></button>
  </div>
</div>
</p>
</div>

</form>
  </div>
</div>
</div>
</div>
@endif

@endsection
 @section('page-script')
   {!! Html::script('admin/assets/js/kendoui_custom.min.js') !!}
   {!! Html::script('admin/assets/js/pages/kendoui.min.js') !!}
   <script type="text/javascript">
    function doOrderFormCalculation() {
    var orderForm = document.getElementById('placeOrderForm');
    var orderCostPerPage = 0;
    var orderTotalCost = 0;
    var single = orderForm.o_interval.checked;
    var number = orderForm.numpages;


    var wthdy = '';
    var wthdyx = '';
    var oc = 10 * doTypeOfDocumentCost(orderForm.doctype_x) * doAcademicLevelCost(orderForm.academic_level) * doUrgencyCost(orderForm.urgency) * doSubjectAreaCost(orderForm.order_category) * doCurrencyRate(orderForm.curr);
    orderCostPerPage = (oc - (oc) / 100) + doVasPP(document.getElementsByName('vas_id[]'));
    if (single == true) {
        orderCostPerPage = orderCostPerPage * 2;
        oc = oc * 2;
        number.options[0].value = '1';
        number.options[0].text = '1 page/approx 550 words';
   document.getElementById("num_pg_ord").innerHTML = 'approx 550 words per page';
        for (i = 1; i < number.length; i++) {

            number.options[i].text = (i + 1) + ' pages/approx ' + (2 * (i + 1) * 275) + ' words';

        }
    } else {
        number.options[0].value = '1';
        number.options[0].text = '1 page/approx 275 words';
   document.getElementById("num_pg_ord").innerHTML = 'approx 275 words per page';
        for (i = 1; i < number.length; i++) {

            number.options[i].text = (i + 1) + ' pages/approx ' + ((i + 1) * 275) + ' words';

        }
    }
    number.options[number.selectedIndex].selected = true;
    wthdy = Math.round(orderCostPerPage * Math.pow(10, 2)) / Math.pow(10, 2);
    document.getElementById("cost_per_page").innerHTML = wthdy;
    orderForm.MTIuOTUYGREXGHNMKJGT23467GGFDSSSbbbbbIOK.value = encode64(wthdy);
    wthdyx = Math.round((orderCostPerPage * number.options[number.selectedIndex].value + doVasPO(document.getElementsByName('vas_id[]'))) * Math.pow(10, 2)) / Math.pow(10, 2);
    document.getElementById("total").innerHTML = wthdyx;
  $("#totals").val(wthdyx);
    orderForm.MMNBGFREWQASCXZSOPJHGVNMTIuOTU.value = encode64(wthdyx);

}

//type of doc
function doTypeOfDocumentCost(tod) {
    if (tod.options[tod.selectedIndex].value == 0) {
        return 1.00
    }   else if (tod.options[tod.selectedIndex].value == 1) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 2) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 3) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 4) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 5) {
        return 1.00   }
 else if (tod.options[tod.selectedIndex].value == 6) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 7) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 8) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 9) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 10) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 11) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 12) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 13) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 14) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 15) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 16) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 17) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 18) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 19) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 20) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 21) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 22) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 23) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 24) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 25) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 26) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 27) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 28) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 29) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 30) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 31) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 32) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 33) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 34) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 35) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 36) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 37) {
        return 1.00    }
 else if (tod.options[tod.selectedIndex].value == 38) {
        return 1.00    }
}
//academic level
function doAcademicLevelCost(al) {
    if (al.options[al.selectedIndex].value == 1) {
        return 1.60
    } else if (al.options[al.selectedIndex].value == 2) {
        return 1.7
    } else if (al.options[al.selectedIndex].value == 3) {
        return 1.7
    } else if (al.options[al.selectedIndex].value == 4) {
        return 1.9
    }
}


//urgency
function doUrgencyCost(urgency) {
    if (urgency.options[urgency.selectedIndex].value == 6) {
        return 1.00
    } else if (urgency.options[urgency.selectedIndex].value == 7) {
        return 0.75
    } else if (urgency.options[urgency.selectedIndex].value == 8) {
        return 0.70
    } else if (urgency.options[urgency.selectedIndex].value == 9) {
        return 0.60
    } else if (urgency.options[urgency.selectedIndex].value == 10) {
        return 0.60
    } else if (urgency.options[urgency.selectedIndex].value == 11) {
        return 0.60
    } else if (urgency.options[urgency.selectedIndex].value == 12) {
        return 0.60
    } else if (urgency.options[urgency.selectedIndex].value == 13) {
        return 0.60
    } else if (urgency.options[urgency.selectedIndex].value == 14) {
        return 0.60
    } else if (urgency.options[urgency.selectedIndex].value == 15) {
        return 0.60
    }
}

function doSubjectAreaCost(subject) {
 if (subject.options[subject.selectedIndex].value == 10) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 12) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 15) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 17) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 13) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 16) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 18) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 11) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 14) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 112) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 52) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 111) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 102) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 105) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 107) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 103) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 104) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 115) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 53) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 60) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 61) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 58) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 62) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 59) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 57) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 63) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 64) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 87) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 93) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 89) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 88) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 90) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 67) {
        return 1.45    }
 if (subject.options[subject.selectedIndex].value == 9) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 24) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 36) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 38) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 37) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 42) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 41) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 44) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 45) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 40) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 39) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 43) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 47) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 49) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 48) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 7) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 2) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 4) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 5) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 6) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 3) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 116) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 54) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 56) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 51) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 94) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 99) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 97) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 101) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 95) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 100) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 96) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 78) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 85) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 113) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 86) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 83) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 79) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 80) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 28) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 110) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 29) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 21) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 108) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 22) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 65) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 71) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 70) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 72) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 73) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 75) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 77) {
        return 1.00    }
 if (subject.options[subject.selectedIndex].value == 114) {
        return 1.00    }

}


function doCurrencyRate(curr) {
  if (curr.options[curr.selectedIndex].value == 1) {
        return 1    }
 if (curr.options[curr.selectedIndex].value == 2) {
        return 0.61880    }
 if (curr.options[curr.selectedIndex].value == 3) {
        return 0.98146    }
 if (curr.options[curr.selectedIndex].value == 4) {
        return 0.96294    }
 if (curr.options[curr.selectedIndex].value == 5) {
        return 0.77465    }
}

var pp = [];var po = [];pp[3] = 2.95;po[6] = 9.95;


function doVasPP(vas) {
    var return_sum = 0;
    for (var i = 0; i < vas.length; i++) {
        if ((vas[i].checked == true) && (vas[i].id.indexOf('page') != -1) && (!isNaN(pp[vas[i].value]))) {
            return_sum += pp[vas[i].value];
        }
    }
    return return_sum;
}


function doVasPO(vas) {
    var return_sum = 0;
    for (var i = 0; i < vas.length; i++) {
        if ((vas[i].checked == true) && (vas[i].id.indexOf('order') != -1) && (!isNaN(po[vas[i].value]))) {
            return_sum += po[vas[i].value];
        }
    }
    return return_sum;
}

  var keyStr = "ABCDEFGHIJKLMNOP" +
               "QRSTUVWXYZabcdef" +
               "ghijklmnopqrstuv" +
               "wxyz0123456789+/" +
               "=";

  function encode64(input) {
     input = escape(input);
     var output = "";
     var chr1, chr2, chr3 = "";
     var enc1, enc2, enc3, enc4 = "";
     var i = 0;

     do {
        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
           enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
           enc4 = 64;
        }

        output = output +
           keyStr.charAt(enc1) +
           keyStr.charAt(enc2) +
           keyStr.charAt(enc3) +
           keyStr.charAt(enc4);
        chr1 = chr2 = chr3 = "";
        enc1 = enc2 = enc3 = enc4 = "";
     } while (i < input.length);

     return output;
  }

  function decode64(input) {
     var output = "";
     var chr1, chr2, chr3 = "";
     var enc1, enc2, enc3, enc4 = "";
     var i = 0;

     // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
     var base64test = /[^A-Za-z0-9\+\/\=]/g;
     if (base64test.exec(input)) {
        alert("There were invalid base64 characters in the input text.\n" +
              "Valid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\n" +
              "Expect errors in decoding.");
     }
     input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

     do {
        enc1 = keyStr.indexOf(input.charAt(i++));
        enc2 = keyStr.indexOf(input.charAt(i++));
        enc3 = keyStr.indexOf(input.charAt(i++));
        enc4 = keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
           output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
           output = output + String.fromCharCode(chr3);
        }

        chr1 = chr2 = chr3 = "";
        enc1 = enc2 = enc3 = enc4 = "";

     } while (i < input.length);

     return unescape(output);
  }

   </script>

    @stop
