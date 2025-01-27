@extends('layouts.MedicalStaffTemplate')

@section('title',"Cat Health Records")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Cat Health Records
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
        @if ($verifiedManagers->isNotEmpty())
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
                    <a href="{{route('medicalStaff.healthRecord.catList',['sanctuaryID'=>$sanctuary->id])}}">
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
    {{-- <div class="user-main-content-21rowtable-container">
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
            <tr class="user-main-content-21rowtable-tabledata"  >
                <td>
                    Vasudevan Ramachandran Balasubramanian
                </td>
                <td>
                    Table Data
                </td>
                <td>
                    <a href="link1.html">
                        Select
                    </a>
                </td>
            </tr>
        </table>
</div> --}}
                <!-- Pagination from simple-bootstrap-5.blade -->
    <div class="d-flex justify-content-center">
        {{-- <nav role="navigation" aria-label="Pagination Navigation">
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
            </ul> --}}
            @if($verifiedManagers->isNotEmpty())
                {{$sanctuaries->withQueryString()->links('vendor.pagination.bootstrap-4')}}
            @endif
    </div>
</div>
@endsection
