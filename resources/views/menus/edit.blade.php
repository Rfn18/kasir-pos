@extends('template.master')

@section('content')
    <div class="h-100 flex-grow-1 p-4 main-content">
        <h1>Update Menu</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                         <label for="name" class="form-label">Nama Menu</label>
                         <input type="text" class="form-control" name="name" id="name" value="{{$menu->name}}" required>
                    </div>
                    <div class="mb-3">
                         <label for="sluq" class="form-label">Route</label>
                         <input type="text" class="form-control" name="sluq" id="sluq" value="{{$menu->sluq}}" required>
                    </div>
                    <div class="mb-3">
                         <label for="parent_id" class="form-label">Parent Menu</label>
                         <select class="form-select" name="parent_id" id="parent_id">
                              <option value="">Pilih parent menu (opsional)</option>
                              @foreach ($menus as $menuDetail)
                              <option value="{{$menuDetail->id}}" {{$menuDetail->id == $menu->parent_id ? 'selected' : ""}}>{{$menuDetail->name}}</option>
                              @endforeach
                         </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
