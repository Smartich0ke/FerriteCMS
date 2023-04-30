@extends('layouts.admin')
@section('content')
    <div class="m-5">
        <h1>All Images</h1>

        <div class="">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Alt Text</th>
                    <th scope="col" >Likes</th>
                    <th scope="col" >Created</th>

                    <th scope="col" >Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some alt text</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">View</button>
                        <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Move To Rubbish Bin</button>
                    </td>
                </tr>
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some alt text</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">View</button>
                        <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Move To Rubbish Bin</button>
                    </td>
                </tr>
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some alt text</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">View</button>
                        <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Move To Rubbish Bin</button>
                    </td>
                </tr>
                <tr class="my-5">
                    <th scope="row">1234</th>
                    <td>Some alt text</td>
                    <td>50</td>
                    <td>2021-01-01</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">View</button>
                        <button class="btn btn-sm btn-outline-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Move To Rubbish Bin</button>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
