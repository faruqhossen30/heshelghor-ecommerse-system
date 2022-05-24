
 <option selected value="">Select Sub Category</option>
 @foreach ($subcategory as $subcat)
     <option value="{{ $subcat->id}}">{{ $subcat->name}}</option>
 @endforeach
