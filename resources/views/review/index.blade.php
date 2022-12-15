@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 500px; display: flex; justify-content: center; 
            align-items: center; background-image: url({{ url('assets/img/bg1.jpg') }}); background-size: cover; position: relative;">
    <nav id="menu" data-toggle="offcanvas" data-target=".navmenu" style="position: absolute; top: 50px">
        <span class="fa fa-bars"></span>
    </nav>
    <h1>{{ $type }}s reviews</h1>
</div>
<div style="width: 100%; height: auto; margin: 50px 0; display: flex; flex-wrap: wrap; justify-content: center;">
    @foreach($reviews as $review)
        <div style="width: 300px; height: auto; border: 1px solid black; margin: 20px;">
            <div style="width: 100%; height: 280px; background-image: url('data:image/jpeg;base64,{{ $review->thumbnail }}'); 
                        background-size: cover; background-position: center center;"></div>
            <div style="width: 100%; height: auto;">
                <h3 style="text-align: center; font-weight: bold; font-style: normal;">{{ $review->title }}</h3>
                <div style="display: flex; justify-content: space-between; padding: 10px;">
                    <div>{{ $review->updated_at }}</div>
                    <div>By {{ $review->user->name }}</div>
                </div>
            </div>
            <div class="text-right" style="margin: 15px 10px;">
                <a href="{{ url('review/' . $review->id) }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">View</a>
            </div>
        </div>
    @endforeach
</div>
<div class="text-center" style="margin: 30px 0;">
    <a href="{{ url('review/create') }}" class="btn" style="background: #c59a6d; color: white; border-radius: 0; padding: 10px 30px;">Add review</a>
</div>
@endsection