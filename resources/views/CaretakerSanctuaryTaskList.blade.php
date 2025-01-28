@extends('layouts.CaretakerTemplate')

@section('title',"Sanctuary Task")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Sanctuary Task
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
                    <a href="{{route('caretaker.sanctuaryTask.add.index',['sanctuaryID'=>$sanctuaryID])}}" class="btn btn-dark">Create</a>
                </div>
                <div class="user-main-content-6rowtable-container">
                    @if($sanctuaryTasks->isEmpty())
                        <p>No task created</p>
                    @else
                    <table class="user-main-content-6rowtable sanctuary-task-table">
                        <tr class="user-main-content-6rowtable-tablehead">
                            <th>
                                Recorded Date
                            </th>
                            <th>
                                Summary
                            </th>
                            <th>
                                View
                            </th>
                        </tr>
                        @foreach ($sanctuaryTasks as $sanctuaryTask)
                            <tr class="user-main-content-6rowtable-tabledata"  >
                                <td>
                                    {{$sanctuaryTask->datetime}}
                                </td>
                                <td>
                                    {{$sanctuaryTask->summary}}
                                </td>
                                <td>
                                    <a href="{{route('caretaker.sanctuaryTask.view',['sanctuaryID'=>$sanctuaryID,'sanctuaryTaskID'=>$sanctuaryTask->id])}}">
                                        <i class="bi bi-eye fs-4"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    </table>
                    @endif
                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    @if (!$sanctuaryTasks->isEmpty())
                    {{$sanctuaryTasks->withQueryString()->links('vendor.pagination.bootstrap-4')}}
                    @endif
                </div>
            </div>
        @endsection
