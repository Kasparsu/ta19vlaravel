<div id="slider-{{$id}}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
    <div class="carousel-inner">
        @foreach($images as $key=>$image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{$image->path}}" class="d-block w-100" alt="...">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slider-{{$id}}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slider-{{$id}}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
