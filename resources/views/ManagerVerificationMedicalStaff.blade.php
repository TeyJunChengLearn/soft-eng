@extends('layouts.ManagerTemplate')

@section('title',"Verification for Medical Staff")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Verification for Medical Staff
                </p>
            </div>
            <div class="user-main-content">
                <div class="user-main-content-searchbar-container-for-21rowtable">
                    <form class="user-main-content-searchbar-form">
                            <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
                    </form>
                    <div class="user-main-content-searchbar-form">
                        <div class="user-main-content-searchbar-input">Manager ID: {{$user->manager->id}}</div>
                    </div>
                </div>
                <!-- with create searchbar container -->

                <div class="user-main-content-6rowtable-container">
                    @if ($verifications->isEmpty())
                        <p>No verifications for now.</p>
                        @else
                        <table class="user-main-content-6rowtable verification-medical-staff">
                        <tr class="user-main-content-6rowtable-tablehead">
                            <th>
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Vet ID
                            </th>
                            <th>
                                Verification
                            </th>
                        </tr>
                        @foreach($verifications as $verification)
                            <tr class="user-main-content-6rowtable-tabledata"  >
                                <td>
                                    {{$verification->medicalStaff->user->username}}
                                </td>
                                <td>
                                    {{$verification->medicalStaff->user->email}}
                                </td>
                                <td>
                                    {{$verification->medicalStaff->vet_id}}
                                </td>
                                <td>
                                    <a href="{{route("manager.verification.approve",['verificationID'=>$verification->id])}}"><i class="bi bi-check-square fs-3"></i></a>
                                    <a href="{{route('manager.verification.decline',['verificationID'=>$verification->id])}}"><i class="bi bi-x-square fs-3"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    @endif

                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    @if(!$verifications->isEmpty())
                        {{$verifications->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                    @endif
                </div>
            </div>
        @endsection
