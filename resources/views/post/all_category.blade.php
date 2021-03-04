@extends('welcome')

@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
    
        <a href ="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        <a href ="{{route('all.category')}}" class="btn btn-info">All Category</a>
        
       <hr>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
       
       <table class="table table-responsive">
       <tr>
       <th>SL</th>
       <th>Category Name</th>
       <th>Slug Name</th>
       <th>Action</th>
       </tr>
        @foreach($category as $row)
       <tr>
       <td>{{$row->id}}</td>
       <td>{{$row->name}}</td>
       <td>{{$row->slug}}</td>
        <td>
        <a href = "{{URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
        <a href = "{{URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
        <a href = "{{URL::to('view/category/'.$row->id)}}" class="btn btn-sm btn-success">view</a>
        </td>       
       </tr>
       @endforeach
       </table>
      </div>
    </div>

@endsection