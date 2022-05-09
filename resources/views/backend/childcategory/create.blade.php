@extends('backend.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            @include('backend.inc.message')
            <h3>Add Cildcategory</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{ route('childcategory.store') }}" method="POST">@csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="name of childcategory">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Subcategory</label>
                                    <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                          <option value="">Select Subcategory</option>
                                            @foreach (App\Models\Subcategory::all() as $category )
                                                   <option value="{{ $category->id }}">{{ $category->name }}</option>

                                            @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
