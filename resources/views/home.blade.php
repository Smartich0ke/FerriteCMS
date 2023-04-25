@extends('layouts.admin')
@section('content')

    <div class="d-flex flex-row justify-content-between w-100">

        <div class="vh-100 p-5 dashboardContentBetweenSideBars">
            <div class="d-flex flex-row quickMetricContainer w-100 mb-5 flex-wrap">
                <div class="quickMetric d-flex flex-row gap-3 align-items-center bg-paleblue">
                    <iconify-icon icon="mdi:graph-box" class="p-0" width="64" height="64"></iconify-icon>
                    <div class="">
                        <h3 class="mb-0 text-center"><strong>500k</strong></h3>
                        <div class="my-0 text-center">users</div>
                    </div>
                </div>
                <div class="quickMetric d-flex flex-row gap-3 align-items-center bg-palered">
                    <iconify-icon icon="mdi:heart" class="p-0" width="64" height="64"></iconify-icon>
                    <div class="">
                        <h3 class="mb-0 text-center"><strong>620</strong></h3>
                        <div class="my-0 text-center">Likes</div>
                    </div>
                </div>
                <div class="quickMetric d-flex flex-row gap-3 align-items-center bg-palegreen">
                    <iconify-icon icon="mdi:users-group" class="p-0" width="64" height="64"></iconify-icon>
                    <div class="">
                        <h3 class="mb-0 text-center"><strong>318</strong></h3>
                        <div class="my-0 text-center">Following</div>
                    </div>
                </div>
                <div class="quickMetric d-flex flex-row gap-3 align-items-center bg-paleyellow">
                    <iconify-icon icon="mdi:note-multiple" class="p-0" width="64" height="64"></iconify-icon>
                    <div class="">
                        <h3 class="mb-0 text-center"><strong>103</strong></h3>
                        <div class="my-0 text-center">Posts</div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="d-flex flex-row justify-content-between w-100">

                <!-- Visitor metrics -->
                <div style="" class="me-4 visitorMetrics pb-5">
                    <h2>Site Visitors (Last 7 Days)</h2>
                    <active-users-chart></active-users-chart>
                </div>

                <!-- Browser metrics -->
                <div class="browserMetrics">
                    <h2>Browsers</h2>
                    <browsers-chart></browsers-chart>
                </div>
            </div>

            <!-- Posts -->
            <div class="mt-5">
                <h2>Recent Posts</h2>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th scope="col" >Post</th>
                        <th scope="col" >Author</th>
                        <th scope="col" >Views</th>
                        <th scope="col" >Comments</th>
                        <th scope="col" >Created</th>
                        <th scope="col" >Updated</th>
                        <th scope="col" >Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="my-5">
                        <th scope="row">Post Title</th>
                        <td>Author Name</td>
                        <td>100</td>
                        <td>50</td>
                        <td>2021-01-01</td>
                        <td>2021-01-01</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    <tr class="my-5">
                        <th scope="row">Post Title</th>
                        <td>Author Name</td>
                        <td>100</td>
                        <td>50</td>
                        <td>2021-01-01</td>
                        <td>2021-01-01</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    <tr class="my-5">
                        <th scope="row">Post Title</th>
                        <td>Author Name</td>
                        <td>100</td>
                        <td>50</td>
                        <td>2021-01-01</td>
                        <td>2021-01-01</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    <tr class="my-5">
                        <th scope="row">Post Title</th>
                        <td>Author Name</td>
                        <td>100</td>
                        <td>50</td>
                        <td>2021-01-01</td>
                        <td>2021-01-01</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    <tr class="my-5">
                        <th scope="row">Post Title</th>
                        <td>Author Name</td>
                        <td>100</td>
                        <td>50</td>
                        <td>2021-01-01</td>
                        <td>2021-01-01</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Sidebar content -->
        <aside class="vh-100 p-5 dashboardAside">

            <!-- Recent comments -->
            <div>
                <div class="d-flex flex-row justify-content-between align-items-start"><h5 class="fw-bold">Recent
                        Comments</h5>
                    <iconify-icon icon="mdi:dots-horizontal" width="20" height="20"></iconify-icon>
                </div>
                <ul class="list-unstyled">
                    <li class="d-flex flex-row justify-content-start align-items-start gap-1 my-4 recentComment">
                        <image src="https://picsum.photos/64" width="64" height="64" alt="avatar" class="rounded-2"></image>
                        <div>
                            <div><strong>Some-User</strong> <span class="text-muted">has commented</span></div>
                            <div>wow such comment i really like the way this comment is formatted</div>
                        </div>
                    </li>
                    <li class="d-flex flex-row justify-content-start align-items-start gap-1 my-4 recentComment">
                        <image src="https://picsum.photos/64" width="64" height="64" alt="avatar" class="rounded-2"></image>
                        <div>
                            <div><strong>Another-User</strong> <span class="text-muted">has commented</span></div>
                            <div>wow such comment i really like the way this comment is formatted</div>
                        </div>
                    </li>
                    <li class="d-flex flex-row justify-content-start align-items-start gap-1 my-4 recentComment">
                        <image src="https://picsum.photos/64" width="64" height="64" alt="avatar" class="rounded-2"></image>
                        <div>
                            <div><strong>One-More-User</strong> <span class="text-muted">has commented</span></div>
                            <div>wow such comment i really like the way this comment is formatted</div>
                        </div>
                    </li>
                    <li class="d-flex flex-row justify-content-start align-items-start gap-1 my-4 recentComment">
                        <image src="https://picsum.photos/64" width="64" height="64" alt="avatar" class="rounded-2"></image>
                        <div>
                            <div><strong>One-More-User</strong> <span class="text-muted">has commented</span></div>
                            <div>wow such comment i really like the way this comment is formatted</div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- User platform metrics -->
            <div class="mt-5">
                <h5 class="fw-bold">Users By Platform</h5>
                <div>
                    <platform-chart></platform-chart>
                </div>
            </div>


        </aside>
    </div>
@endsection
