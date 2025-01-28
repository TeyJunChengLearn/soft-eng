@extends('layouts.ManagerTemplate')

@section('title',"Caretaker Records")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Caretaker Records
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-searchbar-container-for-21rowtable">
        <form class="user-main-content-searchbar-form">
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
        </form>
        <div class="user-main-content-searchbar-form">
            <div class="user-main-content-searchbar-input">Manager ID</div>
        </div>

    </div>
    <!-- with create searchbar container -->
    <div class="user-main-content-create-button-container mt-2"> <!-- Add margin for spacing -->
        <a href="#" class="btn btn-dark">Create</a>
    </div>
    <div class="user-main-content-21rowtable-container">
        @if ($caretakers->isEmpty())
            <p>There are no any caretaker work for you</P>
            @else
            <table class="user-main-content-21rowtable manager-cat-records">
            <tr class="user-main-content-21rowtable-tablehead">
                <th>
                    Email
                </th>
                <th>
                    Username
                </th>
                <th>
                    Last Updated By
                </th>
                <th>
                    Action
                </th>
            </tr>
            @foreach ($caretakers as $caretaker)
                <tr class="user-main-content-21rowtable-tabledata"  >
                <td>
                    {{$caretaker->user->email}}
                </td>
                <td>
                    {{$caretaker->user->username}}
                </td>
                <td>
                    {{$caretaker->user->updated_at}}
                </td>
                <td>
                    <a href="{{route('manager.caretaker.view',['caretakerID'=>$caretaker->id])}}"><i class="bi bi-eye fs-5"></i></a>
                </td>
            </tr>
            @endforeach

        </table>
        @endif

</div>
                <!-- Pagination from simple-bootstrap-5.blade -->
        <div class="d-flex justify-content-center">
        @if(!$caretakers->isEmpty())
            {{$caretakers->withQueryString()->links('vendor.pagination.bootstrap-4')}}
        @endif
    </div>
</div>

@endsection
