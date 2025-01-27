@extends('layouts.MedicalStaffTemplate')

@section('title',"Treatment (SanctuaryList)")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Treatment (SanctuaryList)
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
        @if($verifiedManagers->isNotEmpty())
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
                @foreach($sanctuaries as $sanctuary)
                <tr class="user-main-content-21rowtable-tabledata"  >
                    <td>
                        {{$sanctuary->name}}
                    </td>
                    <td>
                        {{$sanctuary->address}}
                    </td>
                    <td>
                        <a href="{{route('medicalStaff.treatment.catList',['sanctuaryID'=>$sanctuary->id])}}">
                            Select
                        </a>
                    </td>
                </tr>
                @endforeach

            </table>
            @else
            <p>not verified by any manager</p>
        @endif
    </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
        <div class="d-flex justify-content-center">
            @if($verifiedManagers->isNotEmpty())
                {{$sanctuaries->withQueryString()->links('vendor.pagination.bootstrap-4')}}
            @endif
    </div>
</div>
@endsection
