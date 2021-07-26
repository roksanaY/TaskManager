@extends('layout')

@section('content')

        <div class="md:container md:mx-auto md:m-10 md:p-10 m-2 p-2 shadow-2xl flex justify-center">

            <div class="pt-4 md:w-8/12 w-full">
                <h1 class="text-center text-2xl uppercase font-bold tracking-widest">Task Manager</h1>

                @if(session()->has('message'))

                    <p class="bg-green-100 p-2 mt-6">{{ session()->get('message')}}</p>

                @elseif($errors->any())

                    @foreach ($errors->all() as $error) 

                    <p class="bg-red-100 p-2 mt-6">{{ $error }}</p>

                    @endforeach

                @endif

                <form action="{{route('tasks.store')}}" method="POST">
                     @csrf
                    <input name="title" class="focus:ring-4 focus:ring-gray-300 border-2 w-full h-10 rounded mt-10 p-4" type="text" placeholder="Type new task..." />
                </form>

                <nav class="text-center py-6 flex justify-center">
                    <ul class="inline-flex space-x-4 underline cursor-pointer uppercase font-medium tracking-widest">
                        <li><a href="{{route('all')}}">All</a></li>
                        <li><a href="{{route('activetasks')}}">Active</a></li>
                        <li><a href="{{route('completedtasks')}}">Completed</a></li>
                    </ul>
                </nav>

                <div class="space-y-4 overflow-hidden">

              

                @forelse($tasks as $task)
                    <div class="flow-root bg-gray-100">
                        <div class="my-2 p-2 tracking-wider md:flex justify-center w-full"> 

                        @if($task->completed)

                        <div class="md:w-full sm:w-full md:text-left sm:text-center text-center md:border-r-4 md:border-b-0 sm:border-b-4 border-b-4 sm:border-r-0 border-r-0 md:pr-2 p-3 sm:p-3">

                            <p class="line-through text-black text-opacity-50">{{$task->title}}</p>

                        </div>

                        @else

                        <div class="md:w-full sm:w-full md:text-left sm:text-center text-center md:border-r-4 md:border-b-0 sm:border-b-4 border-b-4 sm:border-r-0 border-r-0 md:pr-2 p-3 sm:p-3">

                            <p class="">{{$task->title}}</p>
                        </div>

                        @endif

                            <div class="md:text-right md:w-6/12 sm:w-full w-full sm:pt-3 pt-3 flex justify-center self-center">

                                <span class="mx-2 md:mx-4"><a class="underline" href="{{route('tasks.edit', $task->id)}}">Edit</a></span>

                                <span><a onclick="event.preventDefault();
                                document.getElementById('modalID').style.display='block'" class="underline" href="{{route('tasks.destroy', $task->id )}}">Delete</a></span>

                                <form id="task-delete-{{$task->id}}" style="display:none" method="post" action="{{route('tasks.destroy', $task->id)}}">
                                    @csrf 
                                   {{@method_field('DELETE')}} 

                                </form>


                                @if($task->completed)


                                <span class="mx-2 md:mx-4"><a onclick="event.preventDefault();document.getElementById('task-active-{{$task->id}}').submit();" class="underline" href="{{route('active', $task->id)}}">Done</a></span>

                                <form id="task-active-{{$task->id}}" style="display:none" action="{{route('active', $task->id)}}" method="GET">
                                    @csrf
                                    @method_field('PATCH')
                                </form>                                  


                                @else

                                <span class="mx-2 md:mx-4"><a onclick="event.preventDefault();document.getElementById('task-complete-{{$task->id}}').submit();" class="underline" href="{{route('completed', $task->id)}}">Done</a></span>

                                <form id="task-complete-{{$task->id}}" style="display:none" action="{{route('completed', $task->id)}}" method="GET">
                                    @csrf
                                    @method_field('PATCH')
                                </form>

                                @endif

                            </div>

                        </div>
                    </div>



                    <!-- Delete Modal -->

                    <div id="modalID" class="hidden fixed z-10 left-0 top-0 pt-6 w-full h-full overflow-auto bg-gray-400 bg-opacity-90">
                        <span onclick="document.getElementById('modalID').style.display='none'" class="cursor-pointer absolute right-6 top-4 text-4xl text-bold" title="Close Modal">&times;</span>
                        <div class="flex justify-center p-10">
                            <form class="w-full md:w-4/5 bg-white my-4 mx-6 rounded shadow-2xl" action="/action_page.php">
                                <div class="p-2 md:p-6 text-center">
                                    <h1 class="text-2xl">Delete Task</h1>
                                    <p>Are you sure you want to delete this task?</p>

                                    <div class="overflow-hidden py-6 md:p-10 p-2">
                                        <button onclick="document.getElementById('modalID').style.display='none'" type="button" class="float-left w-full md:w-6/12 bg-gray-400 text-white p-4 mb-2 md:mb-0">Cancel</button>
                                        <button onclick="document.getElementById('task-delete-{{$task->id}}').submit();" type="button" class="float-left w-full md:w-6/12 bg-red-400 text-white p-4 mb-2 md:mb-0">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- End Delete Modal -->


                    @empty 

                    <h1 class="text-center text-xl uppercase font-bold tracking-widest">No Tasks Found</h1>

                @endforelse 

                </div>
            </div>

        </div>


        
        
@endsection


