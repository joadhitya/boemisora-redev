@extends('layouts.app-web')

@section('content')
    {{-- <x-sections.section-home-about :aboutUs="$about_us"/> --}}
    <x-sections.section-home-map />
    {{-- <x-sections.section-home-story :values="$values"/> --}}
    <x-sections.section-home-testimonial />
    <x-sections.section-home-contact />

    <x-sections.section-book />
@endsection
