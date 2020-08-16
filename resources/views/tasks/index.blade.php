<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tareas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
        <div class="container-fluid">
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <!-- FOMULARIO PARA CREAR UN NUEVO REGISTRO -->
                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="text-center">Crear tarea.</h1>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all()  as $error)
                                        - {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('tasks.store') }}" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="task_name"><strong>Tarea:</strong></label>
                                            <input type="text" name="task_name" class="form-control"
                                            placeholder="Nombre de la tarea" value="{{ old('task_name') }}">
                                        </div>
                                        <div class="col">
                                            <label for="task_name"><strong>Responsable:</strong></label>
                                            <select name="user_id" class="form-control">
                                                <option value="">Selecciona un usuario</option>
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{ $user->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="task_name"><strong>Fecha inicio:</strong></label>
                                            <input type="date" name="start_task_date" class="form-control"
                                            value="{{ old('start_task_date') }}">
                                        </div>
                                        <div class="col">
                                            <label for="task_name"><strong>Fecha fin:</strong></label>
                                            <input type="date" name="end_task_date" class="form-control"
                                            value="{{ old('end_task_date') }}">
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-success"><i class='fas fa-plus'></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- FIN FORMULARIO PARA CREAR UN NUEVO REGISTRO -->
                </div>
                <div class="col-sm-6">
                    <h1 class="text-center">Tareas</h1>
                    <table class="table table-sm table-hover table-responsive">
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
                                            <div class="row">
                                                <div class="col">
                                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('¿Deseas eliminar el registro?')">
                                                                <i class='fas fa-trash'></i>
                                                            </button>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <form action="{{ route('task.edit', $task) }}">
                                                        <button type="submit" class="btn btn-sm btn-info">
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
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
