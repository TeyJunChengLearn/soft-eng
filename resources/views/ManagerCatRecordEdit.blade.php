@extends('layouts.ManagerTemplate')

@section('title',"Edit Cat Record")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Edit Cat Record
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form" method="POST" action="{{route('manager.catRecord.edit.post',['sanctuaryID'=>$sanctuaryID,'catID'=>$catID])}}">
        @csrf
        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Name</label>
                        <input type="text" class="user-main-content-standardform-form-input" name="name" value="{{$cat->name}}" required>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Birthdate</label>
                        <input type="date" class="user-main-content-standardform-form-input" name="birthdate" value="{{$cat->birthdate}}" required>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Breed</label>
                        <input type="text" class="user-main-content-standardform-form-input" name="breed" value="{{$cat->breed}}" required >
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Gender</label>
                        <select type="text" class="user-main-content-standardform-form-input" name="gender" required>
                            <option value="true" @if($cat->gender == true) selected @endif>Male</option>
                            <option value="false" @if($cat->gender == false) selected @endif>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">General Story</label>
                <textarea id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);" name="general_story" required>{{$cat->general_story}}</textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.catRecord.List',['sanctuaryID'=>$sanctuaryID])}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <button type="submit" class="user-main-content-standardform-button">
                Confirm
                </button>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.catRecord.view',['sanctuaryID'=>$sanctuaryID,'catID'=>$catID])}}" class="user-main-content-standardform-button">
                View
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.catRecord.delete',['catID'=>$catID])}}" class="user-main-content-standardform-button">
                Delete
                </a>
            </div>
        </div>
    </form>
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
