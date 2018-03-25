@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Task <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addTask">+</button></h3>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th>Nombre</th> 
                                <th>User</th> 
                                <th>Estado</th>
                                <th>Descripción</th> 
                                <th>Acciones</th> 
                            </tr> 
                        </thead> 
                        <tbody>
                        @foreach($tasks as $task) 
                            <tr> 
                                <th scope="row">{{$task->id}}</th> 
                                <td>{{$task->name}}</td> 
                                <td>{{$task->user->name}}</td> 
                                <td>{{$task->status}}</td> 
                                <td>{{$task->description}}
                                <td><a type="button"  class="btn btn-primary" href="{{route('change', $task->id)}}">Cambio</button></td> 
                            </tr> 
                        @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('addTask') }}">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre tarea</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="taskName" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail2">Descripción</label>
            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Email" name="descripcion" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Usuario</label>
            <select class="form-control" name="userId">
              @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach  
            </select>
          </div>
          {{ csrf_field() }}
          <button type="submit" class="btn btn-default">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
