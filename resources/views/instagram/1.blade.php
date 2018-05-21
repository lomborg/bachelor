@extends('instagram.layout')

@section('content')

<style type="text/css">


	.instagram-widget .row {
	    margin-left: auto;
	    margin-right: auto;
	    margin-bottom: 20px;
	}

	.instagram-widget .row:after {
	    content: "";
	    display: table;
	    clear: both;
	}

	.instagram-widget .row .col {
	    float: left;
	    -webkit-box-sizing: border-box;
	    box-sizing: border-box;
	    padding: 0 .75rem;
	    min-height: 1px;
	}

	.instagram-widget .row .col.s12 {
	    width: 100%;
	    margin-left: auto;
	    left: auto;
	    right: auto;
	    max-width: 600px;
	}

	.instagram-widget .row .card {
	    position: relative;
	    margin: .5rem 0 1rem 0;
	    background-color: #fff;
	    -webkit-transition: -webkit-box-shadow .25s;
	    transition: -webkit-box-shadow .25s;
	    transition: box-shadow .25s;
	    transition: box-shadow .25s, -webkit-box-shadow .25s;
	    border-radius: 2px;

        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
	}

	.instagram-widget .hoverable:hover{-webkit-box-shadow:0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);box-shadow:0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}

	.instagram-widget .row .black-text {
    	color: black !important;
	}

	.instagram-widget .row img.responsive-img {
    	max-width: 100%;
    	height: auto;
	}

	.instagram-widget .row .padding-10 {
    	padding: 10px !important;
	}

	.instagram-widget .row .truncate {
	    display: block;
	    white-space: nowrap;
	    overflow: hidden;
    	text-overflow: ellipsis;
	}

	.instagram-widget .row .col.s6 {
	    width: 50%;
	    margin-left: auto;
	    left: auto;
	    right: auto;
	}
	
	.instagram-widget .row .right-align {
    	text-align: right;
	}

	.instagram-widget .row .instagram-card {
		padding: 0 !important;
	}

	.instagram-widget .row .padding-10{
		padding: 10px !important;
	}

	.instagram-widget-icon {
		width: 16px;
	}

</style>

<div class="instagram-widget">

<div class="row">

@foreach($feed as $img)
		
		@break($loop->index == $columns*$rows)
	
	<div class="col s12">
		<a href=" {{ $img['permalink']}} " class="black-text" target="_blank">
			<div @if($image_wrap == 1) class="col s12 m12 l12 card instagram-card hoverable" @else class="col s12 m12 l12 instagram-card" @endif>
				<div>
					<img src="{{ $img['media_url'] }}" class="responsive-img card-img">
				</div>
				
				@if($image_wrap == 1)
				<div class="padding-10 truncate">
					@if(isset($img['caption']))
						{{ $img['caption'] }}
					@endif

				</div>
				
				<div class="col s6 grey-text padding-10 right-align">
					<img src="{{ env('APP_URL') }}/img/icons/heart.svg" class="instagram-widget-icon">
					{{ $img['like_count'] }}	 
				</div>
				
				<div class="col s6 grey-text padding-10">
					<img src="{{ env('APP_URL') }}/img/icons/comment.svg" class="instagram-widget-icon">
					{{ $img['comments_count'] }} 
				</div>
				@endif

			</div>
		</a>
	</div>
	
	@if ($loop->iteration % 1 == 0)
    
    </div>
    
    <div class="row">
	
	@endif

@endforeach

</div>
</div>

@endsection
