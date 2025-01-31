@extends('layouts.MedicalStaffTemplate')

@section('title',"Feedback")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Feedback
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form" method="POST" action="{{route("feedback.add")}}">
        @csrf
        <div class="user-main-content-Longform-form-input-container">
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">Feedback details:</label>
                <textarea id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);" name="details" required></textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <button type="submit" class="user-main-content-standardform-button">
                Confirm
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
