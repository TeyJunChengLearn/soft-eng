@extends('layouts.MedicalStaffTemplate')

@section('title',"Medical Care (Summary List)")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Medical Care (Summary List)
                </p>
            </div>
            <div class="user-main-content">
                <div class="user-main-content-searchbar-container-for-21rowtable">
                    <form class="user-main-content-searchbar-form">
                            <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
                    </form>
                </div>
                <div class="user-main-content-6rowtable-container">
                    @if($catHealthRecords->isEmpty())
                    <p> There are no any health record for this cat</P>
                    @else
                    <table class="user-main-content-6rowtable">
                    <tr class="user-main-content-6rowtable-tablehead">
                        <th>
                            Recorded Date
                        </th>
                        <th>
                            Summary
                        </th>
                        <th>
                            Activity
                        </th>
                    </tr>
                    @foreach ($catHealthRecords as $catHealthRecord)
                        <tr class="user-main-content-6rowtable-tabledata"  >
                        <td>
                            {{$catHealthRecord->datetime}}
                        </td>
                        <td>
                            {{$catHealthRecord->summary}}
                        </td>
                        <td>
                            <a href="{{route('medicalStaff.medicalCare.List',['healthRecordID'=>$catHealthRecord->id])}}">
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
                    @if(!$catHealthRecords->isEmpty())
                    {{$catHealthRecords->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                @endif
                </div>
            </div>
        @endsection
