@extends('layouts.app')
@section('title', 'Newsfeed Page')
@section('data-page-id', 'newsfeed')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('modules.newsfeed.breadcrumb-name')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container" style="background-color: #DCDCDC;">
            <div class="row">
                @include('modules.newsfeed.rentee-masterimage')
            </div>
            <br>
            <div class="row">
                @include('modules.newsfeed.rentee-bottomimage')
            </div>
            <br>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="container" style="background-color: #DCDCDC; padding: 1rem;">
            <div class="row">
                @include('modules.newsfeed.rentee-footer')
            </div>
        </div>
    </div>
    <br>
@stop