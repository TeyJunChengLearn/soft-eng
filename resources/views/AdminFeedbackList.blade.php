@extends('layouts.AdminTemplate')

@section('title',"Feedbacks")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Feedbacks
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-searchbar-container-for-21rowtable">
        <form class="user-main-content-searchbar-form">
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input" name="search">
        </form>
    </div>
    <br>
    <form class="user-main-content-standardform-form">
        @if ($feedbacks->isEmpty())
            <p>no Feedback from the begin</p>
            @else
            @foreach ($feedbacks as $feedback)
                <div class="user-main-content-6rowtable-container">
                    <div class="user-main-content-standardform-form-row">
                        <div class="user-main-content-standardform-form-column">
                            <div class="user-main-content-Longform-form-textarea-container">
                                <label class="user-main-content-standardform-form-label">{{$feedback->user->username}}</label>
                                <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">{{$feedback->details}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="d-flex justify-content-center">
        @if (!$feedbacks->isEmpty())
            {{$feedbacks->withQueryString()->links('vendor.pagination.bootstrap-4')}}
        @endif
    </div>
    </form>
    <br>

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
