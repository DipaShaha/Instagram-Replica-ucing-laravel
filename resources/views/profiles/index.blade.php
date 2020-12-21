@extends('layouts.app')

@section('content')
<div class="container">

    <!-- profile row -->
    <div class="row justify-content-center pt-3">
        <div class="col-md-3" >
            <img src="/storage/{{$user->profile->image}}" width="250px"  class="rounded-circle">
        </div>
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-baseline pt-3">
                <h1 >{{$user->username}}</h1>
                 @can('update',$user->profile)
            <a href="/p/create" class="">Add a Post</a>
            @endcan
                
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>243K</strong> Followers</div>
                <div class="pr-5"><strong>340</strong> Following</div>
            </div>
            <div class="pt-3 font-weight-bold"><strong style="font-weight: bolder;">{{$user->profile->title}} </strong></div>
            <div>{{$user->profile->description}} </div>
            <div><a href="#" style="color: blue">{{$user->profile->url}} </a></div>
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit" class="" style="color: red;font-weight: bolder;">Edit your profile</a>
            @endcan

        </div>
    </div>
    <!-- end profile row -->

    <!-- start post row -->
    <div class="row justify-content-center pt-3">
        @foreach($user->posts as $post)
        <div class="col-md-4" >
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100 pt-2">
            </a>
        </div>
        @endforeach
    </div>
    <!-- end post row -->
</div>
@endsection
