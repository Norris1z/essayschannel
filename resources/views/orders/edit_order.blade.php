@extends('layouts.admin')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">Edit <span style="color:orange">{{$order->order_title}}</span> Order</h3>

            <div class="md-card">
             @if(Session::has('success_message'))
                          <div class="uk-alert uk-alert-success">{!! session('success_message') !!}</div>
                         @endif
              <div class="md-card-content large-padding">
              <form id="smart-form-register" class="smart-form" method="PATCH" action="{{URL::route('order_update', $order->id)}}">
             
              {{ csrf_field() }}
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="worktype">Work Type<span class="req">*</span></label>
                       <select id="select_demo_2" name="doctype" value="{{ (old('doctype')) ? old('doctype') : $order->doctype }}" class="md-input">
                                <option value="" disabled selected hidden>Select...</option>
                                <option value="">Select...</option>
                                <option value="Admission/Application Essay">Admission/Application Essay</option>
                                <option value="Annotated Bibliography">Annotated Bibliography</option>
                                <option value="Article Review">Article Review</option>
                                <option value="Assignment">Assignment</option>
                                <option value="Book Report/Review">Book Report/Review</option>
                                <option value="Case Study">Case Study</option>
                                <option value="Coursework AS and A-Level">Coursework AS and A-Level</option>
                                <option value="Coursework GCSE">Coursework GCSE</option>
                                <option value="Dissertation">Dissertation</option>
                                <option value="Dissertation Chapter - Abstract">Dissertation Chapter - Abstract</option>
                                <option value="Dissertation Chapter - Conclusion Chapter">Dissertation Chapter - Conclusion Chapter</option>
                                <option value="Dissertation Chapter - Discussion">Dissertation Chapter - Discussion</option>
                                <option value="Dissertation Chapter - Hypothesis">Dissertation Chapter - Hypothesis</option>
                                <option value="Dissertation Chapter - Introduction Chapter">Dissertation Chapter - Introduction Chapter</option>
                                <option value="Dissertation Chapter - Literature Review">Dissertation Chapter - Literature Review</option>
                                <option value="Dissertation Chapter - Methodology">Dissertation Chapter - Methodology</option>
                                <option value="Dissertation Chapter - Results">Dissertation Chapter - Results</option>
                                <option value="Revision & Editing">Revision & Editing</option>
                                <option value="Essay">Essay</option>
                                <option value="Argumentative Essay">Argumentative Essay</option>
                                <option value="Formatting">Formatting</option>
                                <option value="Lab Report">Lab Report</option>
                                <option value="Math Problem">Math Problem</option>
                                <option value="Movie Review">Movie Review</option>
                                <option value="Personal Statement">Personal Statement</option>
                                <option value="PowerPoint Presentation">PowerPoint Presentation</option>
                                <option value="Proofreading">Proofreading</option>
                                <option value="Research Paper">Research Paper</option>
                                <option value="Research Proposal">Research Proposal</option>
                                <option value="Scholarship Essay">Scholarship Essay</option>
                                <option value="Speech/Presentation">Speech/Presentation</option>
                                <option value="Statistics Project">Statistics Project</option>
                                <option value="Term Paper">Term Paper</option>
                                <option value="Thesis">Thesis</option>
                                <option value="Thesis Proposal">Thesis Proposal</option>
                                <option value="Dissertation Proposal">Dissertation Proposal</option>
                                <option value="Excel">Excel</option>
                            </select>
                          @if ($errors->has('doctype'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('doctype') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="email">Title<span class="req">*</span></label>
                      <input type="text" name="order_title" value="{{ (old('order_title')) ? old('order_title') : $order->order_title }}" data-parsley-trigger="change" class="md-input" />
                       @if ($errors->has('order_title'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('order_title') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                 <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Level<span class="req">*</span></label>
                      <select id="select_demo_3" name="order_level" value="{{ (old('order_level')) ? old('order_level') : $order->order_level }}" class="md-input">
                       <option value="" disabled selected hidden>Select...</option>
                        <option value="High School">High School</option>
                        <option value="College">College</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Master">Master</option>
                        <option value="Ph.D">Ph.D</option>
                                
                            </select>
                            @if ($errors->has('order_level'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('order_level') }}</strong>
                            </span>
                            @endif
                    </div>
                  </div>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Max Bid<span class="req">(optional)</span></label>
                      <select id="select_demo_4" name="max_bid" value="{{ (old('max_bid')) ? old('max_bid') : $order->max_bid }}" class="md-input">
                                <option value="" disabled selected hidden>Select...</option>
                                <option value="200">200</option>
                                <option value="230">230</option>
                                <option value="250">250</option>
                                <option value="270">270</option>
                                <option value="300">300</option>
                                
                            </select>
                            @if ($errors->has('max_bid'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('max_bid') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                 
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="no_of_pages">Number of pages/ Words:<span class="req">*</span></label>
                      <select id="select_demo_2" name="no_of_pages" value="{{ (old('no_of_pages')) ? old('no_of_pages') : $order->no_of_pages }}" class="md-input">
                      <option value="" disabled selected hidden>Select...</option>
                      <option value=1 >1 pages / 275 words</option>
                      <option value="2">2 page(s) / 550 words</option>
                      <option value="3">3 page(s) / 825 words</option>
                      <option value="4">4 page(s) / 1100 words</option>
                      <option value="5">5 page(s) / 1375 words</option>
                      <option value="6">6 page(s) / 1650 words</option>
                      <option value="7">7 page(s) / 1925 words</option>
                      <option value="8">8 page(s) / 2200 words</option>
                      <option value="9">9 page(s) / 2475 words</option>
                      <option value="10">10 page(s) / 2750 words</option>
                      <option value="11">11 page(s) / 3025 words</option>
                      <option value="12">12 page(s) / 3300 words</option>
                      <option value="13">13 page(s) / 3575 words</option>
                      <option value="14">14 page(s) / 3850 words</option>
                      <option value="15">15 page(s) / 4125 words</option>
                      <option value="16">16 page(s) / 4400 words</option>
                      <option value="17">17 page(s) / 4675 words</option>
                      <option value="18">18 page(s) / 4950 words</option>
                      <option value="19">19 page(s) / 5225 words</option>
                      <option value="20">20 page(s) / 5500 words</option>
                      <option value="21">21 page(s) / 5775 words</option>
                      <option value="22">22 page(s) / 6050 words</option>
                      <option value="23">23 page(s) / 6325 words</option>
                      <option value="24">24 page(s) / 6600 words</option>
                      <option value="25">25 page(s) / 6875 words</option>
                      <option value="26">26 page(s) / 7150 words</option>
                      <option value="27">27 page(s) / 7425 words</option>
                      <option value="28">28 page(s) / 7700 words</option>
                      <option value="29">29 page(s) / 7975 words</option>
                      <option value="30">30 page(s) / 8250 words</option>
                      <option value="31">31 page(s) / 8525 words</option>
                      <option value="32">32 page(s) / 8800 words</option>
                      <option value="33">33 page(s) / 9075 words</option>
                      <option value="34">34 page(s) / 9350 words</option>
                      <option value="35">35 page(s) / 9625 words</option>
                      <option value="36">36 page(s) / 9900 words</option>
                      <option value="37">37 page(s) / 10175 words</option>
                      <option value="38">38 page(s) / 10450 words</option>
                      <option value="39">39 page(s) / 10725 words</option>
                      <option value="40">40 page(s) / 11000 words</option>
                      <option value="41">41 page(s) / 11275 words</option>
                      <option value="42">42 page(s) / 11550 words</option>
                      <option value="43">43 page(s) / 11825 words</option>
                      <option value="44">44 page(s) / 12100 words</option>
                      <option value="45">45 page(s) / 12375 words</option>
                      <option value="46">46 page(s) / 12650 words</option>
                      <option value="47">47 page(s) / 12925 words</option>
                      <option value="48">48 page(s) / 13200 words</option>
                      <option value="49">49 page(s) / 13475 words</option>
                      <option value="50">50 page(s) / 13750 words</option>
                      <option value="51">51 page(s) / 14025 words</option>
                      <option value="52">52 page(s) / 14300 words</option>
                      <option value="53">53 page(s) / 14575 words</option>
                      <option value="54">54 page(s) / 14850 words</option>
                      <option value="55">55 page(s) / 15125 words</option>
                      <option value="56">56 page(s) / 15400 words</option>
                      <option value="57">57 page(s) / 15675 words</option>
                      <option value="58">58 page(s) / 15950 words</option>
                      <option value="59">59 page(s) / 16225 words</option>
                      <option value="60">60 page(s) / 16500 words</option>
                      <option value="61">61 page(s) / 16775 words</option>
                      <option value="62">62 page(s) / 17050 words</option>
                      <option value="63">63 page(s) / 17325 words</option>
                      <option value="64">64 page(s) / 17600 words</option>
                      <option value="65">65 page(s) / 17875 words</option>
                      <option value="66">66 page(s) / 18150 words</option>
                      <option value="67">67 page(s) / 18425 words</option>
                      <option value="68">68 page(s) / 18700 words</option>
                      <option value="69">69 page(s) / 18975 words</option>
                      <option value="70">70 page(s) / 19250 words</option>
                      <option value="71">71 page(s) / 19525 words</option>
                      <option value="72">72 page(s) / 19800 words</option>
                      <option value="73">73 page(s) / 20075 words</option>
                      <option value="74">74 page(s) / 20350 words</option>
                      <option value="75">75 page(s) / 20625 words</option>
                      <option value="76">76 page(s) / 20900 words</option>
                      <option value="77">77 page(s) / 21175 words</option>
                      <option value="78">78 page(s) / 21450 words</option>
                      <option value="79">79 page(s) / 21725 words</option>
                      <option value="80">80 page(s) / 22000 words</option>
                      <option value="81">81 page(s) / 22275 words</option>
                      <option value="82">82 page(s) / 22550 words</option>
                      <option value="83">83 page(s) / 22825 words</option>
                      <option value="84">84 page(s) / 23100 words</option>
                      <option value="85">85 page(s) / 23375 words</option>
                      <option value="86">86 page(s) / 23650 words</option>
                      <option value="87">87 page(s) / 23925 words</option>
                      <option value="88">88 page(s) / 24200 words</option>
                      <option value="89">89 page(s) / 24475 words</option>
                      <option value="90">90 page(s) / 24750 words</option>
                      <option value="91">91 page(s) / 25025 words</option>
                      <option value="92">92 page(s) / 25300 words</option>
                      <option value="93">93 page(s) / 25575 words</option>
                      <option value="94">94 page(s) / 25850 words</option>
                      <option value="95">95 page(s) / 26125 words</option>
                      <option value="96">96 page(s) / 26400 words</option>
                      <option value="97">97 page(s) / 26675 words</option>
                      <option value="98">98 page(s) / 26950 words</option>
                      <option value="99">99 page(s) / 27225 words</option>
                      <option value="100">100 page(s) / 27500 words</option>
                      <option value="101">101 page(s) / 27775 words</option>
                      <option value="102">102 page(s) / 28050 words</option>
                      <option value="103">103 page(s) / 28325 words</option>
                      <option value="104">104 page(s) / 28600 words</option>
                      <option value="105">105 page(s) / 28875 words</option>
                      <option value="106">106 page(s) / 29150 words</option>
                      <option value="107">107 page(s) / 29425 words</option>
                      <option value="108">108 page(s) / 29700 words</option>
                      <option value="109">109 page(s) / 29975 words</option>
                      <option value="110">110 page(s) / 30250 words</option>
                      <option value="111">111 page(s) / 30525 words</option>
                      <option value="112">112 page(s) / 30800 words</option>
                      <option value="113">113 page(s) / 31075 words</option>
                      <option value="114">114 page(s) / 31350 words</option>
                      <option value="115">115 page(s) / 31625 words</option>
                      <option value="116">116 page(s) / 31900 words</option>
                      <option value="117">117 page(s) / 32175 words</option>
                      <option value="118">118 page(s) / 32450 words</option>
                      <option value="119">119 page(s) / 32725 words</option>
                      <option value="120">120 page(s) / 33000 words</option>
                      <option value="121">121 page(s) / 33275 words</option>
                      <option value="122">122 page(s) / 33550 words</option>
                      <option value="123">123 page(s) / 33825 words</option>
                      <option value="124">124 page(s) / 34100 words</option>
                      <option value="125">125 page(s) / 34375 words</option>
                      <option value="126">126 page(s) / 34650 words</option>
                      <option value="127">127 page(s) / 34925 words</option>
                      <option value="128">128 page(s) / 35200 words</option>
                      <option value="129">129 page(s) / 35475 words</option>
                      <option value="130">130 page(s) / 35750 words</option>
                      <option value="131">131 page(s) / 36025 words</option>
                      <option value="132">132 page(s) / 36300 words</option>
                      <option value="133">133 page(s) / 36575 words</option>
                      <option value="134">134 page(s) / 36850 words</option>
                      <option value="135">135 page(s) / 37125 words</option>
                      <option value="136">136 page(s) / 37400 words</option>
                      <option value="137">137 page(s) / 37675 words</option>
                      <option value="138">138 page(s) / 37950 words</option>
                      <option value="139">139 page(s) / 38225 words</option>
                      <option value="140">140 page(s) / 38500 words</option>
                      <option value="141">141 page(s) / 38775 words</option>
                      <option value="142">142 page(s) / 39050 words</option>
                      <option value="143">143 page(s) / 39325 words</option>
                      <option value="144">144 page(s) / 39600 words</option>
                      <option value="145">145 page(s) / 39875 words</option>
                      <option value="146">146 page(s) / 40150 words</option>
                      <option value="147">147 page(s) / 40425 words</option>
                      <option value="148">148 page(s) / 40700 words</option>
                      <option value="149">149 page(s) / 40975 words</option>
                      <option value="150">150 page(s) / 41250 words</option>
                      <option value="151">151 page(s) / 41525 words</option>
                      <option value="152">152 page(s) / 41800 words</option>
                      <option value="153">153 page(s) / 42075 words</option>
                      <option value="154">154 page(s) / 42350 words</option>
                      <option value="155">155 page(s) / 42625 words</option>
                      <option value="156">156 page(s) / 42900 words</option>
                      <option value="157">157 page(s) / 43175 words</option>
                      <option value="158">158 page(s) / 43450 words</option>
                      <option value="159">159 page(s) / 43725 words</option>
                      <option value="160">160 page(s) / 44000 words</option>
                      <option value="161">161 page(s) / 44275 words</option>
                      <option value="162">162 page(s) / 44550 words</option>
                      <option value="163">163 page(s) / 44825 words</option>
                      <option value="164">164 page(s) / 45100 words</option>
                      <option value="165">165 page(s) / 45375 words</option>
                      <option value="166">166 page(s) / 45650 words</option>
                      <option value="167">167 page(s) / 45925 words</option>
                      <option value="168">168 page(s) / 46200 words</option>
                      <option value="169">169 page(s) / 46475 words</option>
                      <option value="170">170 page(s) / 46750 words</option>
                      <option value="171">171 page(s) / 47025 words</option>
                      <option value="172">172 page(s) / 47300 words</option>
                      <option value="173">173 page(s) / 47575 words</option>
                      <option value="174">174 page(s) / 47850 words</option>
                      <option value="175">175 page(s) / 48125 words</option>
                      <option value="176">176 page(s) / 48400 words</option>
                      <option value="177">177 page(s) / 48675 words</option>
                      <option value="178">178 page(s) / 48950 words</option>
                      <option value="179">179 page(s) / 49225 words</option>
                      <option value="180">180 page(s) / 49500 words</option>
                      <option value="181">181 page(s) / 49775 words</option>
                      <option value="182">182 page(s) / 50050 words</option>
                      <option value="183">183 page(s) / 50325 words</option>
                      <option value="184">184 page(s) / 50600 words</option>
                      <option value="185">185 page(s) / 50875 words</option>
                      <option value="186">186 page(s) / 51150 words</option>
                      <option value="187">187 page(s) / 51425 words</option>
                      <option value="188">188 page(s) / 51700 words</option>
                      <option value="189">189 page(s) / 51975 words</option>
                      <option value="190">190 page(s) / 52250 words</option>
                      <option value="191">191 page(s) / 52525 words</option>
                      <option value="192">192 page(s) / 52800 words</option>
                      <option value="193">193 page(s) / 53075 words</option>
                      <option value="194">194 page(s) / 53350 words</option>
                      <option value="195">195 page(s) / 53625 words</option>
                      <option value="196">196 page(s) / 53900 words</option>
                      <option value="197">197 page(s) / 54175 words</option>
                      <option value="198">198 page(s) / 54450 words</option>
                      <option value="199">199 page(s) / 54725 words</option>
                      <option value="200">200 page(s) / 55000 words</option>
                      <option value="201">201 page(s) / 55275 words</option>
                      <option value="202">202 page(s) / 55550 words</option>
                      <option value="203">203 page(s) / 55825 words</option>
                      <option value="204">204 page(s) / 56100 words</option>
                      <option value="205">205 page(s) / 56375 words</option>
                      <option value="206">206 page(s) / 56650 words</option>
                      <option value="207">207 page(s) / 56925 words</option>
                      <option value="208">208 page(s) / 57200 words</option>
                      <option value="209">209 page(s) / 57475 words</option>
                      <option value="210">210 page(s) / 57750 words</option>
                      <option value="211">211 page(s) / 58025 words</option>
                      <option value="212">212 page(s) / 58300 words</option>
                      <option value="213">213 page(s) / 58575 words</option>
                      <option value="214">214 page(s) / 58850 words</option>
                      <option value="215">215 page(s) / 59125 words</option>
                      <option value="216">216 page(s) / 59400 words</option>
                      <option value="217">217 page(s) / 59675 words</option>
                      <option value="218">218 page(s) / 59950 words</option>
                      <option value="219">219 page(s) / 60225 words</option>
                      <option value="220">220 page(s) / 60500 words</option>
                      <option value="221">221 page(s) / 60775 words</option>
                      <option value="222">222 page(s) / 61050 words</option>
                      <option value="223">223 page(s) / 61325 words</option>
                      <option value="224">224 page(s) / 61600 words</option>
                      <option value="225">225 page(s) / 61875 words</option>
                      <option value="226">226 page(s) / 62150 words</option>
                      <option value="227">227 page(s) / 62425 words</option>
                      <option value="228">228 page(s) / 62700 words</option>
                      <option value="229">229 page(s) / 62975 words</option>
                      <option value="230">230 page(s) / 63250 words</option>
                      <option value="231">231 page(s) / 63525 words</option>
                      <option value="232">232 page(s) / 63800 words</option>
                      <option value="233">233 page(s) / 64075 words</option>
                      <option value="234">234 page(s) / 64350 words</option>
                      <option value="235">235 page(s) / 64625 words</option>
                      <option value="236">236 page(s) / 64900 words</option>
                      <option value="237">237 page(s) / 65175 words</option>
                      <option value="238">238 page(s) / 65450 words</option>
                      <option value="239">239 page(s) / 65725 words</option>
                      <option value="240">240 page(s) / 66000 words</option>
                      <option value="241">241 page(s) / 66275 words</option>
                      <option value="242">242 page(s) / 66550 words</option>
                      <option value="243">243 page(s) / 66825 words</option>
                      <option value="244">244 page(s) / 67100 words</option>
                      <option value="245">245 page(s) / 67375 words</option>
                      <option value="246">246 page(s) / 67650 words</option>
                      <option value="247">247 page(s) / 67925 words</option>
                      <option value="248">248 page(s) / 68200 words</option>
                      <option value="249">249 page(s) / 68475 words</option>
                      <option value="250">250 page(s) / 68750 words</option>
                      <option value="251">251 page(s) / 69025 words</option>
                      <option value="252">252 page(s) / 69300 words</option>
                      <option value="253">253 page(s) / 69575 words</option>
                      <option value="254">254 page(s) / 69850 words</option>
                      <option value="255">255 page(s) / 70125 words</option>
                      <option value="256">256 page(s) / 70400 words</option>
                      <option value="257">257 page(s) / 70675 words</option>
                      <option value="258">258 page(s) / 70950 words</option>
                      <option value="259">259 page(s) / 71225 words</option>
                      <option value="260">260 page(s) / 71500 words</option>
                      <option value="261">261 page(s) / 71775 words</option>
                      <option value="262">262 page(s) / 72050 words</option>
                      <option value="263">263 page(s) / 72325 words</option>
                      <option value="264">264 page(s) / 72600 words</option>
                      <option value="265">265 page(s) / 72875 words</option>
                      <option value="266">266 page(s) / 73150 words</option>
                      <option value="267">267 page(s) / 73425 words</option>
                      <option value="268">268 page(s) / 73700 words</option>
                      <option value="269">269 page(s) / 73975 words</option>
                      <option value="270">270 page(s) / 74250 words</option>
                      <option value="271">271 page(s) / 74525 words</option>
                      <option value="272">272 page(s) / 74800 words</option>
                      <option value="273">273 page(s) / 75075 words</option>
                      <option value="274">274 page(s) / 75350 words</option>
                      <option value="275">275 page(s) / 75625 words</option>
                      <option value="276">276 page(s) / 75900 words</option>
                      <option value="277">277 page(s) / 76175 words</option>
                      <option value="278">278 page(s) / 76450 words</option>
                      <option value="279">279 page(s) / 76725 words</option>
                      <option value="280">280 page(s) / 77000 words</option>
                      <option value="281">281 page(s) / 77275 words</option>
                      <option value="282">282 page(s) / 77550 words</option>
                      <option value="283">283 page(s) / 77825 words</option>
                      <option value="284">284 page(s) / 78100 words</option>
                      <option value="285">285 page(s) / 78375 words</option>
                      <option value="286">286 page(s) / 78650 words</option>
                      <option value="287">287 page(s) / 78925 words</option>
                      <option value="288">288 page(s) / 79200 words</option>
                      <option value="289">289 page(s) / 79475 words</option>
                      <option value="290">290 page(s) / 79750 words</option>
                      <option value="291">291 page(s) / 80025 words</option>
                      <option value="292">292 page(s) / 80300 words</option>
                      <option value="293">293 page(s) / 80575 words</option>
                      <option value="294">294 page(s) / 80850 words</option>
                      <option value="295">295 page(s) / 81125 words</option>
                      <option value="296">296 page(s) / 81400 words</option>
                      <option value="297">297 page(s) / 81675 words</option>
                      <option value="298">298 page(s) / 81950 words</option>
                      <option value="299">299 page(s) / 82225 words</option>
                      <option value="300">300 page(s) / 82500 words</option>
                      <option value="Writer to determine">Writer to determine/ N/A</option>
                                
                                
                            </select>
                            @if ($errors->has('no_of_pages'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('no_of_pages') }}</strong>
                            </span>
                            @endif
                    </div>
                  </div>
                   <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Spacing<span class="req">*</span></label>
                      <select id="select_demo_2" name="spacing" value="{{ (old('spacing')) ? old('spacing') : $order->spacing }}" class="md-input">
                                <option value="" disabled selected hidden>Select...</option>
                                <option  value="Double Spaced">Double Spaced</option>
                                <option value="Single Spaced">Single Spaced</option>
                                
                                
                            </select>
                            @if ($errors->has('spacing'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('spacing') }}</strong>
                            </span>
                            @endif
                    </div>
                  </div>
                   
                </div>
                 <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Provide digital sources used:<span class="req">*</span></label>
                       <select id="select_demo_2" name="digital_sources" value="{{ (old('digital_sources')) ? old('digital_sources') : $order->digital_sources }}" class="md-input">
                                <option value="" disabled selected hidden>Select...</option>
                               <option  value="yes">Yes</option>
                                <option value="no">No</option>
                                
                                
                            </select>
                            @if ($errors->has('digital_sources'))
                            <span class="help-block" style="color:#a94442">
                             <strong>{{ $errors->first('digital_sources') }}</strong>
                            </span>
                            @endif
                      
                    </div>
                  </div>
                   <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Subject or Discipline<span class="req">*</span></label>
                      <select id="select_demo_2" name="discipline" value="{{ (old('discipline')) ? old('discipline') : $order->discipline }}" class="md-input">
                                <option value="" disabled selected hidden>Select...</option>
                               <option value="English 101">English 101</option>
                               <option value="Composition">Composition</option>
          <option value="Accounting">Accounting</option>
          <option value="Accounting and Finance">Accounting and Finance </option> 
          <option value="Advertising">Advertising</option>
          <option value="Aeronautics">Aeronautics</option>
          <option value="African-American Studies">African-American Studies</option>
          <option value="Agricultural Studies">Agricultural Studies</option>
          <option value="Agriculture">Agriculture</option>
          <option value="Alternative Medicine">Alternative Medicine</option>
          <option value="American History">American History</option>
          <option value="American Literature">American Literature</option>
          <option value="Ancient History">Ancient History</option>
          <option value="Antarctic Studies">Antarctic Studies</option>
          <option value="Anthropology">Anthropology</option>
          <option value="Antique Literature">Antique Literature</option>
          <option value="Application Essay">Application Essay</option>
          <option value="Applied Psychology">Applied Psychology</option>
          <option value="Archeology">Archeology</option>
          <option value="Architecture">Architecture</option>
          <option value="Art">Art</option>
          <option value="Art Curatorship">Art Curatorship</option>
          <option value="Art History">Art History</option>
          <option value="Art History and Theory">Art History and Theory</option>
          <option value="Art Theory">Art Theory</option>
          <option value="Asian Literature">Asian Literature</option>
          <option value="Asian Studies">Asian Studies</option>
          <option value="Astronomy">Astronomy</option>
          <option value="Audiology">Audiology</option>
          <option value="Aviation">Aviation</option>
              <option value="Biochemistry">Biochemistry</option>
              <option value="Bioengineering">Bioengineering</option>
              <option value="Biological Sciences">Biological Sciences</option>
              <option value="Biology">Biology</option>
              <option value="Biosecurity">Biosecurity</option>
              <option value="Biotechnology">Biotechnology</option>
              <option value="Botany">Botany</option>
              <option value="Business">Business</option>
              <option value="Business Administration">Business Administration</option>
              <option value="Business Economics">Business Economics</option>
              <option value="Business Management">Business Management</option>
              <option value="Business studies">Business studies</option>

              <option value="Canadian Studies">Canadian Studies</option>
              <option value="Case Study">Case Study</option>
              <option value="Cellular and Molecular Biology">Cellular and Molecular Biology</option>
              <option value="Chemical and Process Engineering">Chemical and Process Engineering</option>
              <option value="Chemistry">Chemistry</option>
              <option value="Child and Family Psychology">Child and Family Psychology</option>
              <option value="Chinese">Chinese</option>
              <option value="Cinema Studies">Cinema Studies</option>
              <option value="Civil Engineering">Civil Engineering</option>
              <option value="Classical Studies">Classical Studies</option>
              <option value="Classics">Classics</option>
              <option value="Clinical Psychology">Clinical Psychology</option>
              <option value="Clinical Teaching">Clinical Teaching</option>
              <option value="Communication">Communication</option>
              <option value="Communication Disorders">Communication Disorders</option>
              <option value="Communication Strategies">Communication Strategies</option>
              <option value="Communications and Media">Communications and Media</option>
              <option value="Company Analysis">Company Analysis</option>
              <option value="Computational and Applied Mathematics">Computational and Applied Mathematics</option>
              <option value="Computer Engineering">Computer Engineering</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Computer-Assisted Language Learning">Computer-Assisted Language Learning</option>
              <option value="Construction Management">Construction Management</option>
              <option value="Counselling">Counselling</option>
              <option value="Creative writing">Creative writing</option>
              <option value="Criminal Justice">Criminal Justice</option>
              <option value="Criminology">Criminology</option>
              <option value="Cultural Studies">Cultural Studies</option>

              <option value="Dance">Dance</option>
              <option value="Design Analysis">Design Analysis</option>
              <option value="Development Studies">Development Studies</option>
              <option value="Digital Humanities">Digital Humanities</option>
              <option value="Diplomacy and International Relations">Diplomacy and International Relations</option>
              <option value="Drama">Drama</option>

              <option value="Early Childhood Teacher Education">Early Childhood Teacher Education</option>
              <option value="Earth and space sciences">Earth and space sciences</option>
              <option value="Earthquake Engineering">Earthquake Engineering</option>
              <option value="East European Studies">East European Studies</option>
              <option value="Ecology">Ecology</option>
              <option value="E-Commerce">E-Commerce</option>
              <option value="Economics">Economics</option>
              <option value="Education">Education</option>
              <option value="Education Theories">Education Theories</option>
              <option value="e-Learning and Digital Technologies in Education">e-Learning and Digital Technologies in Education</option><option value="Electrical and Electronic Engineering">Electrical and Electronic Engineering</option>
              <option value="Engineering">Engineering</option>
              <option value="Engineering Geology">Engineering Geology</option><option value="Engineering Management">Engineering Management</option>
              <option value="Engineering Mathematics">Engineering Mathematics</option>
              <option value="English Literature">English Literature</option>
              <option value="Environmental Issues">Environmental Issues</option>
              <option value="Environmental Science">Environmental Science</option>
              <option value="Ethics">Ethics</option>
              <option value="European and European Union Studies">European and European Union Studies</option>
              <option value="European Union Studies">European Union Studies</option>
              <option value="Evolutionary Biology">Evolutionary Biology</option>


              <option value="Film & Theater studies">Film & Theater studies</option>
              <option value="Finance">Finance</option>
              <option value="Finance and Accounting">Finance and Accounting</option>
              <option value="Financial Engineering">Financial Engineering</option>
              <option value="Fine Arts">Fine Arts</option>
              <option value="Fire Engineering">Fire Engineering</option>
              <option value="Forest Engineering">Forest Engineering</option>
              <option value="Forestry">Forestry</option>
              <option value="French">French</option>
              <option value="Freshwater Management">Freshwater Management</option>

              <option value="Gender and sexual studies">Gender and sexual studies</option>
              <option value="Geographic Information Science">Geographic Information Science</option>
              <option value="Geography">Geography</option>
              <option value="Geology">Geology</option>
              <option value="German">German</option>
              <option value="Graphic Design">Graphic Design</option>

              <option value="Hazard and Disaster Management">Hazard and Disaster Management</option>
              <option value="Health Sciences">Health Sciences</option>
              <option value="Higher Education">Higher Education</option>
              <option value="History">History</option>
              <option value="Hōaka Pounamu: Te Reo Māori Bilingual and Immersion Teaching">Hōaka Pounamu: Te Reo Māori Bilingual and Immersion Teaching</option>
              <option value="Holocaust">Holocaust</option>
              <option value="Human Interface Technology">Human Interface Technology</option>
              <option value="Human Resource Management">Human Resource Management</option>
              <option value="Human Services">Human Services</option>

              <option value="Inclusive and Special Education">Inclusive and Special Education</option>
              <option value="Industrial and Organisational Psychology">Industrial and Organisational Psychology</option>
              <option value="Information Systems">Information Systems</option>
              <option value="Information technology">Information technology</option>
              <option value="International Business">International Business</option>
              <option value="International Law and Politics">International Law and Politics</option>
              <option value="International Business/Trade">International Business/Trade</option>
              <option value="Internet">Internet</option>
              <option value="Investment">Investment</option>
              <option value="IT Management">IT Management</option>

              <option value="Japanese">Japanese</option>
              <option value="Journalism">Journalism</option>
              <option value="Journalism, mass media and communication">Journalism, mass media and communication</option>

              <option value="Latin-American Studies">Latin-American Studies</option>
              <option value="Law">Law</option>
              <option value="Leadership">Leadership</option>
              <option value="Learning Support">Learning Support</option>
              <option value="Legal Issues">Legal Issues</option><option value="Linguistics">Linguistics</option><option value="Literacy">Literacy</option><option value="Literature">Literature</option>
              <option value="Logistics">Logistics</option>
              <option value="Logic and programming">Logic and programming</option>

              <option value="Management">Management</option>
              <option value="Management Science">Management Science</option>
              <option value="Māori">Māori</option>
              <option value="Māori and Indigenous Studies">Māori and Indigenous Studies</option>
              <option value="Marketing">Marketing</option>
              <option value="Mathematical Physics">Mathematical Physics</option>
              <option value="Mathematics">Mathematics</option>
              <option value="Mathematics and Philosophy">Mathematics and Philosophy</option>
              <option value="Mechanical Engineering">Mechanical Engineering</option><option value="Mechatronics Engineering">Mechatronics Engineering</option>
              <option value="Media and Communication">Media and Communication</option>
              <option value="Medical Physics">Medical Physics</option>
              <option value="Medicine">Medicine</option>
              <option value="Medicine and Health">Medicine and Health</option>
              <option value="Microbiology">Microbiology</option>
              <option value="Military sciences">Military sciences</option>
              <option value="Movies">Movies</option>
              <option value="Music">Music</option>

              <option value="Native-American Studies">Native-American Studies</option>
              <option value="Natural Resources Engineering">Natural Resources Engineering</option>
              <option value="Nature">Nature</option>
              <option value="Nursing">Nursing</option>
              <option value="Nutrition">Nutrition</option>

              <option value="Operations and Supply Chain Management">Operations and Supply Chain Management</option>
              <option value="Other">Other</option>

              <option value="Pacific Studies">Pacific Studies</option>
              <option value="Painting">Painting</option>
              <option value="Palliative Care">Palliative Care</option>
              <option value="Pedagogy">Pedagogy</option>
              <option value="Pharmacology">Pharmacology</option>
              <option value="Philosophy">Philosophy</option>
              <option value="Photography">Photography</option>
              <option value="Physical Education">Physical Education</option>
              <option value="Physics">Physics</option>
              option value="Plant Biology">Plant Biology</option>
              <option value="Political Science">Political Science</option>
              <option value="Primary Teacher Education">Primary Teacher Education</option>
              <option value="Printmaking">Printmaking</option>
              <option value="Professional Development">Professional Development</option>
              <option value="Psychology">Psychology</option>
              <option value="Public Health">Public Health</option>
              <option value="Public Relations">Public Relations</option>
              <option value="Public Safety">Public Safety</option>

              <option value="Religion and Theology">Religion and Theology</option>
              <option value="Resilience and Sustainability">Resilience and Sustainability</option>
              <option value="Russian">Russian</option>

              <option value="Science and Entrepreneurship">Science and Entrepreneurship</option>
              <option value="Science Education">Science Education</option>
              <option value="Science, Māori and Indigenous Knowledge
              Sculpture">Science, Māori and Indigenous Knowledge
              Sculpture</option>
              <option value="Seafood Sector: Management and Science">Seafood Sector: Management and Science</option>
              <option value="Secondary Teacher Education">Secondary Teacher Education</option>
              <option value="Software Engineering">Software Engineering</option>
              <option value="Shakespeare Studies">Shakespeare Studies</option>
              <option value="Social Work">Social Work</option>
              <option value="Sociology">Sociology</option>
              <option value="Soil Science">Soil Science</option>
              <option value="South Asia Studies">South Asia Studies</option>
              <option value="Spanish">Spanish</option>
              <option value="Specialist Teaching">Specialist Teaching</option>
              <option value="Speech and Language Pathology, Speech and Language Sciences">Speech and Language Pathology, Speech and Language Sciences</option>
              <option value="Sport Coaching">Sport Coaching</option>
              <option value="Statistics">Statistics</option>
              <option value="Strategic Leadership">Strategic Leadership</option>
              <option value="Strategy and Entrepreneurship">Strategy and Entrepreneurship</option>

              <option value="Taxation and Accounting">Taxation and Accounting</option>
              <option value="Te Reo Māori">Te Reo Māori</option>
              <option value="Teacher Education">Teacher Education</option>
              <option value="Teacher's Career">Teacher's Career</option>
              <option value="Teaching and Learning">Teaching and Learning</option>
              <option value="Technology">Technology</option>
              <option value="Tertiary Teaching">Tertiary Teaching</option>
              <option value="Theatre">Theatre</option>
              <option value="Tourism">Tourism</option>
              <option value="Trade">Trade</option>
              <option value="Transportation Engineering">Transportation Engineering</option>

              <option value="Water Resource Management">Water Resource Management</option>
              <option value="Web Design">Web Design</option>
              <option value="West European Studies">West European Studies</option>
                                              
                                              
              </select>
              @if ($errors->has('discipline'))
                  <span class="help-block" style="color:#a94442">
                  <strong>{{ $errors->first('discipline') }}</strong>
               </span>
              @endif
                    </div>
                  </div>
                   
                </div>
                 <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                    
                        <label for="kUI_datetimepicker_basic" class="uk-form-label">Deadline date: (Select Urgency)</label>
                        <input id="kUI_datetimepicker_basic" value="{{ (old('deadline')) ? old('deadline') : $order->deadline }}" name="deadline" />
                        @if ($errors->has('deadline'))
                        <span class="help-block" style="color:#a94442">
                        <strong>{{ $errors->first('deadline') }}</strong>
                     </span>
                      @endif
                     
                    </div>
                     
                  </div>
                  @if(Auth::user()->hasRole('admin'))
                   <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Order Price ( KES) <small>Note : Base Price is set as  00   KES / page (double spacing)</small><span class="req">*</span></label>
                      <input type="text" name="client_price" value="{{ (old('client_price')) ? old('client_price') : $order->client_price }}" class="md-input" />
                       @if ($errors->has('client_price'))
                        <span class="help-block" style="color:#a94442">
                        <strong>{{ $errors->first('client_price') }}</strong>
                     </span>
                      @endif
                    </div>
                  </div>
                   @endif
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Track Order Id:<span class="req">*</span></label>
                      <input type="text" name="track_id" value="{{ (old('track_id')) ? old('track_id') : $order->track_id }}" class="md-input" />
                      @if ($errors->has('track_id'))
                        <span class="help-block" style="color:#a94442">
                        <strong>{{ $errors->first('track_id') }}</strong>
                     </span>
                      @endif
                    </div>
                  </div>
                   <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Citation Style<span class="req">*</span></label>
                       <select id="select_demo_2" name="citation" value="{{ (old('citation')) ? old('citation') : $order->citation }}" class="md-input">
                              <option value="" disabled selected hidden>Select...</option>
                              <option value="APA">APA</option>
                              <option value="MLA">MLA</option>
                              <option value="Turabian">Turabian</option>
                              <option value="Chicago">Chicago</option>
                              <option value="Harvard">Harvard</option>
                              <option value="Other">Other</option>
                                
                                
                        </select>
                        @if ($errors->has('citation'))
                        <span class="help-block" style="color:#a94442">
                        <strong>{{ $errors->first('citation') }}</strong>
                     </span>
                      @endif
                    </div>
                  </div>
                   
                </div>
                 <div class="uk-grid" data-uk-grid-margin>
                  <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Number of sources:<span class="req">*</span></label>
                      <select id="select_demo_2" name="no_of_sources" value="{{ (old('no_of_sources')) ? old('no_of_sources') : $order->no_of_sources }}" class="md-input">
                      <option value="" disabled selected hidden>Select...</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="12">13</option>
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
                      <option value="81">81</option>
                      <option value="82">82</option>
                      <option value="83">83</option>
                      <option value="84">84</option>
                      <option value="85">85</option>
                      <option value="86">86</option>
                      <option value="87">87</option>
                      <option value="88">88</option>
                      <option value="89">89</option>
                      <option value="90">90</option>
                      <option value="91">91</option>
                      <option value="92">92</option>
                      <option value="93">93</option>
                      <option value="94">94</option>
                      <option value="99">99</option>
                      <option value="96">96</option>
                      <option value="97">97</option>
                      <option value="98">98</option>
                      <option value="99">99</option>
                      <option value="100">100</option>
                                              
                                
                        </select>
                         @if ($errors->has('no_of_sources'))
                        <span class="help-block" style="color:#a94442">
                        <strong>{{ $errors->first('no_of_sources') }}</strong>
                     </span>
                      @endif
                    </div>
                  </div>
                   <div class="uk-width-medium-1-2">
                    <div class="parsley-row">
                      <label for="fullname">Order instructions:<span class="req">*</span></label>
                      <textarea  name="instructions" value="{{ (old('instructions')) ? old('instructions') : $order->instructions }}" class="md-input"></textarea>
                       @if ($errors->has('instructions'))
                        <span class="help-block" style="color:#a94442">
                        <strong>{{ $errors->first('instructions') }}</strong>
                     </span>
                      @endif
                    </div>
                  </div>
                   
                </div>
                <p><span style="padding:0px 10px; margin: 0px 10px 10px 10px; float:left; background: #00FFFF"><i class="uk-icon-info md-36 uk-text-warning"></i></span>: If you wish to upload files, Please do so on 'Add Files' link on Manage Order section.</p>
               
                <div class="uk-grid">
                  <div class="uk-width-1-1">
                    <button type="submit" class="md-btn md-btn-primary" style="float:right">Update Order</button>
                  </div>
                </div>
              </form>
                </div>
            </div>
        </div>
    </div>


@endsection
 @section('page-script')
   {!! Html::script('admin/assets/js/kendoui_custom.min.js') !!}
   {!! Html::script('admin/assets/js/pages/kendoui.min.js') !!}
    @stop
