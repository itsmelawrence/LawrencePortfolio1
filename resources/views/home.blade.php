@extends('layouts.app')

@section('title', "Lawrence's Portfolio")

@section('content')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.services')
    @include('partials.gallery')
    @include('partials.testimonial')
    @include('partials.contact')
@endsection
