@extends('layout.main')

@section('body-content')

<div> {{ HTML::linkRoute('user-create', 'New User', '', array('class'=> 'btn btn-primary') ) }} </div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Ser.</th>
                     <th>Name</th>
                     <th>Contact</th>
                     <th>User Name</th>                   
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
             @foreach ($data as $user)

             <tr>
                <td>{{$ser++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->username }}</td>                
                <td class="center">{{ $user->email }}</td>
                <td class="center">
                <a href="{{ URL::route('delete-user-destroy',  array($user->id)) }}"><i class='glyphicon glyphicon-trash'></i> Delete</a> |
                <a href="{{ URL::route('user-get-edit',  array($user->id)) }}"><i class='glyphicon glyphicon-edit'></i> Edit</a> 
            </tr>
             @endforeach


         </tbody>
     </table>
 </div>
 <!-- /.table-responsive -->

</div>


@stop