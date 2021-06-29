{{-- @extends('layouts.master')

@section('content')
    <h1>{{$post->title}}</h1>
    <p><small>By <a href="{{route('home')}}/user/{{$post->user->id}}">{{$post->user->name}}</a></small></p>
    <p><strong><a href="{{ route('home')}}/category/{{$post->category->slug}}"> {{$post->category->name}} </a></strong></p>
    <div>{!! $post->body !!}</div>
    <p><a href="/"><strong>Back</strong></a></p>
@endsection; --}}

<x-post-main-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <x-single-post :post=$post/>
    </main>
</x-post-main-layout>