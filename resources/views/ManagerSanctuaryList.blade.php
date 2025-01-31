@extends('layouts.ManagerTemplate')

@section('title',"Sanctuary List")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Sanctuary List
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-searchbar-container-for-21rowtable">
        <form class="user-main-content-searchbar-form">
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input" name="search">
        </form>
    </div>
    <!-- with create searchbar container -->
    <div class="user-main-content-create-button-container mt-2"> <!-- Add margin for spacing -->
        <a href="{{route("manager.manageSanctuary.add.index")}}" class="btn btn-dark">Create</a>
    </div>
    <div class="user-main-content-21rowtable-container">
        @if ($sanctuaries->isEmpty())
        <p>No sanctuaries found.</p>
            @else
            <table class="user-main-content-21rowtable manager-sanctuary-list">
            <tr class="user-main-content-21rowtable-tablehead">
                <th>
                    Name
                </th>
                <th>
                    Address
                </th>
                <th>
                    Action
                </th>
            </tr>
            @foreach ($sanctuaries as $sanctuary)
            <tr class="user-main-content-21rowtable-tabledata"  >
                <td>
                    {{$sanctuary->name}}
                </td>
                <td>
                    {{$sanctuary->address}}
                </td>
                <td>
                    <a href="{{route('manager.manageSanctuary.edit.index',['sanctuaryID'=>$sanctuary->id])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path d="M2.25391 16.3296H9.01665L15.7794 16.3296" stroke="black" stroke-width="1.12712" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.18367 4.92993L11.309 2.8046L15.0283 6.52393L12.903 8.64925M9.18367 4.92993L4.97078 9.14282C4.82986 9.28374 4.75069 9.47487 4.75069 9.67416L4.7507 13.0822L8.15877 13.0822C8.35806 13.0822 8.54918 13.0031 8.6901 12.8621L12.903 8.64925M9.18367 4.92993L12.903 8.64925" stroke="black" stroke-width="1.12712" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        @endif

</div>
                <!-- Pagination from simple-bootstrap-5.blade -->
        <div class="d-flex justify-content-center">
            @if (!$sanctuaries->isEmpty())
            {{$sanctuaries->withQueryString()->links('vendor.pagination.bootstrap-4')}}
            @endif
    </div>
</div>
@endsection
