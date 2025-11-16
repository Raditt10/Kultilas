@extends('layouts.admin')

@section('title', 'Edit Profil - Admin Panel')
@section('page-title', 'Edit Profil')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-700 to-blue-900 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center">
            <div class="bg-white/20 p-3 rounded-lg mr-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">Profil Administrator</h2>
                <p class="text-blue-100 dark:text-gray-300 text-sm mt-1">Kelola informasi profil dan keamanan akun Anda</p>
            </div>
        </div>
    </div>

    <!-- Content Container -->
    <div class="space-y-6">
        <!-- Profile Information -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
            <div class="p-8 text-gray-900 dark:text-gray-100">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
            <div class="p-8 text-gray-900 dark:text-gray-100">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete Account -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
            <div class="p-8 text-gray-900 dark:text-gray-100">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
