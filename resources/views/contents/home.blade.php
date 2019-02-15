@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'home')

@section('content')
<br>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="margin:0; padding: 0;">
                <!-- Quick links Sidenav -->
                @include('modules.front.quicklinks')
            </div>
            <div class="col-lg-7">
                <!-- Carousel -->
                @include('modules.front.carousel')
                <br>
                <div style="background-color: #E9EBEE; padding: 1rem;">
                    @include('modules.front.categories')
                </div>
                <!-- Categories -->
            </div>
            <div class="col-lg-2" >
                <!-- Featured Products -->
                @include('modules.front.featured')
            </div>
        </div>
    </div>
</div>
@stop