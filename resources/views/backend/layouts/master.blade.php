@if(Auth::user()->role_id == env('ADMIN'))
	@include('admin.layouts.header')
@else 
	@include('backend.layouts.header')
@endif
@yield('content')

@include('backend.layouts.footer')