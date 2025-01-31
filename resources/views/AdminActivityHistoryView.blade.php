@extends('layouts.AdminTemplate')

@section('title',"View User")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        View User
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form">

        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Username</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$adminActivityHistory->admin->user->username}}
                        </div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Created Date</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$adminActivityHistory->created_at}}
                        </div>
                    </div>
                </div>
                <div class="user-main-content-Longform-form-textarea-container">
                    <label class="user-main-content-standardform-form-label">Details</label>
                    <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);" readonly>{{$adminActivityHistory->details}}</textarea>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route("admin.activityHistory.list")}}" class="user-main-content-standardform-button">
                Back
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
