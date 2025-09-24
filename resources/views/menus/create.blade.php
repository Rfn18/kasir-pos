@extends('template.master')

@section('content')
    <div class="h-100 flex-grow-1 p-4 main-content">
        <h1>Tambah Menu</h1>
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
                <form action="{{ route('menus.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Nama Menu</label>
                         <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                         <label for="sluq" class="form-label">Route</label>
                         <input type="text" class="form-control" name="sluq" id="sluq" required>
                    </div>
                    <div class="mb-3">
                         <label for="parent_id" class="form-label">Parent Menu</label>
                         <select class="form-select" name="parent_id" id="parent_id">
                              <option value="">Pilih parent menu (opsional)</option>
                              @foreach ($menus as $menu)
                              <option value="{{$menu->id}}">{{$menu->name}}</option>
                              @endforeach
                         </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
               </form>
          </div>
        </div>
    </div>
@endsection
