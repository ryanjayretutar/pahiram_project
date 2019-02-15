@extends('layouts.app')
@section('title', 'Profile Page')
@section('data-page-id', 'profile')

@section('content')
    <div class="container">
        <div class="row">
            @include('modules.profile.profile-cover')
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('modules.profile.profile-header')
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('modules.profile.profile-featured')
        </div>
    </div>
@stop