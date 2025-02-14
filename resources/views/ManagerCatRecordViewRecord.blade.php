@extends('layouts.ManagerTemplate')

@section('title',"View Cat Record")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        View Cat Record
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-standardform-form">

        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Name</label>
                        <div type="text" class="user-main-content-standardform-form-input" readonly>{{$cat->name}}
                        </div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Birthdate</label>
                        <div type="text" class="user-main-content-standardform-form-input" readonly>{{$cat->birthdate}}
                        </div>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Breed</label>
                        <div type="text" class="user-main-content-standardform-form-input" >{{$cat->breed}}
                        </div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Gender</label>
                        <div type="text" class="user-main-content-standardform-form-input" readonly>@if($cat->gender==false)Female @else Male @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">General Story</label>
                <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);" readonly>{{$cat->general_story}}
                </textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.catRecord.List',['sanctuaryID'=>$sanctuaryID])}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.catRecord.edit.index',['sanctuaryID'=>$sanctuaryID,'catID'=>$catID])}}" class="user-main-content-standardform-button">
                Edit
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.catRecord.delete',['catID'=>$catID])}}" class="user-main-content-standardform-button">
                Delete
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
