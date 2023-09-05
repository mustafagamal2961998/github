<div class="title">
    <div class="mb-3">
        @error('title_ar')
          <div class="alert alert-danger">
            {{$message}}  
          </div>          
        @enderror
        <label for="title_ar"  class="form-label">Title (AR)</label>
        <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$content->title['ar'] ?? ''}}" placeholder="Name (AR)">
    </div>
    <div class="mb-3">
        @error('title_en')
          <div class="alert alert-danger">
            {{$message}}  
          </div>          
        @enderror
        <label for="title_en"  class="form-label">Title (EN)</label>
        <input type="text" class="form-control" id="title_en" name="title_en" value="{{$content->title['en']  ?? ''}}" placeholder="Name (EN)">
    </div>
</div>


<div class="content">

    <div class="mb-3">
        @error('content_ar')
            <div class="alert alert-danger">
            {{$message}}  
            </div>          
        @enderror
        <label for="content_ar"  class="form-label">Content (AR)</label>
        <textarea class="form-control" id="content_ar" name="content_ar" rows="3">{{$content->content['ar']  ?? ''}}</textarea>
    </div>
    <div class="mb-3">
        @error('content_en')
            <div class="alert alert-danger">
            {{$message}}  
            </div>          
        @enderror
        <label for="content_en"   class="form-label">Content (EN)</label>
        <textarea class="form-control" id="content_en" name="content_en" rows="3">{{$content->content['en']  ?? ''}}</textarea>
    </div>

</div>
<div class="categories">
    <div class="mb-3">
        <label for="categories">Choose Category</label>
        <select name="category_id" id="categories" class="form-control">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name[Session::get('local',config('app.locale'))]}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="status">
    <div class="mb-2">
        <div class="form-check">
            @error('status')
                <div class="alert alert-danger">
                {{$message}}  
                </div>          
            @enderror
            <input class="form-check-input" type="radio" name="status" id="active" value="active" @if($content->status =='active') checked @endif>
            <label class="form-check-label" for="active">
                Active
            </label>
        </div>
    </div>
    <div class="mb-2">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="archived" value="archived" @if($content->status =='archived') checked @endif>
        <label class="form-check-label" for="archived">
          Archived
        </label>
      </div>
    </div>
</div>
<div class="button">
    <button type="submit" class="btn btn-primary">
        {{$button_label}}
    </button>
</div>


@push('script')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
@endpush