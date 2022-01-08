<div class="row" style="max-height:60vh">
    <div class="col-12">
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-3">
                    <label class="image-checkbox" style="position: relative">
                        <img class="img-responsive border border-secondary my-1"
                            src="{{ $gallery->getUrl('small') }}"
                            style="max-width: 100%; height:auto;">
                        <input name="selectimage" value="{{$gallery->id}}" type="radio"
                            data-urlfull="{{$gallery->getUrl()}}"
                            data-rulsmall="{{$gallery->getUrl('small')}}"
                            data-urlmedium="{{$gallery->getUrl('medium')}}"
                            data-urllarge="{{$gallery->getUrl('large')}}"
                            style="position: absolute; top:5px; left:0px"
                        >
                        {{-- <i class="fa fa-check hidden"></i> --}}
                    </label>
                </div>
            @endforeach

        </div>
    </div>
</div>
