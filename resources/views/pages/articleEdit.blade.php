@extends('layout')
@section('content')
    <section>
        <h>Create an article</h>

        <form id="editArticleForm" action="">

            <input id="articleId" type="text" value="{{$article['id']}}" hidden>

            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input type="text" class="form-control" id="titleInput" placeholder="Article title" value="{{$article['title']}}">
            </div>

            <div class="mb-3">
                <label for="descriptionInput" class="form-label">Description</label>
                <textarea class="form-control" id="descriptionInput" rows="3">{{$article['description']}}</textarea>
            </div>

            <div class="mb-3">
                <label for="categoryInput" class="form-label">Category</label>
                <select id="categoryInput" class="form-select" name="category">
                    <option selected disabled>Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($article['category'] == $category->id) selected @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="authorInput" class="form-label">Author</label>
                <select id="authorInput" class="form-select" name="author">
                    <option selected disabled>Select author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                                @if($article['author'] == $author->id) selected @endif
                        >{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-9">
                        <label for="imageInput" class="form-label">Upload image for your article</label>
                        <input class="form-control" type="file" id="imageInput">
                    </div>
                    <div class="col-3">
                        <img class="w-100 @if($article['image']) d-block @endif " src="{{url("storage/".$article['image'])}}" alt="preview uploaded image" id="imagePreview" hidden>
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
