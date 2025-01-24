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
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
        </form>
    </div>
    <br>
    <form class="user-main-content-standardform-form">
        
        <div class="user-main-content-6rowtable-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <div class="user-main-content-Longform-form-textarea-container">
                        <label class="user-main-content-standardform-form-label">Username</label>
                        <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">blah blah blah
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-6rowtable-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <div class="user-main-content-Longform-form-textarea-container">
                        <label class="user-main-content-standardform-form-label">Username</label>
                        <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">blah blah blah
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-main-content-6rowtable-container">
            <div class="user-main-content-standardform-form-row">
                <div class="user-main-content-standardform-form-column">
                    <div class="user-main-content-Longform-form-textarea-container">
                        <label class="user-main-content-standardform-form-label">Username</label>
                        <textarea readonly id="autoResizeTextarea" rows="5" style="min-height: calc(1.5em * 5 + 8px);">blah blah blah
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    <div class="d-flex justify-content-center">
        <nav role="navigation" aria-label="Pagination Navigation">
            <ul class="pagination">
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" rel="next">Next</a>
                </li>
            </ul>
        </nav>
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
