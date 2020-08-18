@extends('layouts.app')

@section('content')

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
                            <a href="/home" style="text-decoration:none; color: white;" class="btn btn-primary"><i class='fas fa-arrow-left'></i></a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FIN FORMULARIO PARA EDITAR EL REGISTRO -->
        </div>
    </div>
</div>

@endsection
