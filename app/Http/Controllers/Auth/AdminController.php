<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $this->middleware('guest:admin');
        return Inertia::render('Admin/AdminLogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request): Application|RedirectResponse|Redirector
    {
        $this->middleware('guest:admin');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $Admin = Admin::where('email', $credentials['email'])->first();
        if (isset($Admin)
            && Hash::check(
                $credentials['password'],
                $Admin->password
            )
        ) {
            auth('admin')->login($Admin);
            $request->session()->regenerate();
            return redirect(route('dashboardAdmin'));
        }
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
