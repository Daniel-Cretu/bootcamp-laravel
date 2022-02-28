@extends('layout')
@section('content')
    <section>
        <h>Create a product</h>

        <form id="createProductForm" action="">

            <div class="mb-3">
                <label for="titleInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="titleInput" placeholder="Product name">
            </div>

            <div class="mb-3">
                <label for="descriptionInput" class="form-label">Description</label>
                <textarea class="form-control" id="descriptionInput" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="categoryInput" class="form-label">Category</label>
                <select id="categoryInput" class="form-select" name="category">
                    <option selected disabled>Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="warningsInput" class="form-label">Warnings</label>
{{--                <select id="authorInput" class="form-select" name="author">--}}
{{--                    <option selected disabled>Select warnings</option>--}}
{{--                    @foreach($authors as $author)--}}
{{--                        <option value="{{ $author->id }}">{{ $author->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
                <select id="warningsInput" class="form-select" multiple aria-label="size-3 multiple select example">
                    <option selected>No warnings selected</option>
                    @foreach($warnings as $warning)
                        <option value="{{ $warning->id }}">{{ $warning->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-9">
                        <label for="imageInput" class="form-label">Upload image for your product</label>
                        <input class="form-control" type="file" id="imageInput">
                    </div>
                    <div class="col-3">
                        <img class="w-100" src="" alt="preview uploaded image" id="imagePreview" hidden>
                    </div>
                </div>


            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </form>
    </section>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11" error-toasts-region>

    </div>
@endsection
