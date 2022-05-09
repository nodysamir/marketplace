@extends('backend.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            @include('backend.inc.message')
            <h3>Add SubCategory</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{ route('subcategory.store') }}" method="post">@csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="name of Subcategory">
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
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                       <option value="">Select Subcategory</option>
                                        @foreach (App\Models\Category::all() as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
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
