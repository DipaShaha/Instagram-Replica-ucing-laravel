@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-md-4 ">
           <div>
                <div class=" d-flex align-items-center pt-3">
                    <div class="pr-3">
                        <img src="/storage/{{$post->user->profile->image}}" width="55px"   class="rounded-circle pr-1">
                    </div>
                    <div class="pt-2 pl-2">
                        <a href="/profile/{{$post->user->id}}"><span class="text-dark ">{{$post->user->username}}</span></a>
                        <a href="" class="pl-1 ">Follow</a>
                        
                    </div>
                </div>
                <hr/>
                <div><p>
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                         &nbsp;{{$post->caption}}
                    </p>
                </div>
           </div>
        </div>
        
    </div>

    
</div>
@endsection
