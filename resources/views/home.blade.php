@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <x-page-header
        title="Home"
        background="images/bg2.jpg"
        :breadcrumbs="['/' => 'Home', '/projects' => 'Projects', '/about' => 'About' , '/contact' => 'contact']"
    />



    @include('components.services')
    @include('components.projects')
    @include('components.about')

@endsection
