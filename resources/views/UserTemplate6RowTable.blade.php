@extends('layouts.UserTemplate')

@section('title',"6 Row Table")

@section('content')
            <div class="user-main-pagetitle-container">
                <p class="user-main-pagetitle-text">
                    Title
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
                    <a href="#" class="btn btn-dark">Create</a>
                </div>
                <div class="user-main-content-6rowtable-container">
                    <table class="user-main-content-6rowtable">
                        <tr class="user-main-content-6rowtable-tablehead">
                            <th>
                                Table Head
                            </th>
                            <th>
                                Table Head
                            </th>
                            <th>
                                Table Head
                            </th>
                            <th>
                                Table Head
                            </th>
                            <th>
                                Table Head
                            </th>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata" data-href="link1.html">
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
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata" data-href="link1.html">
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
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata" data-href="link1.html">
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
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata" data-href="link1.html">
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
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata" data-href="link1.html">
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
                                Table Data
                            </td>
                            <td>
                                Table Data
                            </td>
                        </tr>
                        <tr class="user-main-content-6rowtable-tabledata" data-href="link1.html">
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
                                Table Data
                            </td>
                            <td>
                                Table Data
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
            <script>
                document.querySelectorAll('.user-main-content-6rowtable-tabledata').forEach(row => {
                    row.addEventListener('click', () => {
                        const url = row.getAttribute('data-href');
                        if (url) {
                            window.location.href = url;
                        }
                    });
                });
            </script>
        @endsection
