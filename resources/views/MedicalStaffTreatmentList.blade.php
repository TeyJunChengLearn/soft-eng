@extends('layouts.MedicalStaffTemplate')

@section('title',"Treatment (Summary List)")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Treatment (Treatment List)
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
                    <a href="{{route('medicalStaff.treatment.add.index',['healthRecordID'=>$healthRecordID])}}" class="btn btn-dark">Create</a>
                </div>
                <div class="user-main-content-6rowtable-container">
                    @if($treatmentRecords->isEmpty())
                    <p> There are no any health record for this cat</P>
                    @else
                    <table class="user-main-content-6rowtable">
                    <tr class="user-main-content-6rowtable-tablehead">
                        <th>
                            Summary
                        </th>
                        <th>
                            Activity
                        </th>
                    </tr>
                    @foreach ($treatmentRecords as $treatmentRecord)
                        <tr class="user-main-content-6rowtable-tabledata"  >
                        <td>
                            {{$treatmentRecord->summary}}
                        </td>
                        <td>
                            <a href="link1.html">
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
                    @if(!$treatmentRecords->isEmpty())
                    {{$treatmentRecords->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                @endif
                </div>
            </div>
@endsection
