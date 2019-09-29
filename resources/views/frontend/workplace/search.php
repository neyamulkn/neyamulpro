@extends('frontend.layouts.master')
@section('title', Request::segment(1). ' - HOTLancer')

@section('css')
	<link rel="stylesheet" href="{!! asset('allscript/css/vendor/simple-line-icons.css') !!}">
	<link rel="stylesheet" href="{{asset('allscript/css/vendor/font-awesome.min.css')}}">

@endsection
<style>
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
    position: relative;
}
.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
    float: left;
}
.col-lg-12 {
    width: 100%;
}
.col-lg-8 {
    width: 66.66666667%;
}
.col-lg-6 {
    width: 50%;
}
.col-lg-4 {
    width: 33.33333333%;
}
.col-lg-3 {
    width: 25%;
}
.col-lg-2 {
    width: 16.66666667%;
}
.jp_form_location_wrapper .first_icon, .jp_form_exper_wrapper .first_icon {
    position: absolute;
    top: 17px;
    font-size: 20px;
    left: 30px;
    z-index: 1;
    color: #00d7b3;
}
.jp_form_location_wrapper .second_icon, .jp_form_exper_wrapper .second_icon {
    margin-left: -30px;
    position: absolute;
    top: 19px;
}
.jp_form_btn_wrapper li a {
    float: left;
    width: 100%;
    height: 50px;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
    background: #00d7b3;
    color: #ffffff;
    line-height: 50px;
    text-align: center;
    font-weight: bold;
    font-size: 16px;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_header_form_wrapper {
    float: left;
    width: 90%;
    background: #ffffff24;
    padding: 30px;
    margin: 0 40px;
}
.jp_header_form_wrapper input, .jp_form_exper_wrapper input, input[type="text"] {
    width: 100%;
    height: 50px !important;
    -webkit-border-radius: 15px !important;;
    -moz-border-radius: 15px !important;;
    border-radius: 15px !important;
    border: transparent;
    padding-left: 20px;
    padding-right: 20px;
}
.jp_form_location_wrapper select, .jp_form_exper_wrapper select {
    width: 100%;
    height: 50px !important;;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
    border: transparent;
    padding-left: 55px;
    -webkit-appearance: none;
    -moz-appearance: none;
    position: relative;
}
.jp_top_header_img_wrapper {
    float: left;
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: relative;
    background-color: hsla(200,40%,30%,.4);
    background-image: url({{asset('allscript')}}/images/header_img.jpg);
    background-repeat: repeat-x;
    background-position: 0 40%, 0 95%, 0 0, 0 100%, 0 0;
    animation: 90s para infinite linear;
}
.jp_slide_img_overlay {
    position: absolute;
    top: 0%;
    right: 0%;
    left: 0%;
    bottom: 0%;
    background: #0e1427d4;
}
.jp_banner_heading_cont_wrapper {
    width: 100%;
    padding-top: 60px;
    max-width: 1280px;
    margin: 0 auto;
}
@keyframes para {
	100% {
		background-position: 
			-5000px 20%,
			-800px 95%,
			500px 0,
			1000px 100%,
			400px 0;
		}
}
.jp_job_cate_left_border {
    border-left: 1px solid #ffffff21;
}
.jp_top_jobs_category_wrapper {
    float: left;
    width: 16.5%;
    text-align: center;
    background: transparent;
    padding-top: 30px;
    padding-bottom: 30px;
    border-right: 1px solid #ffffff21;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1);
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);
}
.jp_top_jobs_category i {
    color: #00d7b3;
    font-size: 25px;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_top_jobs_category h3 {
    padding-top: 15px;
    font-size: 16px;
    font-weight: bold;
}
.jp_banner_jobs_categories_wrapper {
    float: left;
    width: 100%;
    height: 100%;
    background: #ffffff24;
    position: relative;
}
.jp_top_jobs_category_wrapper:hover {
    background: #00d7b3;
    box-shadow: 0px 0px 37px #00000091;
    z-index: 2;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.5);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.1);
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.1);
    transition: all 200ms ease-in;
    transform: scale(1.1);
}
.container {
    padding: 0 15px;
    margin: 0 auto;
    max-width: 1280px;
}
.jp_banner_main_jobs_wrapper {
    float: left;
    width: 100%;
    margin-top: 40px;
    padding-bottom: 50px;
    margin-left: 40px;
}
.jp_top_jobs_category_wrapper:hover .jp_top_jobs_category i {
    color: #ffffff;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_top_jobs_category h3 a {
    color: #ffffff;
}
.jp_banner_main_jobs li i {
    padding-right: 5px;
    color: #00d7b3;
}
.jp_banner_main_jobs li {
    float: left;
    margin-left: 20px;
}
.jp_banner_main_jobs li:first-child {
    margin-left: 0;
    color: #ffffff;
}
.jp_job_heading h1 {
    font-size: 60px;
    color: #ffffff;
    margin-left: 37px;
    text-align: left;
}
.jp_job_heading h1 span {
    color: #00d7b3;
    font-weight: bold;
}
.jp_job_heading p {
    font-size: 20px;
    color: #ffffffa8;
    padding-top: 10px;
    margin: 0 0 30px 41px;
}
.jp_banner_main_jobs li a {
    color: #ffffffcf;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_top_jobs_category p {
    font-size: 14px;
    color: #ffffffb8;
    padding-top: 5px;
}
.jp_hiring_slider_main_wrapper {
    width: 100%;
    background: #ffffff;
    border: 1px solid #e9e9e9;
    padding: 20px;
    overflow: auto;
}
.jp_hiring_slider_main_wrapper h3 {
    margin: 0 0 18px 14px;
	text-align: left;
}
.jp_hiring_content_main_wrapper {
    border: 1px solid #e9e9e9;
    border-bottom: 2px solid #00d7b3;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
	margin: 0 5px;
}
.jp_hiring_content_wrapper p {
    font-size: 14px;
    padding-top: 5px;
}
.jp_hiring_content_wrapper h4 {
    font-size: 14px;
    color: #000000;
    text-transform: uppercase;
    font-weight: bold;
    padding-top: 30px;
}
.jp_hiring_content_wrapper a {
    padding: 5px 20px;
    width: 110px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    color: #ffffff;
    background: #00d7b3;
    font-size: 12px;
    font-weight: bold;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
    margin: 0 auto;
}
.jp_job_post_main_wrapper {
    float: left;
    width: 100%;
    background: #ffffff;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 30px;
    padding-bottom: 30px;
    border: 1px solid #e9e9e9;
    border-bottom: 0;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_side_img {
    float: left;
    width: 105px;
}
.jp_job_post_right_cont {
    float: left;
    width: calc(100% - 105px);
    padding-left: 30px;
    padding-top: 10px;
}
.jp_job_post_right_cont h4 {
    font-size: 16px;
    color: #000000;
    font-weight: bold;
}
.jp_job_post_right_cont p {
    font-size: 16px;
    color: #00d7b3;
    padding: 10px 0;
}
.jp_job_post_right_cont li:first-child {
    margin-left: 0;
    color: #000000;
    font-size: 16px;
    font-weight: bold;
}
.jp_job_post_right_btn_wrapper ul {
    float: right;
    margin-top: 15px;
}
.jp_job_post_right_btn_wrapper li:first-child {
    margin-left: 0;
}
.jp_job_post_right_cont li i {
    color: #f36969;
}

.jp_job_post_right_btn_wrapper li:first-child a {
    float: left;
    width: 30px;
    height: 30px;
    border: 1px solid #e9e9e9;
    text-align: center;
    line-height: 30px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    color: #f36969;
    background: transparent;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_right_btn_wrapper li:nth-child(2) a {
    float: left;
    width: 100px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background: #37d09c;
    color: #ffffff;
    font-size: 12px;
    text-transform: uppercase;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
}
.jp_job_post_right_btn_wrapper li:last-child a {
    float: left;
    width: 100px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background: #f36969;
    color: #ffffff;
    font-size: 12px;
    text-transform: uppercase;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
}
.jp_job_post_right_cont li {
    margin-left: 20px;
    float: left;
}
.jp_job_post_right_btn_wrapper li:nth-child(2) {
    float: none;
    margin-left: 50px;
}
.jp_job_post_right_btn_wrapper li:last-child {
    margin-left: 50px;
    margin-top: 40px;
    float: none;
}
.jp_job_post_main_wrapper_cont:hover .jp_job_post_main_wrapper {
    border: 1px solid #00d7b3;
    border-bottom: 0;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_main_wrapper_cont:hover .jp_job_post_keyword_wrapper {
    border: 1px solid #00d7b3;
    border-top: 0;
    background: #00d7b3;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_keyword_wrapper {
    float: left;
    width: 100%;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 30px;
    padding-right: 30px;
    border: 1px solid #e9e9e9;
    background: transparent;
    border-top: 0;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_main_wrapper_cont:hover .jp_job_post_keyword_wrapper li, .jp_job_post_main_wrapper_cont:hover .jp_job_post_keyword_wrapper li i, .jp_job_post_main_wrapper_cont:hover .jp_job_post_keyword_wrapper li a {
    color: #ffffff;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_keyword_wrapper li i {
    padding-right: 5px;
    color: #00d7b3;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.jp_job_post_keyword_wrapper li {
    float: left;
    margin-left: 20px;
}
.jp_job_post_keyword_wrapper li a {
    color: #797979;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.col-lgh h2 {
    color: #535d5f;
    margin: 10px 0;
    text-align: left;
}
.jp_job_post_main_wrapper_cont {
    padding: 10px 0;
    overflow: auto;
}
.jp_add_resume_wrapper {
    background: url({{asset('allscript')}}/images/resume-bg.jpg) 50% 0 repeat-y;
    width: 100%;
    height: 100%;
    background-position: center 0;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    text-align: center;
    padding-left: 30px;
    padding-right: 30px;
}
.jp_add_resume_img_overlay {
    position: absolute;
    top: 0%;
    left: 0%;
    right: 0%;
    bottom: 0%;
    background: rgba(0,0,0,0.9);
}
.jp_add_resume_cont {
    position: relative;
    display: inline-block;
    padding-top: 45px;
    padding-bottom: 45px;
}
.jp_add_resume_cont h4 {
    font-size: 16px;
    color: #ffffff;
    padding-top: 25px;
    line-height: 25px;
    position: relative;
}
.jp_add_resume_cont ul {
    display: inline-block;
    margin-top: 35px;
}
.jp_add_resume_cont li a {
    float: left;
    width: 160px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    color: #ffffff;
    font-weight: bold;
    background: #23c0e9;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
.service-item.column {
    margin: 30px 0 7px 0 !important;
    margin-bottom: 0;
}
.owl-item img {
    display: block;
    width: 100%;
}
.jp_add_resume_cont img {
    width: 100%;
}
.col-lgh h3 {
    text-align: left;
    margin: 20px 0;
    color: #2b373a;
}
.upcenter {
    border-radius: 2px;
    box-shadow: 0 1px 6px rgba(57,73,76,.35);
    text-decoration: none;
    position: relative;
    overflow: hidden;
	background: white;
}
.my-20 {
    margin-bottom: 20px!important;
}
.hotml-5 {margin-left: 2px;}
.upcenter h5 {
    text-align: center;
    color: black;
    font-size: 15px;
    margin: 10px 0;
}
.upcenter img {
    width: 100%;
}
.hotm-10 {
    margin: 5px!important;
}
.col-lgh {
    overflow: auto;
}
.upcat a {
    color: #37a000;
    text-decoration: none;
    font-weight: 500;
}

.upcat {
    text-align: center;
    margin: 20px;
    font-size: 18px;
    font-family: inherit;
}
.col-lghup h3 {
    text-align: center;
    margin-bottom: 20px;
}
.col-lghup {
    max-width: 1200px;
    margin: 0 auto;
}
.container1 {
    overflow: auto;
    margin-bottom: 20px;
}
.upcenter1 h5 {
    text-align: center;
	color: #2b373a;
    font-size: 15px;
    margin: 10px 0;
}
.upcenter1 p {
    text-align: center;
	padding: 0 5px;
}
@media (max-width: 968px) {
.col-lg-12 {
    width: 100%;
}
.col-lg-4 {
    width: 100%;
}
.col-lg-3 {
    width: 100%;
}
.col-lg-2 {
    width: 100%;
}
.jp_header_form_wrapper {
    width: 100%;
}
.jp_job_heading h1 {
    font-size: 30px;
	margin-left: 0;
}
.jp_job_heading p {
    font-size: 20px;
    margin: 10px 0;
}
.jp_header_form_wrapper {
    float: left;
    width: 100%;
    padding: 30px;
    margin: 0;
}
.jp_banner_main_jobs_wrapper {
    margin-left: 0;
}
.jp_header_form_wrapper input, .jp_form_exper_wrapper input {
    margin-bottom: 10px;
}
.jp_form_location_wrapper {
    margin-bottom: 10px;
}
.jp_form_exper_wrapper {
    margin-bottom: 10px;
}
.jp_top_jobs_category_wrapper {
    width: 49%;
    border: 1px solid #ffffff21;
}
.col-lg-8 {
    float: none;
    width: 100%;
}
.jp_job_post_side_img {
    float: none;
    width: 100%;
}
.jp_job_post_side_img img {
    width: 100%;
    text-align: center;
}
.jp_job_post_right_cont {
    float: none;
    margin-top: 20px;
    width: 100%;
	padding-left: 0;
}
.jp_job_post_right_btn_wrapper ul {
    float: none;
    margin-top: 15px;
}
.jp_job_post_right_btn_wrapper li:nth-child(2) a {
    margin-right: 20px;
}
.jp_job_post_right_cont li {
    margin-left: 0px;
	margin-top: 5px;
    float: left;
}
}
</style>


@section('content')

	<!-- SECTION -->
	

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<div class="col-lgh">
				<h3>Find your freelancer or agency</h3>
				<div class="container1">
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up1.svg">
							<h5>Web, Mobile &amp; Software Dev</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up2.svg">
							<h5>Design & Creative</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up3.svg">
							<h5>Writing</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up4.svg">
							<h5>Sales & Marketing</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up5.svg">
							<h5>Admin Support</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up6.svg">
							<h5>Customer Service</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up7.svg">
							<h5>Data Science & Analytics</h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="upcenter hotm-10">
							<img src="{{asset('allscript')}}/images/up8.svg">
							<h5>Engineering & Architecture</h5>
						</div>
					</div>
				</div>
			</div>
			<p class="upcat">Don’t see what you’re looking for? <a href="#">See all categories</a></p>
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<div class="col-lg-12">
					<div class="jp_add_resume_wrapper">
						<div class="jp_add_resume_img_overlay"></div>
						<div class="jp_add_resume_cont">
							<img src="{{asset('allscript')}}/images/logo.png" alt="logo">
							<h4>Get Best Matched Jobs On your Email. Add Resume NOW!</h4>
							<ul>
								<li><a href="#"><i class="fa fa-plus-circle"></i> &nbsp;ADD RESUME</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sidebar">
					<ul class="dropdown hover-effect">
						<li class="dropdown-item">
							<a href="#">Design Inspires<span class="item-count">12</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Software<span class="item-count">27</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Interviews<span class="item-count">8</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Resources / Freebies<span class="item-count">15</span></a>
						</li>
						<li class="dropdown-item">
							<a href="#">Technology<span class="item-count">19</span></a>
						</li>
					</ul>
				</div>
				
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content left">
				<div class="jp_hiring_slider_main_wrapper">
					<h3>TOP HIRING COMPANIES</h3>
					<div class="col-lg-3">
						<div class="jp_hiring_content_main_wrapper">
							<div class="jp_hiring_content_wrapper">
								<img src="{{asset('allscript')}}/images/avatars/avatar_01.jpg" alt="hiring_img">
								<h4>Akshay INC.</h4>
								<p>(NewYork)</p>
								<a href="#">4 Opening</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="jp_hiring_content_main_wrapper">
							<div class="jp_hiring_content_wrapper">
								<img src="{{asset('allscript')}}/images/avatars/avatar_01.jpg" alt="hiring_img">
								<h4>Akshay INC.</h4>
								<p>(NewYork)</p>
								<ul>
									<li><a href="#">4 Opening</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="jp_hiring_content_main_wrapper">
							<div class="jp_hiring_content_wrapper">
								<img src="{{asset('allscript')}}/images/avatars/avatar_01.jpg" alt="hiring_img">
								<h4>Akshay INC.</h4>
								<p>(NewYork)</p>
								<ul>
									<li><a href="#">4 Opening</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="jp_hiring_content_main_wrapper">
							<div class="jp_hiring_content_wrapper">
								<img src="{{asset('allscript')}}/images/avatars/avatar_01.jpg" alt="hiring_img">
								<h4>Akshay INC.</h4>
								<p>(NewYork)</p>
								<ul>
									<li><a href="#">4 Opening</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lgh">
					<h2>Recent Jobs</h2>
					<div class="jp_job_post_main_wrapper_cont">
						<div class="jp_job_post_main_wrapper">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="jp_job_post_side_img">
										<img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
									</div>
									<div class="jp_job_post_right_cont">
										<h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
										<p>Webstrot Technology Pvt. Ltd.</p>
										<ul>
											<li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
											<li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="jp_job_post_right_btn_wrapper">
										<ul>
											<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
											<li><a href="#">Part Time</a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="jp_job_post_keyword_wrapper">
							<ul>
								<li><i class="fa fa-tags"></i>Keywords :</li>
								<li><a href="#">ui designer,</a></li>
								<li><a href="#">developer,</a></li>
								<li><a href="#">senior</a></li>
								<li><a href="#">it company,</a></li>
								<li><a href="#">design,</a></li>
								<li><a href="#">call center</a></li>
							</ul>
						</div>
					</div>
					<div class="jp_job_post_main_wrapper_cont">
						<div class="jp_job_post_main_wrapper">
							<div class="row">
								<div class="col-lg-8">
									<div class="jp_job_post_side_img">
										<img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
									</div>
									<div class="jp_job_post_right_cont">
										<h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
										<p>Webstrot Technology Pvt. Ltd.</p>
										<ul>
											<li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
											<li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="jp_job_post_right_btn_wrapper">
										<ul>
											<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
											<li><a href="#">Part Time</a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="jp_job_post_keyword_wrapper">
							<ul>
								<li><i class="fa fa-tags"></i>Keywords :</li>
								<li><a href="#">ui designer,</a></li>
								<li><a href="#">developer,</a></li>
								<li><a href="#">senior</a></li>
								<li><a href="#">it company,</a></li>
								<li><a href="#">design,</a></li>
								<li><a href="#">call center</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- CONTENT -->
		</div>
	</div>
	<div class="col-lghup">
		<h3>How it works</h3>
		<div class="container1">
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Post a job (it’s free)</h5>
					<p>Tell us about your project. Upwork connects you with top freelancers and agencies around the world, or near you.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Bids come to you</h5>
					<p>Get qualified proposals within 24 hours. Compare bids, reviews, and prior work. Interview favorites and hire the best fit.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Collaborate easily</h5>
					<p>Use Upwork to chat or video call, share files, and track project milestones from your desktop or mobile.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="upcenter1 hotm-10">
					<img src="{{asset('allscript')}}/images/up1.svg">
					<h5>Payment simplified</h5>
					<p>Pay hourly or fixed-price and receive invoices through Upwork. Pay for work you authorize.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /SECTION -->
	<div class="promo-banner dark left">
		<span class="icon-wallet"></span>
		<h5>Make money instantly!</h5>
		<h1>Start <span>Selling</span></h1>
		<a href="#" class="button medium primary">Open Your Shop!</a>
	</div>
	<div class="promo-banner secondary right">
		<span class="icon-tag"></span>
		<h5>Find anything you want</h5>
		<h1>Start Buying</h1>
		<a href="#" class="button medium dark">Register Now!</a>
	</div>
	<div id="services-wrap">
		<section id="services" class="services-v2">
			<!-- SERVICE LIST -->
			<div class="service-list small column3-wrap">
				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-present"></span>
					</div>
					<h3>Buy &amp; Sell Easily</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-lock"></span>
					</div>
					<h3>Secure Transaction</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-like"></span>
					</div>
					<h3>Products Control</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-diamond"></span>
					</div>
					<h3>Quality Platform</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-earphones-alt"></span>
					</div>
					<h3>Assistance 24/7</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-bubble"></span>
					</div>
					<h3>Support Forums</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->
			</div>
			<!-- /SERVICE LIST -->
			<div class="clearfix"></div>
		</section>
	</div>
	<div id="subscribe-banner-wrap">
		<div id="subscribe-banner">
			<!-- SUBSCRIBE CONTENT -->
			<div class="subscribe-content">
				<!-- SUBSCRIBE HEADER -->
				<div class="subscribe-header">
					<figure>
						<img src="{{asset('allscript')}}/images/news_icon.png" alt="subscribe-icon">
					</figure>
					<p class="subscribe-title">Subscribe to our Newsletter</p>
					<p>And receive the latest news and offers</p>
				</div>
				<!-- /SUBSCRIBE HEADER -->

				<!-- SUBSCRIBE FORM -->
				<form class="subscribe-form">
					<input type="text" name="subscribe_email" id="subscribe_email" placeholder="Enter your email here...">
					<button class="button medium dark">Subscribe!</button>
				</form>
				<!-- /SUBSCRIBE FORM -->
			</div>
			<!-- /SUBSCRIBE CONTENT -->
		</div>
	</div>
	<!-- /SECTION -->
@endsection

@section('js')


@endsection