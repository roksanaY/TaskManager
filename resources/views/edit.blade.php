@extends('layout')

@section('content')

        <div class="md:container md:mx-auto md:m-10 md:p-10 m-2 p-2 shadow-2xl flex justify-center">

            <div class="pt-4 md:w-8/12 w-full">
                <h1 class="text-center text-2xl uppercase font-bold tracking-widest">Edit Task</h1>

                @if(session()->has('message'))

                    <p class="bg-green-100 p-2 text-center sm:text-center md:text-left mt-6">{{ session()->get('message')}}</p>

                @elseif($errors->any())

                    @foreach ($errors->all() as $error) 

                    <p class="bg-red-100 p-2 text-center sm:text-center md:text-left mt-6">{{ $error }}</p>

                    @endforeach

                @endif

                <form class="text-center" action="{{route('tasks.update', $task->id)}}" method="POST">
                     @csrf
                     {{@method_field('PATCH')}}
                    <input name="title" class="focus:ring-4 focus:ring-gray-300 border-2 w-full h-10 rounded mt-10 p-4" type="text" value="{{$task->title}}" />
                    <div>
                        <input class="text-base cursor-pointer tracking-widest  mt-10 px-2 py-1 underline bg-white" type="submit" value="Update">
                        <a class="text-base tracking-widest mt-10 px-2 py-1 ml-4 underline" href="{{route('all')}}">Back</a>
                    </div>
                </form>



        </div>
@endsection
