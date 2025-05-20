<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\ActivityLog;

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
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
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

    public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // ✅ Simpan log aktiviti login
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Log Masuk',
                'ip_address' => $request->ip(),
            ]);

            return match (Auth::user()->type) {
                1 => redirect()->route('general.dashboard'),
                2 => redirect()->route('sekretariat.dashboard'),
                3 => redirect()->route('admin.dashboard'),
                4 => redirect()->route('super-admin.dashboard'),
                default => $this->logout($request)
            };
        }

        return back()
            ->withErrors(['email' => 'Butiran log masuk tidak sah.'])
            ->onlyInput('email');
    }

    protected function logout(Request $request)
    {
        // ✅ Simpan log aktiviti logout
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Log Keluar',
                'ip_address' => $request->ip(),
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
