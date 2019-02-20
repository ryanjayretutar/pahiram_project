@extends('layouts.app')
@section('title', 'Reviews Page')
@section('data-page-id', 'review')

@section('content')
    <div class="container">
        <div class="row">
            @include('modules.reviews.image-review')
        </div>
    </div>
@stop