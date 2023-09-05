<div class="name">
    <div class="mb-3">
        @error('name_ar')
          <div class="alert alert-danger">
            {{$message}}  
          </div>          
        @enderror
        <label for="name_ar"  class="form-label">Name (AR)</label>
        <input type="text" class="form-control" name="name_ar" value="{{$category->name['ar'] ?? ''}}" placeholder="Name (AR)">
    </div>
    <div class="mb-3">
        @error('name_en')
          <div class="alert alert-danger">
            {{$message}}  
          </div>          
        @enderror
        <label for="name_en"  class="form-label">Name (EN)</label>
        <input type="text" class="form-control" id="name_en" name="name_en" value="{{$category->name['en']  ?? ''}}" placeholder="Name (EN)">
    </div>
</div>

<div class="description">

    <div class="mb-3">
        @error('description_ar')
            <div class="alert alert-danger">
            {{$message}}  
            </div>          
        @enderror
        <label for="description_ar"  class="form-label">Description (AR)</label>
        <textarea class="form-control" id="description_ar" name="description_ar" rows="3">{{$category->description['ar']  ?? ''}}</textarea>
    </div>
    <div class="mb-3">
        @error('description_en')
            <div class="alert alert-danger">
            {{$message}}  
            </div>          
        @enderror
        <label for="description_en"   class="form-label">Description (EN)</label>
        <textarea class="form-control" id="description_en" name="description_en" rows="3">{{$category->description['en']  ?? ''}}</textarea>
    </div>

</div>

<div class="image">
    @if ($category->getFirstMediaUrl('category'))
        <div class="image">
            <img src="{{$category->getFirstMediaUrl('category')}}" style="width: 100px; height:100px; object-fit:cover;">
        </div>
    @endif
    <div class="mb-3">
        @error('image')
            <div class="alert alert-danger">
            {{$message}}  
            </div>          
        @enderror
        <label for="formFile" class="form-label">Category Image</label>
        <input class="form-control" type="file" name="image" id="formFile">
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
        <input class="form-check-input" type="radio" name="status" id="active" value="active" @if($category->status =='active') checked @endif>
        <label class="form-check-label" for="active">
            Active
        </label>
      </div>
    </div>
    <div class="mb-2">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="archived" value="archived" @if($category->status =='archived') checked @endif>
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