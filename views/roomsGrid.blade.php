@extends('layout')
@section('title','Rooms')
@section('pageHeader')
@parent
@section('pageTitle', 'Ultimate Rooms')
@section('pageBread','Rooms')
@endsection
@section('content')
<section class="pageRoomsGrid">
    <div class="pageRoomsGrid__container">
        <div class="pageRoomsGrid__selectInput">
            <form method="get">
                <select class="pageRoomsGrid__selectInput__select" name="priceOrder" id="priceOrder" onchange="this.form.submit()">
                    <option class="pageRoomsGrid__selectInput__option" value="" hidden>
                        Order by price
                    </option>
                    @if($order === 1)
                    <option class='pageRoomsGrid__selectInput__option' selected value='1'>
                        @else
                    <option class='pageRoomsGrid__selectInput__option' value='1'>
                        @endif
                        Ascendent
                    </option>
                    @if($order === -1)
                    <option class='pageRoomsGrid__selectInput__option' selected value='-1'>
                        @else
                    <option class='pageRoomsGrid__selectInput__option' value='-1'>
                        @endif
                        Descendent
                    </option>
                </select>
            </form>
        </div>
        @foreach ($rooms as $room)
        <div class="pageRoomsGrid__room">
            <div class="pageRoomsGrid__img">
                <img src="{{$room['photos'][0]}}" alt="" />
            </div>
            <div class="pageRoomsGrid__iconsBar">
                @foreach ($icons as $icon)
                <img src="public/images/{{$icon}}.svg" alt="" />
                @endforeach
            </div>
            <div class="pageRoomsGrid__legend">
                <h3 class="pageRoomsGrid__legend-title">{{$room['roomType']}}</h3>
                <p class="pageRoomsGrid__legend-text">
                    {{text_limit($room['description'],140,"...")}}
                </p>
                <p class="pageRoomsGrid__legend-price">
                    ${{$room['price']}}/Night &nbsp<a href="roomDetails.php?id={{$room['_id']}}">&nbsp Book Now</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pageRoomsGrid__paginateBar">
        <span class="control {{$currentPage==1 ? 'disabled' : ''}}"><a href="{{$baseUrl}}page={{$currentPage > 1 ? $currentPage-1 : $currentPage}}">{{'<'}}</a></span>
        @for ($i = 1; $i <= $pages; $i++) <span class={{$i===$currentPage ? 'active' : ''}}><a href="{{$baseUrl}}page={{$i}}">{{$i}}</a></span>
            @endfor
            <span class="control {{$currentPage==$pages ? 'disabled' : ''}}"><a href="{{$baseUrl}}page={{$currentPage < $pages ? $currentPage+1 : $currentPage}}">{{'>'}}</a></span>
    </div>
</section>
@endsection