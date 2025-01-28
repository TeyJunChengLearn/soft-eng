@extends('layouts.ManagerTemplate')

@section('title',"Cat Records")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Cat Records
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-searchbar-container-for-21rowtable">
        <form class="user-main-content-searchbar-form">
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
        </form>
    </div>
    <!-- with create searchbar container -->
    <div class="user-main-content-create-button-container mt-2"> <!-- Add margin for spacing -->
        <a href="{{route('manager.catRecord.sanctuaryList.add')}}" class="btn btn-dark">Create</a>
    </div>
    <div class="user-main-content-21rowtable-container">
        @if ($cats->isEmpty())
            <p>No Cat Records Found.</p>
            @else
            <table class="user-main-content-21rowtable manager-cat-records">
                <tr class="user-main-content-21rowtable-tablehead">
                    <th>
                        Name
                    </th>
                    <th>
                        Breed
                    </th>
                    <th>
                        Gender
                    </th>
                    <th>
                        Birthdate
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach($cats as $cat)
                <tr class="user-main-content-21rowtable-tabledata"  >
                    <td>
                        {{$cat->name}}
                    </td>
                    <td>
                        {{$cat->breed}}
                    </td>
                    <td>
                        @if ($cat->gender==false)
                        Female
                        @else
                        Male
                        @endif
                    </td>
                    <td>
                        {{$cat->birthdate}}
                    </td>
                    <td>
                        <a href="{{route('manager.catRecord.view',['sanctuaryID'=>$sanctuaryID,'catID'=>$cat->id])}}"><i class="bi bi-eye fs-5"></i></a>
                        <a href="{{route('manager.catRecord.edit.index',['sanctuaryID'=>$sanctuaryID,'catID'=>$cat->id])}}"><i class="bi bi-pencil-square fs-5"></i></a>
                        <a href="{{route('manager.catRecord.delete',['catID'=>$cat->id])}}"><i class="bi bi-trash3 fs-5"></i></a>
                    </td>
                </tr>
                @endforeach

            </table>
        @endif

</div>
                <!-- Pagination from simple-bootstrap-5.blade -->
        <div class="d-flex justify-content-center">
            @if(!$cats->isEmpty())
            {{$cats->withQueryString()->links('vendor.pagination.bootstrap-4')}}
        @endif
    </div>
</div>

@endsection
