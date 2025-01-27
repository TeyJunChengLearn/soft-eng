@extends('layouts.MedicalStaffTemplate')

@section('title',"Appointment (Cat List)")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Appointment (Cat List)
    </p>
</div>
<div class="user-main-content">
    <div class="user-main-content-searchbar-container-for-21rowtable">
        <form class="user-main-content-searchbar-form">
                <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
        </form>
    </div>
    <div class="user-main-content-21rowtable-container">
        @if ($cats->isEmpty())
        <p>There are no any cats in this Sanctuary</p>
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
        @foreach($cats as $key => $cat)
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
                    <a href="{{route('medicalStaff.appointment.add.index',['catID'=>$cat->id])}}">
                        Select
                    </a>
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
