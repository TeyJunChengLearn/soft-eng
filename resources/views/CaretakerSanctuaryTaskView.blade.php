@extends('layouts.CaretakerTemplate')

@section('title',"Sanctuary Task (View)")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Sanctuary Task (View)
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-standardform-form">
        <div class="usermain-content-standardform-form-input-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <label class="user-main-content-standardform-form-label">Recorded Date</label>
                    <div type="text" class="user-main-content-standardform-form-input" >
                        asdasdasd
                    </div>
                </div>
            </div>
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <div class="user-main-content-Longform-form-textarea-container">
                        <label class="user-main-content-standardform-form-label">Summary</label>
                        <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">
                        </textarea>
                    </div>
                </div>
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
                Delete
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
