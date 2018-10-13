@extends('layouts.master')

@section('content')
	


<div>
	<div class="box">
		<div class="box-header">
			<div class="box-title">
				<h3>All Categories</h3>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-responsive">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Modify</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($categories as $cat ): ?>
					<tr>
						<td>{{$cat->title}}</td>
						<td>{{$cat->description}}</td>
						<td>
							<button class="btn btn-info"type="submit" name="edit" data-mytitle="{{$cat->title}}" data-mydescription="{{$cat->description}}" data-catid="{{$cat->id}}" data-toggle="modal" data-target="#edit">Edit</button>
							<button class="btn btn-danger" data-catid="{{$cat->id}}" type="submit" name="delete" data-toggle="modal" data-target="#delete">Delete</button>
						</td>
					</tr>
					<?php endforeach ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>

	
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add New
</button>

<!-- Modal Add New -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Category</h4>
      </div>
      <form action="{{route('category.store')}}" method="post">
      	{{csrf_field()}}
      	 <div class="modal-body">
      	 	<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" id="title">
			</div>
			<div class="form-group">
				<label for="des">Description</label>
				<textarea name="description" id="des" cols="20" rows="5" class="form-control"></textarea>
			</div> 
	     </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <form action="{{route('category.update', 'test')}}" method="post">
      	{{method_field('patch')}}
      	{{csrf_field()}}
      	 <div class="modal-body">
      	 	<!-- hidden Id -->
      	 	<input type="hidden" name="category_id" id="cat_id" value="">
      	 	
      	 	<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" id="title">
			</div>
			<div class="form-group">
				<label for="des">Description</label>
				<textarea name="description" id="des" cols="20" rows="5" class="form-control"></textarea>
			</div>
	     </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete-->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('category.destroy', 'test')}}" method="post">
      	{{method_field('delete')}}
      	{{csrf_field()}}
      	 <div class="modal-body">
      	 	<p class="text-center">
      	 		Are you sure to delete this?
      	 	</p>
      	 	<!-- hidden Id -->
      	 	<input type="hidden" name="category_id" id="cat_id" value="">
      	 	
      	 	
	     </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>

@endsection