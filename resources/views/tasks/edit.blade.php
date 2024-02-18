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
                        <form action="{{ route('tasks.update', $task) }}" method="POST" class="col-md-6 offset-md-3">
                            @csrf
                            @method('PUT')
                            <div>
                                <input name="id" type="text" value="{{$task->id}}" hidden>
                            </div>
                            <div class="mb-3">
                                <input name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="5" placeholder="Content"></textarea>
                            </div>
                            <div class="mb-3">
                                <select name="status" class="form-select">
                                    <option value="N" selected>New</option>
                                    <option value="P">In progress</option>
                                    <option value="F">Finished</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>