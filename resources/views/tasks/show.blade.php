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
            <a class="btn btn-primary btn-sm" href="{{route('tasks.index')}}" role="button">Volver</a>
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Task
                    </div>
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center">{{ $task->title }}</h5>
                        <p class="card-text">{{ $task->content }}</p>
                    </div>
                    <div class="card-footer text-body-secondary d-flex justify-content-end">
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
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>