@extends('layouts.ManagerTemplate')

@section('title',"View Caretaker Record")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        View Caretaker Record
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-standardform-form">
        <div class="usermain-content-standardform-form-input-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Username:</label>
                    <div type="text" class="user-main-content-standardform-form-input" >
                        {{$caretaker->user->username}}
                    </div>
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Created Date:</label>
                    <div type="text" class="user-main-content-standardform-form-input">
                        {{$caretaker->user->created_at}}
                    </div>
                </div>
            </div>

            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Email:</label>
                    <div type="text" class="user-main-content-standardform-form-input" >
                        {{$caretaker->user->email}}
                    </div>
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Last Updated:</label>
                    <div type="text" class="user-main-content-standardform-form-input" >
                        {{$caretaker->updated_at}}
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.caretaker.list')}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('manager.caretaker.remove',['caretakerID'=>$caretaker->id])}}" class="user-main-content-standardform-button">
                Delete
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
