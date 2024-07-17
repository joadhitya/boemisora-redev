@extends('layouts.app-web')

@section('content')

<x-sections.section-blog-single :blog="$blog" />
<x-sections.section-book />

@endsection
