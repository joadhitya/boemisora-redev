@extends('layouts.app-web')

@section('content')

<x-sections.section-blogs :blogs="$blogs" />
<x-sections.section-book />

@endsection
