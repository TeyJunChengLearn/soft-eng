@extends('layouts.ManagerTemplate')

@section('title',"Cats' Activity")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Cats' Activity
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-standardform-form" action="{{route('caretaker.catActivity.add.post',['catID'=>$catID])}}" method="POST">
        @csrf
        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Name</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="{{$catActivity->cat->name}}" readonly>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Birthdate</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="{{$catActivity->cat->birthdate}}" readonly>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Breed</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="{{$catActivity->cat->breed}}" readonly>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Gender</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder=@if($catActivity->cat->gender==false)
                        "Female"
                        @else
                        "Male"
                    @endif readonly>
                    </div>
                </div>
            </div>
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">Summary</label>
                <textarea id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);" name="summary" readonly required>{{$catActivity->summary}}</textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route("manager.catActivity.summaryList",['catID'=>$catActivity->cat->id])}}">
                    <button  class="user-main-content-standardform-button">
                    Back
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    const textarea = document.getElementById('autoResizeTextarea');

    textarea.addEventListener('input', () => {
        // Reset height to auto to recalculate new height
        textarea.style.height = 'auto';
        // Calculate the new height based on the scroll height
        textarea.style.height = textarea.scrollHeight + 'px';
    });
    </script>
@endsection
