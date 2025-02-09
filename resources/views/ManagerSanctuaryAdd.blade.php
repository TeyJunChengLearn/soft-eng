@extends('layouts.ManagerTemplate')

@section('title',"Add Sanctuary")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Add Sanctuary
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form" method="POST" action="{{route('manager.manageSanctuary.add.post')}}">
        @csrf
        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Sanctuary Name</label>
                        <input type="text" class="user-main-content-standardform-form-input" required name="name">
                    </div>
                </div>
            </div>
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">Sanctuary Address</label>
                <textarea id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);" required name="address"></textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route("manager.manageSanctuary.list")}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <button type="submit" class="user-main-content-standardform-button">
                confirm
                </button>
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
