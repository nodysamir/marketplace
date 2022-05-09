@extends('backend.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Manage Subcategory</h4>
            <div class="row justify-content-center">


                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($subcategories as $subcategory)


                                        <tr>
                                            <td>{{ $subcategory->category->name }}</td>
                                            <td>{{ $subcategory->name }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit',[$subcategory->id]) }}">
                                                    <button class="btn btn-sm btn-info"><i class="mdi mdi-table-edit"></i></button>
                                                </a>
                                            </td>
                                            <td><!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $subcategory->id }}">
    delete <i class="mdi mdi-delete"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $subcategory->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('subcategory.destroy',$subcategory->id) }}"  method="POST">@csrf
        @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            once deleted never be recoverd

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
</form>
  </div>
</div>


 </td>

                                        </tr>
                                        @empty
                                            <td>no subcategory to show</td>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
