@extends('layouts.UserTemplate')

@section('title',"Long Form")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Title
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-standardform-form">

        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Label 1:</label>
                        <div type="text" class="user-main-content-standardform-form-input" >

                        </div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Label 2:</label>
                        <div type="text" class="user-main-content-standardform-form-input" >

                        </div>
                    </div>
                    </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Label 2:</label>
                        <div type="text" class="user-main-content-standardform-form-input" >

                        </div>
                    </div>
                </div>
            </div>
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">Label 1:</label>
                <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">

                </textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
                Edit
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
                View
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
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
