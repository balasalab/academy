@extends('layouts.default')
@section('content')
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Academy Details</h3>
      </div>
      <div class="panel-body">
        <div class="row">
        	<div class="col-md-12">

        	<div class="jumbotron">
		        <h2>{{$data->academy_name}}</h2>
		        <p class="lead">{{$data->description}}</p>
		        <p>
		        	@foreach ($data->tags as $tag)
		        	<span class="label label-default">{{$tag->name}}</span>
		        	@endforeach
		        </p>
	      	</div>

        	<div class="row">
        		@foreach ($data->images as $value)
	            <div class="col-xs-6 col-lg-4">
	              <img width="100%" src="../resources/assets/image/{{ $value->url }}" >
	            </div><!--/.col-xs-6.col-lg-4-->
	            @endforeach
	        </div>
        	</div>
        </div>
      </div>
    </div>
    <style type="text/css">
    </style>
@stop