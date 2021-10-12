@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white bg-opacity-80 bg-clip-padding p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>

            @if($posts->count())
            @foreach($posts as $post)

                   <div class="mb-4">
                       <a href="" class="font-bold">{{$post->user->name}} </a>

                       <span class="text-gray-600 text-xs"> {{$post->created_at->diffForHumans()}}</span>

                       <p class="mb-2">{{$post->body}}</p>

                       @can('delete',$post) {{-- defines the scope by policy --}}
                           <form action="{{route('post-delete',$post)}}" method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="text-blue-500"> Delete</button>
                           </form>
                       @endcan
                            <div class="flex items-center">
                                @if(!$post->likedBy(auth()->user()))
                                   <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                                       @csrf
                                       <button type="submit" class="text-red-600 bg-opacity-100"> <i class="fas fa-angle-up"></i> Like </button> {{-- Like button --}}
                                   </form>
                                @else
                                   <form action="{{route('posts.unlike',$post)}}" method="post" class="mr-1">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="text-red-600"><i class="fas fa-angle-down"></i>  Unlike </button>{{-- Unlike button --}}
                                   </form>
                                @endif
                                <span> {{$post->likes->count()}}
                                    {{ \Illuminate\Support\Str::plural('like',$post->likes->count()) }} </span>
                            </div>
                   </div>
                @endforeach
                {{$posts->links()}}
            @else
            no posts
            @endif

        </div>
    </div>
@endsection
