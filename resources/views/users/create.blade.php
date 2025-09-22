@extends('template.master')

@section('content')
<div class="h-100 flex-grow-1 p-4 main-content">
     <h1>Tambah User</h1>
     <div class="card">
          <div class="card-body">
               <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-html">Nama</label>
                         <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                         <label for="email" class="form-html">Email</label>
                         <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                         <label for="password" class="form-html">Password</label>
                         <input type="password" class="form-control" id="password" name="pasword" required>
                    </div>
                    <div class="mb-3">
                         <label for="role_id" class="form-label">Role</label>
                         <select class="form-select" name="role_id" id="role_id">
                              <option value="">Pilih Role</option>
                              <option value="1">Admin</option>
                              <option value="2">Kasir</option>
                              <option value="3">Gudang</option>
                              <option value="4">Owner</option>
                         </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
               </form> 
          </div>
     </div>
</div>
@endsection