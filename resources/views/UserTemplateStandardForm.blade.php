@extends('layouts.UserTemplate')

@section('title',"Standard Form")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Title
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form">
        <div class="usermain-content-standardform-form-input-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 1:</label>
                    <input type="text" class="user-main-content-standardform-form-input" placeholder="Input 1">
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 2:</label>
                    <input type="text" class="user-main-content-standardform-form-input" placeholder="Input 2">
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 3:</label>
                    <input type="text" class="user-main-content-standardform-form-input" placeholder="Input 3">
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 4:</label>
                    <input type="text" class="user-main-content-standardform-form-input" placeholder="Input 4">
                </div>
            </div>
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 3:</label>
                    <input type="text" class="user-main-content-standardform-form-input" placeholder="Input 3">
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 4:</label>
                    <input type="text" class="user-main-content-standardform-form-input" placeholder="Input 4">
                </div>
            </div>
        </div>

        <!-- Button Container Moved Inside the Form -->
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">Back</a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">Edit</a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">View</a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">Delete</a>
            </div>
        </div>
    </form>
</div>
@endsection
