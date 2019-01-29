@extends('layouts.app')
@section('title', 'Item Page')
@section('data-page-id', 'items')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- General Name Of Item -->
                @include('modules.items.breadcrumb-name')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- General Info Of Item -->
            @include('modules.items.item-description')
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <!-- Item Footer -->
            @include('modules.items.item-footer')
        </div>
    </div>
@stop