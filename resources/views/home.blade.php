@extends('layouts.app')

@section('title', "Lawrence's Portfolio")

@section('content')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.gallery')
    @include('partials.contact')
@endsection
