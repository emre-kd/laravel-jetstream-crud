<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Lists') }}
        </h2>


    </x-slot>



    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  

                <a href="{{ route('tasks.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Task</a>
    
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>

                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                        @foreach ($tasks as $task)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        {!! $task->id !!}
                                    </span>
                                </td>


                                <td class="px-6 py-4">{!! $task->description !!}</td>

                                <td class="px-6 py-4 hover:bg-sky-500 hover:ring-sky-500">
                                    <div class="flex justify-end gap-4">
                                        <a href="{{ route('tasks.show', $task->id) }}"
                                            class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                        <form class="inline-block" action="{{ route('tasks.destroy', $task->id) }}"
                                            method="POST" onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="text-red-600 hover:text-pink-900 cursor-pointer  "
                                                value="Delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
