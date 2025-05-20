<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\ActivityLog;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->user()->toArray()); // <--- Add it here temporarily

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // ✅ Simpan log perubahan profil
        ActivityLog::create([
            'id_pekerja' => $request->user()->id_pekerja,
            'activity' => 'Kemaskini Profil',
            'ip_address' => $request->ip(),
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated')
            ->with('success', 'Maklumat anda telah berjaya dikemaskini');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // ✅ Simpan log padam akaun
        ActivityLog::create([
            'id_pekerja' => $user->id_pekerja,
            'activity' => 'Padam Akaun',
            'ip_address' => $request->ip(),
        ]);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
