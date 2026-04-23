@extends('layouts.public')

@section('title', 'Home')

@section('content')

{{--HERO  --}}
<x-public.hero :categories="$categories" />

{{--FEATURED EVENTS  --}}
<x-public.featured-events :featuredEvents="$featuredEvents" />


{{--FEATURED EVENTS  --}}
<x-public.newsletter />

@endsection
