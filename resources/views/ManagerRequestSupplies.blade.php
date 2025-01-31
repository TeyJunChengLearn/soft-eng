@extends('layouts.ManagerTemplate')

@section('title',"Request Supplies")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Request Supplies
                </p>
            </div>
            <div class="user-main-content">
                <div class="user-main-content-searchbar-container-for-21rowtable">
                    <form class="user-main-content-searchbar-form">
                            <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
                    </form>
                </div>
                <!-- with create searchbar container -->

                <div class="user-main-content-6rowtable-container">
                    @if ($supplyRequests->isEmpty())
                        <p>There are no any request</p>
                        @else
                        <table class="user-main-content-6rowtable ">
                        <tr class="user-main-content-6rowtable-tablehead">
                            <th>
                                Item Name
                            </th>
                            <th>
                                Sanctuary Name
                            </th>
                            <th>
                                Recorded Date
                            </th>
                            <th>
                                Qty
                            </th>
                        </tr>
                        @foreach($supplyRequests as $supplyRequest)
                            <tr class="user-main-content-6rowtable-tabledata"  >
                                <td>
                                    {{$supplyRequest->item_name}}
                                </td>
                                <td>
                                    {{$supplyRequest->sanctuary->name}}
                                </td>
                                <td>
                                    {{$supplyRequest->created_at}}
                                </td>
                                <td>
                                    {{$supplyRequest->quantity}}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    @endif
                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    @if (!$supplyRequests->isEmpty())
                    {{$supplyRequests->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                    @endif
                </div>
            </div>
        @endsection
