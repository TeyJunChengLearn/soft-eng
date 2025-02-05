@extends('layouts.MedicalStaffTemplate')

@section('title',"Cat Health Record")

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
                        <label class="user-main-content-standardform-form-label">Name</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$catMedicalCareRecord->catHealthRecord->cat->name}}</div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Birthdate</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$catMedicalCareRecord->catHealthRecord->cat->birthdate}}
                        </div>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Breed</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$catMedicalCareRecord->catHealthRecord->cat->breed}}
                        </div>
                    </div>
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Gender</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder=@if($catMedicalCareRecord->catHealthRecord->cat->gender==false)
                            "Female"
                            @else
                            "Male"
                        @endif readonly>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Breed</label>
                        <div type="text" class="user-main-content-standardform-form-input">{{$catMedicalCareRecord->medicine_name}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-main-content-Longform-form-textarea-container">
                <label class="user-main-content-standardform-form-label">Arrangement:</label>
                <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">{{$catMedicalCareRecord->arrangement}}</textarea>
            </div>
        </div>
        <div class="user-main-content-standardform-form-button-container-row">
            <div class="user-main-content-standardform-form-button-container-column">
                <a href="{{route('medicalStaff.medicalCare.List',['healthRecordID'=>$healthRecordID])}}" class="user-main-content-standardform-button">
                Back
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
