@extends('layouts.CaretakerTemplate')

@section('title',"Cats' Activity")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Cats' Activity
                </p>
            </div>
            <div class="user-main-content">
                <div class="user-main-content-searchbar-container-for-21rowtable">
                    <form class="user-main-content-searchbar-form">
                            <input type="text" placeholder="Search" class="user-main-content-searchbar-input" name='search'>
                    </form>
                </div>
                <!-- with create searchbar container -->
                <div class="user-main-content-create-button-container mt-2"> <!-- Add margin for spacing -->
                    <a href="{{route('caretaker.catActivity.add.index',["catID"=>$catID])}}" class="btn btn-dark">Create</a>
                </div>
                <div class="user-main-content-6rowtable-container">
                    @if($catActivities->isEmpty())
                        <p>No activities found.</p>
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
                            @foreach ($catActivities as $catActivity)
                                <tr class="user-main-content-6rowtable-tabledata"  >
                                    <td>
                                        {{$catActivity->datetime}}
                                    </td>
                                    <td>
                                        {{$catActivity->summary}}
                                    </td>
                                    <td>
                                        <a href="{{route('caretaker.catActivity.view',["catID"=>$catID,"catActivityID"=>$catActivity])}}">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    @endif
                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    @if(!$catActivities->isEmpty())
                        {{$catActivities->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                    @endif
                </div>
            </div>
        @endsection
