@extends('layouts.base')

@section('main')
    
<section class="multi_step_form">  
    <form id="msform" method="POST" action="{{ route('newTranscriptForm') }}"> 
        @csrf
      <!-- Tittle -->
      <div class="tittle">
        <h2>Transcript Request Process</h2>
        <p>Please fill this form</p>
      </div>
      <!-- progressbar -->
      <ul id="progressbar">
        <li class="active">Select transcripts</li>  
        <li>Upload proof of payment</li> 
        <li>Submit</li>
      </ul>
      <!-- fieldsets -->
      <fieldset>
        <h3>Select transcripts</h3>
        <div class="form-group">
            <label for="transcripts">Select your transcripts</label>
            <select name="transcripts[]" id="transcripts" class="form-control" multiple>
                <option value="1">1<up>st</up> year</option>
                <option value="2">2<up>nd</up> year</option>
                <option value="3">3<up>rd</up> year</option>
                <option value="4">4<up>th</up> year</option>
                <option value="5">5<up>th</up> year</option>
            </select>
        </div>
        <button type="button" class="action-button previous_button">Back</button>
        <button type="button" class="next action-button">Continue</button>  
      </fieldset>

      <fieldset>
        <h3>Prove your payment</h3>
        <h6>Please upload any of these documents to verify your payment.</h6>
        <div class="input-group"> 
          <div class="">
              <label class="" for="upload">
                  Choose file
              </label>
            <input type="file" class="form-control" name="proof" id="upload">
          </div>
        </div>
        <div class="form-group">
            <label for="std_name">Payer name</label>
            <input type="text" class="form-control" name="std_name" id="std_name">
        </div>
        <div class="form-group">
            <label for="slip_id">Payment slip ID</label>
            <input type="text" class="form-control" name="slip_id" id="slip_id">
        </div>
        <div class="form-group">
            <label for="payment_datetime">Time of payment (y:m:d h:m)</label>
            <input type="datetime" class="form-control" name="payment_datetime" id="payment_datetime">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" name="amount" id="amount">
        </div>
        <div class="form-group">
            <label for="bank_name">Bank name</label>
            <input type="text" class="form-control" name="bank_name" id="bank_name">
        </div>
        <div class="form-group">
            <label for="payer_name">Payer name (name on the document)</label>
            <input type="text" class="form-control" name="payer_name" id="payer_name">
        </div>
        <button type="button" class="action-button previous previous_button">Back</button>
        <button type="button" class="next action-button">Continue</button>  
      </fieldset>  

      <fieldset>
        <h3>Finish your request</h3>
        <h6>Please note that your request will be processed at avaerage of 2 days</h6>
        <p class="text-center"> click submit to finish </p>
        
        <button type="button" class="action-button previous previous_button">Back</button> 
        <button type="submit" class="action-button">Finish</button> 
      </fieldset>  
    </form>  
</section>        
    
@endsection
    
    @section('head')

    <style>
        /*font Variables*/
        /*Color Variables*/
        .multi_step_form {
        background: #f6f9fb;
        display: block;
        overflow-x: hidden;
        }
        .multi_step_form #msform {
        position: relative;
        padding-top: 50px;
        min-height: 820px;
            height: auto;
        max-width: 820px;
        margin: 0 auto;
        background: #ffffff;
        z-index: 1;
        }
        .multi_step_form #msform .tittle {
        padding-bottom: 55px;
        }
        .multi_step_form #msform .tittle h2 {
        font: 500 24px/35px "Roboto", sans-serif;
        color: #3f4553;
        padding-bottom: 5px;
        }
        .multi_step_form #msform .tittle p {
        font: 400 16px/28px "Roboto", sans-serif;
        color: #5f6771;
        }
        .multi_step_form #msform fieldset {
        border: 0;
        padding: 20px 105px 0;
        position: relative;
        width: 100%;
        left: 0;
        right: 0;
        }
        .multi_step_form #msform fieldset:not(:first-of-type) {
        display: none;
        }
        .multi_step_form #msform fieldset h3 {
        font: 500 18px/35px "Roboto", sans-serif;
        color: #3f4553;
        }
        .multi_step_form #msform fieldset h6 {
        font: 400 15px/28px "Roboto", sans-serif;
        color: #5f6771;
        padding-bottom: 30px;
        }
        .multi_step_form #msform fieldset .intl-tel-input {
        display: block;
        background: transparent;
        border: 0;
        box-shadow: none;
        outline: none;
        }
        .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag {
        padding: 0 20px;
        background: transparent;
        border: 0;
        box-shadow: none;
        outline: none;
        width: 65px;
        }
        .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow {
        border: 0;
        }
        .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow:after {
        position: absolute;
        top: 0;
        right: 0;
        font: normal normal normal 24px/7px Ionicons;
        color: #5f6771;
        }
        .multi_step_form #msform fieldset #phone {
        padding-left: 80px;
        }
        .multi_step_form #msform fieldset .form-group {
        padding: 0 10px;
        }
        .multi_step_form #msform fieldset .fg_2, .multi_step_form #msform fieldset .fg_3 {
        padding-top: 10px;
        display: block;
        overflow: hidden;
        }
        .multi_step_form #msform fieldset .fg_3 {
        padding-bottom: 70px;
        }
        .multi_step_form #msform fieldset .form-control, .multi_step_form #msform fieldset .product_select {
        border-radius: 3px;
        border: 1px solid #d8e1e7;
        padding: 0 20px;
        height: auto;
        font: 400 15px/48px "Roboto", sans-serif;
        color: #5f6771;
        box-shadow: none;
        outline: none;
        width: 100%;
        }
        .multi_step_form #msform fieldset .form-control.placeholder, .multi_step_form #msform fieldset .product_select.placeholder {
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control:-moz-placeholder, .multi_step_form #msform fieldset .product_select:-moz-placeholder {
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control::-moz-placeholder, .multi_step_form #msform fieldset .product_select::-moz-placeholder {
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control::-webkit-input-placeholder, .multi_step_form #msform fieldset .product_select::-webkit-input-placeholder {
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control:hover, .multi_step_form #msform fieldset .form-control:focus, .multi_step_form #msform fieldset .product_select:hover, .multi_step_form #msform fieldset .product_select:focus {
        border-color: rgb(39, 44, 74);
        }
        .multi_step_form #msform fieldset .form-control:focus.placeholder, .multi_step_form #msform fieldset .product_select:focus.placeholder {
        color: transparent;
        }
        .multi_step_form #msform fieldset .form-control:focus:-moz-placeholder, .multi_step_form #msform fieldset .product_select:focus:-moz-placeholder {
        color: transparent;
        }
        .multi_step_form #msform fieldset .form-control:focus::-moz-placeholder, .multi_step_form #msform fieldset .product_select:focus::-moz-placeholder {
        color: transparent;
        }
        .multi_step_form #msform fieldset .form-control:focus::-webkit-input-placeholder, .multi_step_form #msform fieldset .product_select:focus::-webkit-input-placeholder {
        color: transparent;
        }
        .multi_step_form #msform fieldset .product_select:after {
        display: none;
        }
        .multi_step_form #msform fieldset .product_select:before {
        position: absolute;
        top: 0;
        right: 20px;
        font: normal normal normal 24px/48px Ionicons;
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .product_select .list {
        width: 100%;
        }
        .multi_step_form #msform fieldset .done_text {
        padding-top: 40px;
        }
        .multi_step_form #msform fieldset .done_text .don_icon {
        height: 36px;
        width: 36px;
        line-height: 36px;
        font-size: 22px;
        margin-bottom: 10px;
        background: rgb(39, 44, 74);
        display: inline-block;
        border-radius: 50%;
        color: #ffffff;
        }
        .multi_step_form #msform fieldset .done_text h6 {
        line-height: 23px;
        }
        .multi_step_form #msform fieldset .code_group {
        margin-bottom: 60px;
        }
        .multi_step_form #msform fieldset .code_group .form-control {
        border: 0;
        border-bottom: 1px solid #a1a7ac;
        border-radius: 0;
        display: inline-block;
        width: 30px;
        font-size: 30px;
        color: #5f6771;
        padding: 0;
        margin-right: 7px;
        line-height: 1;
        }
        .multi_step_form #msform fieldset .passport {
        margin-top: -10px;
        padding-bottom: 30px;
        position: relative;
        }
        .multi_step_form #msform fieldset .passport .don_icon {
        height: 36px;
        width: 36px;
        line-height: 36px;
        font-size: 22px;
        position: absolute;
        top: 4px;
        right: 0;
        background: rgb(39, 44, 74);
        display: inline-block;
        border-radius: 50%;
        color: #ffffff;
        }
        .multi_step_form #msform fieldset .passport h4 {
        font: 500 15px/23px "Roboto", sans-serif;
        color: #5f6771;
        padding: 0;
        }
        .multi_step_form #msform fieldset .input-group {
        padding-bottom: 40px;
        }
        .multi_step_form #msform fieldset .input-group .custom-file {
        width: 100%;
        height: auto;
        }
        .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label {
        width: 168px;
        border-radius: 5px;
        cursor: pointer;
        font: 700 14px/40px "Roboto", sans-serif;
        border: 1px solid #99a2a8;
        transition: all 300ms linear 0s;
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label i {
        font-size: 20px;
        padding-right: 10px;
        }
        .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label:hover, .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label:focus {
        background: rgb(39, 44, 74);
        border-color: rgb(39, 44, 74);
        color: #fff;
        }
        .multi_step_form #msform fieldset .input-group .custom-file input {
        display: none;
        }
        .multi_step_form #msform fieldset .file_added {
        text-align: left;
        padding-left: 190px;
        padding-bottom: 60px;
        }
        .multi_step_form #msform fieldset .file_added li {
        font: 400 15px/28px "Roboto", sans-serif;
        color: #5f6771;
        }
        .multi_step_form #msform fieldset .file_added li a {
        color: rgb(39, 44, 74);
        font-weight: 500;
        display: inline-block;
        position: relative;
        padding-left: 15px;
        }
        .multi_step_form #msform fieldset .file_added li a i {
        font-size: 22px;
        padding-right: 8px;
        position: absolute;
        left: 0;
        transform: rotate(20deg);
        }
        .multi_step_form #msform #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        }
        .multi_step_form #msform #progressbar li {
            text-align: center;
        list-style-type: none;
        color: #99a2a8;
        font-size: 9px;
        width: calc(100%/3);
        float: left;
        position: relative;
        font: 500 13px/1 "Roboto", sans-serif;
        }
        .multi_step_form #msform #progressbar li:nth-child(2):before {
        content: "\f12f";
        }
        .multi_step_form #msform #progressbar li:nth-child(3):before {
        content: "\f457";
        }
        .multi_step_form #msform #progressbar li:before {
        content: "\f1fa";
        font: normal normal normal 30px/50px Ionicons;
        width: 50px;
        height: 50px;
        line-height: 50px;
        display: block;
        background: #eaf0f4;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        }
        .multi_step_form #msform #progressbar li:after {
            
        content: '';
        width: 100%;
        height: 10px;
        background: #eaf0f4;
        position: absolute;
        left: -50%;
        top: 21px;
        z-index: -1;
        }
        .multi_step_form #msform #progressbar li:last-child:after {
        width: 150%;
        }
        .multi_step_form #msform #progressbar li.active {
        color: rgb(39, 44, 74);
        }
        .multi_step_form #msform #progressbar li.active:before, .multi_step_form #msform #progressbar li.active:after {
        background: rgb(39, 44, 74);
        color: white;
        }
        .multi_step_form #msform .action-button {
            text-align: center;
        background: rgb(39, 44, 74);
        color: white;
        border: 0 none;
        border-radius: 5px;
        cursor: pointer;
        min-width: 130px;
        font: 700 14px/40px "Roboto", sans-serif;
        border: 1px solid rgb(39, 44, 74);
        margin: 0 5px;
        text-transform: uppercase;
        display: inline-block;
        }
        .multi_step_form #msform .action-button:hover, .multi_step_form #msform .action-button:focus {
        background: #405867;
        border-color: #405867;
        }
        .multi_step_form #msform .previous_button {
        background: transparent;
        color: #99a2a8;
        border-color: #99a2a8;
        }
        .multi_step_form #msform .previous_button:hover, .multi_step_form #msform .previous_button:focus {
        background: #405867;
        border-color: #405867;
        color: #fff;
        }
    </style>
    @endsection

    @section('foot')
        <script>
(function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    }; 
    
    //* Add Phone no select
    function phoneNoselect(){
        if ( $('#msform').length ){   
            $("#phone").intlTelInput(); 
            $("#phone").intlTelInput("setNumber", "+880"); 
        };
    }; 
    //* Select js
    function nice_Select(){
        if ( $('.product_select').length ){ 
            $('select').niceSelect();
        };
    }; 
    /*Function Calls*/  
    verificationForm ();
    phoneNoselect ();
    nice_Select ();
})(jQuery);
        </script>    
        
    @endsection