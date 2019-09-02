<div class="container">
    <h1>Upload Test</h1>

    <form action="{{ route('upload.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="attachment_id" value="33">
        <input type="hidden" name="attachment_type" value="product_type">

        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
            <label class="custom-file-label" for="image">Image</label>
            @if($errors->has('image'))
                <span class="invalid-feedback">
                    {{$errors->first('image')}}
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>