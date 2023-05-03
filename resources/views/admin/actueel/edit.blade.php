<form action="" method="post" class="form-group">
    @csrf
    @method('PATCH')
    <textarea name="fulltext" class="form-control" id="file-picker">{{ $post->fulltext }}</textarea>
    <button type="submit" value="Update" class="btn btn-primary">Submit</button>
</form>