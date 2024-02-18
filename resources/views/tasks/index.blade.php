<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>ToDo</title>
    </head>
    <body>
        
        <div class="container">
            <a class="btn btn-primary btn-sm" href="{{route('tasks.create')}}" role="button">Create</a>
            <table class="table table-striped flex-fill">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th class="d-flex justify-content-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            @switch($task->status)
                                @case('P')
                                In Progress
                                @break
                                @case('F')
                                Finished
                                @break
                                @case('N')
                                New
                                @break
                                @default
                                Undefined Status
                            @endswitch
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <form class="" action="{{ route('tasks.show', $task) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-primary btn-sm mx-1" type="submit">Show</button>
                                </form>
                                <form class="" action="{{ route('tasks.edit', $task) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-primary btn-sm mx-1" type="submit">Edit</button>
                                </form>
                                <form class="" action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm mx-1" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </body>
</html>