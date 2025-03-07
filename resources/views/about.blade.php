@extends('layouts.master')

@section('title', 'Home')


@section('content')


@php
$breadcrumbs = ['/' => 'Home', '/projects' => 'Projects', '/about' => 'About' , '/contact' => 'contact'];
@endphp

<x-page-header title="About Me" background="images/bg2.jpg" :breadcrumbs="$breadcrumbs" />

<x-about/>
<x-technologies/>

@endsection

@push('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
