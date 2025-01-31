@extends('layouts.AdminTemplate')

@section('title',"Dashboard")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Dashboard
    </p>
</div>
<div class="user-main-content">
    <form class="user-main-content-standardform-form">
        <div class="user-main-content-6rowtable-container">
            <h4 style="color: white;">Latest Admin's Activity:</h4>
            @if ($adminActivityHistory==null)
                <p>There are no any action from admin</p>
                @else
                <table class="user-main-content-6rowtable activity-history-table">
                <tr class="user-main-content-6rowtable-tablehead">
                    <th>
                        Admin Name
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                <tr class="user-main-content-6rowtable-tabledata"  >
                    <td>
                        {{$adminActivityHistory->admin->user->username}}
                    </td>
                    <td>
                        {{ $adminActivityHistory->details}}
                    </td>
                    <td>
                        {{$adminActivityHistory->datetime}}
                    </td>
                    <td>
                        <i class="bi bi-eye fs-4"></i>
                    </td>
                </tr>
            </table>
            @endif

        </div>
        <div class="user-main-content-6rowtable-container">
            <h4 style="color: white;">Latest Feedback:</h4>
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <div class="user-main-content-Longform-form-textarea-container">
                        <label class="user-main-content-standardform-form-label">{{$feedback->user->username}}</label>
                        <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">{{$feedback->details}}</textarea>
                    </div>
                </div>
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
