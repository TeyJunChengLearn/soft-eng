@extends('layouts.AdminTemplate')

@section('title',"System Settings")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        System Settings
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form">

        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column form-check form-switch">
                        <label class="user-main-content-standardform-form-label form-check-label for="customSwitch">Enable Settings</label>
                        <input class="form-check-input" type="checkbox" id="customSwitch">
                    </div>
                    <div class="user-main-content-standardform-form-column form-check form-switch">
                        <label class="user-main-content-standardform-form-label form-check-label for="customSwitch">Enable Settings</label>
                        <input class="form-check-input" type="checkbox" id="customSwitch">
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column form-check form-switch">
                        <label class="user-main-content-standardform-form-label form-check-label for="customSwitch">Enable Settings</label>
                        <input class="form-check-input" type="checkbox" id="customSwitch">
                    </div>
                    <div class="user-main-content-standardform-form-column form-check form-switch">
                        <label class="user-main-content-standardform-form-label form-check-label for="customSwitch">Enable Settings</label>
                        <input class="form-check-input" type="checkbox" id="customSwitch">
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column form-check form-switch">
                        <label class="user-main-content-standardform-form-label form-check-label for="customSwitch">Enable Settings</label>
                        <input class="form-check-input" type="checkbox" id="customSwitch">
                    </div>
                    <div class="user-main-content-standardform-form-column form-check form-switch">
                        <label class="user-main-content-standardform-form-label form-check-label for="customSwitch">Enable Settings</label>
                        <input class="form-check-input" type="checkbox" id="customSwitch">
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
                Confirm
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
