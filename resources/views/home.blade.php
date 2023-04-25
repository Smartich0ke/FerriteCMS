@extends('layouts.admin')
@section('content')


    <div class="d-flex flex-row justify-content-between w-100">

        <div class="vh-100 p-5" style="width: 70%;">

            <div class="d-flex flex-row justify-content-between w-100 mb-5">
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
            <div class="d-flex flex-row justify-content-between w-100">
                <div style="width: 60%; height: 20rem;" class="">
                    Site Visitors (Last 7 Days)
                    <active-users-chart></active-users-chart>
                </div>
                <div style="width: 40%" class=""></div>
            </div>
        </div>

        <!-- Sidebar content -->
        <aside class="vh-100 p-5" style="width: 30%">
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
        </aside>
    </div>
@endsection
