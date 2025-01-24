@extends('layouts.AdminTemplate')

@section('title',"Admin's Activity History")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Admin's Activity History
                </p>
            </div>
            <div class="user-main-content">
                <div class="user-main-content-searchbar-container-for-21rowtable">
                    <form class="user-main-content-searchbar-form">
                            <input type="text" placeholder="Search" class="user-main-content-searchbar-input">
                    </form>
                </div>
                <div class="user-main-content-6rowtable-container">
                    <table class="user-main-content-6rowtable activity-history-table">
                        <tr class="user-main-content-6rowtable-tablehead">
                            <th>
                                Admin Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata"  >
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                <i class="bi bi-eye fs-4"></i>
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata"  >
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                <i class="bi bi-eye fs-4"></i>
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata"  >
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                <i class="bi bi-eye fs-4"></i>
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata"  >
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                <i class="bi bi-eye fs-4"></i>
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata"  >
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                <i class="bi bi-eye fs-4"></i>
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata"  >
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                            <td>
                                <i class="bi bi-eye fs-4"></i>
                            </td>
                        </tr>


                    </table>
                </div>
                <!-- Pagination from simple-bootstrap-5.blade -->
                 <div class="d-flex justify-content-center">
                    <nav role="navigation" aria-label="Pagination Navigation">
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
                        </ul>
                    </nav>
                </div>
            </div>
        @endsection
