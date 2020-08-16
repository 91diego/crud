<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tarea</th>
                                <th>Responsable</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>&nbsp;</th>
                            </tr>
                            <tbody>
                                <!-- Iteramos las tares enviadas desde el metodo index del controlador -->
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td> {{ $task->task_name }} </td>
                                        <td> {{ $task->user->name }} </td>
                                        <td> {{ $task->start_task_date }} </td>
                                        <td> {{ $task->end_task_date }} </td>
                                        <td>
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-sm btn-danger"
                                                value="Eliminar" onclick="return confirm('¿Deseas eliminar el registro?')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
