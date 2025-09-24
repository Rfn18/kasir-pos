@extends('template.master')

@section('content')
    <article class="h-100 flex-grow-1 p-4 main-content">
        <h1>Menu Aplikasi</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">Tambah Menu Aplikasi</a>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-stripped">
                    <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama Menu</th>
                             <th>URL</th>
                             <th>Parent Menu</th>
                             <th>Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach ($menus as $menu)
                         <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$menu->name}}</td>
                              <td>{{$menu->sluq}}</td>
                              <td>{{$menu->parent_id ? $menu->parent->name : "Tidak Ada"}}</td>
                              <td>
                                   <a href="{{route('menus.edit', $menu->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                   <form action="{{route('menus.destroy', $menu->id)}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                   </form>
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
            </div>
        </div>
    </article>
@endsection
