@extends('layouts.app')
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Report') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Report Content -->
                    <h3 class="text-lg font-semibold mb-4">Active Members</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Membership Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($activeMembers as $member)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $member->first_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $member->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $member->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $member->phone_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $member->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $member->membership_status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Report Content -->
                </div>
            </div>
        </div>
    </div>

 @endsection
