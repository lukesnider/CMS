@extends('layouts.test')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$page->title}}</div>

                <div class="panel-body">
			<p>{{$page->slug}}</p>
			<p>{{$page->body}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
