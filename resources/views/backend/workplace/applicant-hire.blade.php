@extends('backend.layouts.master')

@section('title', 'All proposals lists ')

@section('css')
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">

	<link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
	<style type="text/css">
		.active {
		    border-bottom: none !important;
		}
		.text-muted {
		    color: #fff !important;
		}
		.card{
			border: none;
		}
		label{
			font-size: 14px !important;
			color: #000 !important;
		}
	</style>
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
			<div class="headline simple primary">
				<h4>Buy Credits</h4>
			</div>
			<div class="form-box-items wrap-1-3 right">
				<div class="hotlancer-work">
					<h3 class="up-post-sub">Additional Details right</h3>
					<div class="up-sub-mainup">
						
					</div>
				</div>
				
			</div>
            <div class="form-box-items wrap-3-1 left">
				<div class="hotlancer-work">
					<div class="hotla-work">
						<h3 class="up-post-sub v2">
							<img height="50px" class="user-avatar123" src="{{asset('image/'.$get_applicant->user_image)}}" alt="">	
							<a href="{{ route('profile_view', $get_applicant->username) }}" class="usernamehot">{{$get_applicant->username}}</a>
						</h3>						
						<div class="up-sub-mainup">
							
							<a class="hot-workoklike" href="{{url('workplace/'.$get_applicant->job_title_slug)}}" target="_blank" rel="noopener">{{$get_applicant->job_title}}</a>
							<br/>
						</div>
					</div>
				</div>

				<div class="hotlancer-work">
					<h3 class="up-post-sub">Add a billing method</h3>
						<div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
					<div class="up-sub-mainup">
						<b>Total Amount: ${{$get_applicant->proposal_budget}}</b><br><br/>
							
			            <div class="panel panel-default credit-card-box">
				                
				                <div class="panel-body">
				  
				                    @if (Session::has('success'))
				                        <div class="alert alert-success text-center">
				                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                            <p>{{ Session::get('success') }}</p>
				                        </div>
				                    @endif
				  
				                <form role="form" action="{{ route('payment_stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
				                        @csrf
				  					<input type="hidden" name="proposal_id" value="{{$get_applicant->proposal_id}}">
				                        <div class='form-row row'>
				                            <div class='col-xs-12 form-group required'>
				                                <label class='control-label'>Name on Card</label> 
				                                <input class='form-control' size='4' type='text'>
				                            </div>
				                        </div>
				  
				                        <div class='form-row row'>
				                            <div class='col-xs-12 form-group card required'>
				                                <label class='control-label'>Card Number</label> <input
				                                    autocomplete='off' class='form-control card-number' size='20'
				                                    type='text'>
				                            </div>
				                        </div>
				  
				                        <div class='form-row row'>
				                            <div class='col-xs-12 col-md-4 form-group cvc required'>
				                                <label class='control-label'>CVC</label> <input autocomplete='off'
				                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
				                                    type='text'>
				                            </div>
				                            <div class='col-xs-12 col-md-4 form-group expiration required'>
				                                <label class='control-label'>Expiration Month</label> <input
				                                    class='form-control card-expiry-month' placeholder='MM' size='2'
				                                    type='text'>
				                            </div>
				                            <div class='col-xs-12 col-md-4 form-group expiration required'>
				                                <label class='control-label'>Expiration Year</label> <input
				                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
				                                    type='text'>
				                            </div>
				                        </div>
				  
				                        <div class='form-row row'>
				                            <div class='col-md-12 error form-group hide'>
				                                <div class='alert-danger alert'>Please correct the errors and try
				                                    again.</div>
				                            </div>
				                        </div>
				  
				                        <div class="row">
				                            <div class="col-xs-12">
				                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (${{$get_applicant->proposal_budget}})</button>
				                            </div>
				                        </div>
				                          
				                    </form>
				                </div>
				        </div>        
				      
					</div>
				</div>
			</div>
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection


@section('js')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/> <input type='hidden' name='proposal_budget' value='<?php echo $get_applicant->proposal_budget; ?>'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>


@endsection
