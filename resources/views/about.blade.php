@extends('layouts.app')

@section('title', 'About Us - Chartered Insights')
@section('meta_description', 'Learn about Chartered Insights - leading Chartered Accountancy firm in Nepal with expert
    team, proven track record, and commitment to excellence.')

@section('content')
    <!-- Hero Section -->
    <x-jumbotron page-slug="about" />
    @includeIF('front.cache.about.index')
@endsection
