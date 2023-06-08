@extends('layout')
@section('title','Rooms')
@section('pageHeader')
@parent
@section('pageTitle','Ultimate Room')
@section('pageBread','Rooms')
@endsection
@section('content')
<section class="pageRoomsList">
    <div class="pageRoomsList__container">
        <div class="pageRoomsList__selectInput">
            <form method="get">
                <input type="date" name="arrivalDate" value="{{$checkIn}}" hidden>
                <input type="date" name="departureDate" value="{{$checkOut}}" hidden>
                <select class="pageRoomsList__selectInput__select" name="priceOrder" id="priceOrder" onchange="this.form.submit()">
                    <option class="pageRoomsList__selectInput__option" value="" hidden>
                        Order by price
                    </option>
                    <option class="pageRoomsList__selectInput__option" value="1">
                        Ascendent
                    </option>
                    <option class="pageRoomsList__selectInput__option" value="-1">
                        Descendent
                    </option>
                </select>
            </form>
        </div>
        @foreach ($rooms as $room)
        <div class="pageRoomsList__room">
            <div class="pageRoomsList__img">
                <img src="{{$room['photos'][0]}}" alt="" />
            </div>
            <div class="pageRoomsList__details">
                <div class="pageRoomsList__details-iconsBar">
                    @foreach ($icons as $icon)
                    <img src="public/images/{{$icon}}.svg" alt="" />
                    @endforeach
                </div>
                <h3 class="pageRoomsList__details-title">{{$room['roomType']}}</h3>
                <p class="pageRoomsList__details-text">
                    {{text_limit($room['description'],200,"...")}}
                </p>
            </div>
            <div class="pageRoomsList__price">
                <p class="pageRoomsList__price-number">
                    ${{$room['price']}}<small>/Night</small>
                </p>
                <hr />
                <a class="pageRoomsList__price-link" href="{{$roomDetailLink}}id={{$room['_id']}}">Book Now</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pageRoomsGrid__paginateBar">
        <span class="">
            @if ($currentPage > 1)
            <a href="{{$urlToLink}}page={{$currentPage-1}}">{{'<'}}</a>
            @else
            {{'<'}}
            @endif
        </span>
        @for ($i = 1; $i <= $pages; $i++) <span class={{$i===$currentPage ? 'active' : ''}}><a href="{{$urlToLink}}page={{$i}}">{{$i}}</a></span>
            @endfor
            <span class="">
                @if ($currentPage < $pages) <a href="{{$urlToLink}}page={{$currentPage+1}}">{{'>'}}</a>
                    @else
                    {{'>'}}
                    @endif
            </span>
    </div>
</section>
@endsection