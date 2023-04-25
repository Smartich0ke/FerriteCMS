@extends('layouts.app')
@section('content')

    <div class="contentContainer">
        <header class="d-flex flex-row justify-content-center">
            <h1 class="text-center">All Articles</h1>
        </header>
        <div class="responsiveGrid d-inline">
            <div class="gridItem-noImage" onclick="window.location='{{-- Link to post --}}';">
                <div class="d-flex flex-row justify-content-left">
                    <h2 class="">Category</h2>
                </div>
                <hr class="mt-1 mb-3">
                <p class="d-inline-block">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultricies
                    ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl eget
                </p>
            </div>
        </div>
        <div class="responsiveGrid d-inline">
            <div class="gridItem-noImage" onclick="window.location='{{-- Link to post --}}';">
                <div class="d-flex flex-row justify-content-left">
                    <h2 class="">Category</h2>
                </div>
                <hr class="mt-1 mb-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultricies
                    ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl eget
                </p>
            </div>
        </div>
        <div class="responsiveGrid">
            <div class="gridItem-noImage" onclick="window.location='{{-- Link to post --}}';">
                <div class="d-flex flex-row justify-content-left">
                    <h2 class="">Category</h2>
                </div>
                <hr class="mt-1 mb-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultricies
                    ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl eget
                </p>
            </div>
        </div>
        <div class="responsiveGrid">
            <div class="gridItem-noImage" onclick="window.location='{{-- Link to post --}}';">
                <div class="d-flex flex-row justify-content-left">
                    <h2 class="">Category</h2>
                </div>
                <hr class="mt-1 mb-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultricies
                    ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl eget
                </p>
            </div>
        </div>
    </div>
@endsection
