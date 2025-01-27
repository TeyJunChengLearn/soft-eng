@extends('layouts.MedicalStaffTemplate')

@section('title',"Appointments")

@section('content')
<div class="user-main-pagetitle-container">
    <p class="user-main-pagetitle-text">
        Appointments
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
        <a href="{{route('medicalStaff.appointment.add.sanctuaryList')}}" class="btn btn-dark">Create</a>
    </div>
    <div class="user-main-content-21rowtable-container">
        @if ($appointments->isEmpty())
            <p>No appointments found.</p>
            @else
            <table class="user-main-content-21rowtable appointment-table">
                <tr class="user-main-content-21rowtable-tablehead">
                    <th>
                        Sanctuary Name
                    </th>
                    <th>
                        Cat Name
                    </th>
                    <th>
                        Appointment Time
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($appointments as $appointment)
                    <tr class="user-main-content-21rowtable-tabledata"  >
                        <td>
                            {{$appointment->cat->sanctuary->name}}
                        </td>
                        <td>
                            {{$appointment->cat->name}}
                        </td>
                        <td>
                            {{$appointment->datetime}}
                        </td>
                        <td>
                            <a href="#">
                                <i class="bi bi-eye fs-5"></i>
                            </a>
                            <a href="{{route('medicalStaff.appointment.remove',['appointmentID'=>$appointment->id])}}">
                                <i class="bi bi-trash3 fs-5"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </table>
        @endif

</div>
                <!-- Pagination from simple-bootstrap-5.blade -->
        <div class="d-flex justify-content-center">
        {{$appointments->withQueryString()->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>

@endsection
