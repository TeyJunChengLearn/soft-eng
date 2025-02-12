@extends('layouts.AdminTemplate')

@section('title',"Edit User")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Edit User
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form" method="POST" action="{{route("admin.manageUser.edit.post",['userID'=>$user->id])}}">
        @csrf
        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Username</label>
                        <input type="text" class="user-main-content-standardform-form-input" name="username" value="{{$user->username}}">
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Created Date</label>
                        <input type="text" class="user-main-content-standardform-form-input" value="{{$user->created_at}}" readonly>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Email</label>
                        <input type="email" class="user-main-content-standardform-form-input" name="email" value="{{$user->email}}">
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Last Updated</label>
                        <input type="text" class="user-main-content-standardform-form-input" value="{{$user->updated_at}}" readonly>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Role</label>
                        <select type="text" class="user-main-content-standardform-form-input" name="role">
                            <option value="admin" @if($user->admin->status==true) selected @endif>Admin</option>
                            <option value="manager" @if($user->manager->status==true) selected @endif>Manager</option>
                            <option value="medicalStaff" @if($user->medicalStaff->status==true) selected @endif>Medical Staff</option>
                            <option value="caretaker" @if($user->caretaker->status==true) selected @endif>Caretaker</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route("admin.manageUser.list")}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <button type="submit" class="user-main-content-standardform-button">
                Confirm
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('admin.manageUser.view',['userID'=>$user->id])}}" class="user-main-content-standardform-button">
                View
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
