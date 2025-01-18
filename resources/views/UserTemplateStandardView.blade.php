@extends('layouts.UserTemplate')

@section('title',"Standard View")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Title
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-standardform-form">
        <div class="usermain-content-standardform-form-input-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 1:</label>
                    <div type="text" class="user-main-content-standardform-form-input" >
                        asdasdasd
                    </div>
                </div>
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 1:</label>
                    <div type="text" class="user-main-content-standardform-form-input">
                        asdasdasdas
                    </div>
                </div>
            </div>

            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Label 2:</label>
                    <div type="text" class="user-main-content-standardform-form-input" >
                        asdasdas
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
                back
                </a>
            </div>
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="#" class="user-main-content-standardform-button">
                edit
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

@endsection
