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