
<div class="col-lgh">
	<div class="headline primary">
	    <h4>2 Products Found</h4>
	    <div class="clearfix"></div>
	</div>
    @foreach($get_jobs as $show_job)
	   <div class="jp_job_post_main_wrapper_cont">
		<div class="jp_job_post_main_wrapper">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="jp_job_post_side_img">
						<img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
					</div>
					<div class="jp_job_post_right_cont">
						<h4><a  style="color: #00d7b3" href="{{ route('job-details' , $show_job->job_title_slug) }}">{!!$show_job->job_title!!}</a></h4>
						<p><a href="{{url($show_job->username)}}"> {!!$show_job->username!!} </a>&nbsp; <small style="color: #ccc;"> by {!! \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()!!}</small></p>
						<ul>
							<li><i class="fa fa-cc-paypal"></i>&nbsp;  ${!!$show_job->budget!!}</li>
							<li><i class="fa fa-map-marker"></i>&nbsp;{!!$show_job->country!!}</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="jp_job_post_right_btn_wrapper">
						<ul>
							<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
							<li><a href="#">{!!$show_job->price_type!!}</a></li>
							<li><a href="{!! route('job_proposal', $show_job->job_title_slug) !!}">Apply</a></li>
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
    @endforeach

    <div class="page primary paginations"> {{$get_jobs->links()}} </div>
</div>