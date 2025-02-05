@extends('layouts.AdminTemplate')

@section('title',"Admin's Activity History")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Admin's Activity History
                </p>
            </div>
            <div class="user-main-content">
                <div class="user-main-content-6rowtable-container">
                    @if ($adminActivityHistories->isEmpty())
                        <p>no any activity has performed</p>
                        @else
                        <table class="user-main-content-6rowtable activity-history-table">
                        <tr class="user-main-content-6rowtable-tablehead">
                            <th>
                                Admin Name
                            </th>
                            <th>
                                Details
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        @foreach($adminActivityHistories as $adminActivityHistory)
                            <tr class="user-main-content-6rowtable-tabledata"  >
                                <td>
                                    {{$adminActivityHistory->admin->user->username}}
                                </td>
                                <td>
                                    {{$adminActivityHistory->details}}
                                </td>
                                <td>
                                    {{$adminActivityHistory->datetime}}
                                </td>
                                <td>
                                    <a href="{{route("admin.activityHistory.view",["adminActivityHistoryID"=>$adminActivityHistory->id])}}"><i class="bi bi-eye fs-4"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    @endif

                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    @if(!$adminActivityHistories->isEmpty())
                        {{$adminActivityHistories->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                    @endif
                </div>
            </div>
        @endsection
