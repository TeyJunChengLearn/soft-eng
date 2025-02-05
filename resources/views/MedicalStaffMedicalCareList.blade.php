@extends('layouts.MedicalStaffTemplate')

@section('title',"Medical Care")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Medical Care
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
                    <a href="{{route('medicalStaff.medicalCare.add.index',['healthRecordID'=>$healthRecordID])}}" class="btn btn-dark">Create</a>
                </div>
                <div class="user-main-content-6rowtable-container">
                    @if($medicalCareRecords->isEmpty())
                        <p> There are no any medical care record on this health record.</p>
                        @else
                        <table class="user-main-content-6rowtable medical-care-table">
                            <tr class="user-main-content-6rowtable-tablehead">
                                <th>
                                    Medicine
                                </th>
                                <th>
                                    Arrangement
                                </th>
                                <th>
                                    Activity
                                </th>
                            </tr>
                            @foreach ($medicalCareRecords as $medicalCareRecord)
                                <tr class="user-main-content-6rowtable-tabledata"  >
                                <td>
                                    {{$medicalCareRecord->medicine_name}}
                                </td>
                                <td>
                                    {{$medicalCareRecord->arrangement}}
                                </td>
                                <td>
                                    <a href="{{route("medicalStaff.medicalCare.view",['healthRecordID'=>$healthRecordID,'medicalCareID'=>$medicalCareRecord->id])}}">
                                        view
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                    @endif

                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    @if(!$medicalCareRecords->isEmpty())
                {{$medicalCareRecords->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                @endif
                </div>
            </div>
        @endsection
