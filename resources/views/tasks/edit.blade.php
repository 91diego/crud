<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Tarea</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <!-- FOMULARIO PARA EDITAR EL REGISTRO -->

                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="text-center">Editar tarea.</h1>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all()  as $error)
                                        - {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('task.update', $task) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-gruop">
                                    <div class="row">
                                        <div class="col">
                                            <label for="task_name"><strong>Tarea:</strong></label>
                                            <input type="text" name="task_name" class="form-control"
                                            placeholder="Nombre de la tarea" value="{{ $task['task_name'] }}">
                                        </div>
                                        <div class="col">
                                            <label for="user_id"><strong>Responsable:</strong></label>
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
                                            <label for="start_task_date"><strong>Fecha inicio:</strong></label>
                                            <input type="date" name="start_task_date" class="form-control"
                                            value="{{ $task['start_task_date'] }}">
                                        </div>
                                        <div class="col">
                                            <label for="end_task_date"><strong>Fecha fin:</strong></label>
                                            <input type="date" name="end_task_date" class="form-control"
                                            value="{{ $task['end_task_date'] }}">
                                        </div>
                                    </div>
                                    @csrf
                                    <br>
                                    <button type="submit" class="btn btn-success"><i class='fas fa-sync'></i></button>
                                    <a href="/" style="text-decoration:none; color: white;" class="btn btn-primary"><i class='fas fa-arrow-left'></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- FIN FORMULARIO PARA EDITAR EL REGISTRO -->
                </div>
            </div>
        </div>
    </body>
</html>
