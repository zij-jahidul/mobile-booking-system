

      <div class="form-group">
        <label>Select Category Level</label>
        <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
            <option value="0">Main Category</option>
                @foreach ($getCategories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                    @foreach ($category['subcategories'] as $subcategory)
                        <option value="{{ $subcategory['id'] }}">&nbsp;&raquo;&nbsp;
                            {{ $subcategory['category_name'] }}
                        </option>
                    @endforeach
                @endforeach

        </select>
      </div>

