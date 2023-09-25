@extends('layouts.dashboard')

@section('container')
<div class="d-flex justify-content-between">
 <h1>Lab</h1>
 <a href="add_room.html" class="btn btn-primary" style="height: 40px">Add Lab</a>
</div>

<table class="table">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">Lab</th>
     <th scope="col">Kapasitas</th>
     <th scope="col">Ukuran</th>
     <th scope="col">Action</th>
   </tr>
 </thead>
 <tbody>
   <tr>
     <th scope="row">1</th>
     <td>A</td>
     <td>
      100 orang
     </td>
     <td>
       3x3
      </td>
     <td>
       <a href="" class="btn btn-warning">Edit</a>
       <a href="" class="btn mt-1 btn-danger">Delette</a>
     </td>
   </tr>
   <tr>
     <th scope="row">1</th>
     <td>A</td>
     <td>
      100 orang
     </td>
     <td>
       3x3
      </td>
     <td>
       <a href="" class="btn btn-warning">Edit</a>
       <a href="" class="btn mt-1 btn-danger">Delette</a>
     </td>
   </tr>
   <tr>
     <th scope="row">1</th>
     <td>A</td>
     <td>
      100 orang
     </td>
     <td>
       3x3
      </td>
     <td>
       <a href="" class="btn btn-warning">Edit</a>
       <a href="" class="btn mt-1 btn-danger">Delette</a>
     </td>
   </tr>
   <tr>
     <th scope="row">1</th>
     <td>A</td>
     <td>
      100 orang
     </td>
     <td>
       3x3
      </td>
     <td>
       <a href="" class="btn btn-warning">Edit</a>
       <a href="" class="btn mt-1 btn-danger">Delette</a>
     </td>
   </tr>
 </tbody>
</table>
@endsection