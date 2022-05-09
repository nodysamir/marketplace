@extends('backend.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            @include('backend.inc.message')
            <h3>Update Childcategory</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{ route('childcategory.update',[$childcategories->id]) }}" method="post">@csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $childcategories->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">subcategory</label>

                                    <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                           <option value="">Choose category</option>
                                        @foreach (App\Models\Subcategory::all() as $subcategory )
                                           <option value="{{ $subcategory->id }}"{{ $childcategories->subcategory_id == $subcategory->id ? 'selected':''}} >{{ $subcategory->name }}</option>

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
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
