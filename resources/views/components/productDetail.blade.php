<div class="detail">
    <div>
        <img src="{{$deatilItem->image}}" alt="">
    </div>
    <div>
        <h1>{{$deatilItem['name']}}</h1>
    </div>
    <div>
        <p>item Code: {{ $deatilItem->item_code}}</p>
        <p>Price: {{ $deatilItem->price}}</p>
        <p>Category: {{$deatilItem->category->name}}</p>
    </div>
    <div>
        <p>Description</p>
        <p>{{$deatilItem->description}}</p>
    </div>
</div>