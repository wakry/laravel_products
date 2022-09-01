<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="display-4">Welcome!!!</div> 
                <a class="btn btn-primary" href="#" role="button">Go Back To Home</a>
                <h1>to the Dashboard here you can view products, edit them and delete them.</h1>
                <h1> This page will be reachable by authenticated users (logged in)!<h1>
                <h1> If you signed in as a user, the Admin Dashboard is not allowed and you should get 403 FORBIDDEN<h1>
                <h1> I added this to demonstrate Auth<h1>
            </div>

        </div>
    </div>
</x-app-layout>
