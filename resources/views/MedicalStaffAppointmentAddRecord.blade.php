@extends('layouts.MedicalStaffTemplate')

@section('title',"Appointment (Add)")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Appointment (Add)
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form" method="POST" action="">
        @csrf
        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Name</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="{{$cat->name}}">
                    </div>
                    <div class="user-main-content-standardformpluck('id');column">
                        <label class="user-main-content-standardform-form-label">Birthdate</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="{{$cat->birthdate}}">
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Breed</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="{{$cat->breed}}">
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Gender</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder=@if($cat->gender==false)
                        "Female"
                        @else
                        "Male"
                    @endif>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Datetime</label>
                        <input type="datetime-local" class="user-main-content-standardform-form-input" name="datetime">
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('medicalStaff.appointment.list')}}" class="user-main-content-standardform-button">
                Back
                </a>
            </div>
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
