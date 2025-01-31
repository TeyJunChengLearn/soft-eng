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
                        <div type="text" class="user-main-content-standardform-form-input">{{$user->username}}</div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Created Date</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$user->created_at}}
                        </div>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Email</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$user->email}}
                        </div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Last Updated</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$user->updated_at}}
                        </div>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Role</label>
                        <div type="text" class="user-main-content-standardform-form-input">
                            @if ($user->admin->status==true)
                            Admin
                           @endif
                           @if ($user->manager->status==true)
                            Manager
                           @endif
                           @if ($user->medicalStaff->status==true)
                            Medical Staff
                           @endif
                           @if ($user->caretaker->status==true)
                            Caretaker
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('admin.manageUser.list')}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('admin.manageUser.edit.index',['userID'=>$user->id])}}" class="user-main-content-standardform-button">
                Edit
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
