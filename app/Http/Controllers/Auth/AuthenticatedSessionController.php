<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
{
    return view('auth.login');
}


    /**

 * Handle an incoming authentication request.
 */
public function store(LoginRequest $request): RedirectResponse
{
    // Attempt to authenticate the user
    $request->authenticate();

    // Regenerate the session after authentication
    $request->session()->regenerate();

    // Check if the authenticated user is a finance officer
    if (Auth::user()->hasRole('finance_officer')) {
        // Redirect finance officers to the finance dashboard
        return redirect()->route('finance.dashboard');
    }

    // Check if the authenticated user is an admin
    if (Auth::user()->hasRole('admin')) {
        // Redirect admins to the admin dashboard
        return redirect()->route('admin.dashboard');
    }

    // Default redirect if user doesn't have a specific role
    return redirect()->route('home');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
