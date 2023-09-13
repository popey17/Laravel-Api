
      <div class="detailcard" style="width: 18rem;">
        <div class="p-2">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <img src="{{$deatilItem->image}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$deatilItem['name']}}</h5>
            <p>Category: {{$deatilItem->category->name}}</p>
            <p class="card-text">{{$deatilItem->description}}</p>
            <p>Price: {{ $deatilItem->price}}</p>
            @if($deatilItem->moq_amount!== null)
            <p>{{$deatilItem->moq_amount}} Pieces price: {{ $deatilItem->moq_price}}</p>
            @endif
        </div>
    </div>


    