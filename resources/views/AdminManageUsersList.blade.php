@extends('layouts.AdminTemplate')

@section('title',"Manage Users")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Manage Users
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-searchbar-container-for-21rowtable">
        <form class="user-main-content-searchbar-form">
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input" name="search">
        </form>
    </div>
    <!-- with create searchbar container -->

    <div class="user-main-content-21rowtable-container">
        @if ($users->isEmpty())
        <p>There are no users in the system</p>
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
                    Role
                </th>
                <th>
                    Last Updated On
                </th>
                <th>
                    Action
                </th>
            </tr>
            @foreach ($users as $user)
            <tr class="user-main-content-21rowtable-tabledata"  >
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{$user->username}}
                </td>
                <td>
                    @if ($user->admin->status==true)
                     Admin
                    @endif
                    @if ($user->manager->status==true)
                     Manager
                    @endif
                    @if ($user->medicalStaff->status==true)
                     Medical Staff
                    @endif
                    @if ($user->caretaker->status==true)
                     Caretaker
                    @endif
                </td>
                <td>
                    {{$user->updated_at}}
                </td>
                <td>
                    <a href="{{route("admin.manageUser.view",['userID'=>$user->id])}}"><i class="bi bi-eye fs-5"></i></a>
                    <a href="{{route('admin.manageUser.edit.index',['userID'=>$user->id])}}"><i class="bi bi-pencil-square fs-5"></i></a>
                </td>
            </tr>

            @endforeach

        </table>
        @endif

</div>
                <!-- Pagination from simple-bootstrap-5.blade -->
        <div class="d-flex justify-content-center">
        @if (!$users->isEmpty())
          {{$users->withQueryString()->links('vendor.pagination.bootstrap-4')}}
        @endif
    </div>
</div>

@endsection
