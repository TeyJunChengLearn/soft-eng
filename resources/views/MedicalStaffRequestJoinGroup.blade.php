@extends('layouts.MedicalStaffTemplate')

@section('title',"Appointment (Add)")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Appointment (Add)
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form">

        <div class="user-main-content-Longform-form-input-container">
            <div class="usermain-content-standardform-form-input-container">
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <h2 style="color: white;">How do I join?</h2>
                        <br>
                        <h3 style="color: white;">Once you meet the manager, they will provide you with an ID. Simply copy and paste the ID to send a request. Your request will be accepted once the manager approves it.

                        </h3>
                    </div>
                </div>
                <div class="user-main-content-standardform-form-row">
                    <div class="user-main-content-standardform-form-column">
                        <label class="user-main-content-standardform-form-label">Enter ID Here:</label>
                        <input type="text" class="user-main-content-standardform-form-input" placeholder="Required">
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
