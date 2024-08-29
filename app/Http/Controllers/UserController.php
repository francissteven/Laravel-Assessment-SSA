<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create()
    {
        return view('dashboard.create');
    }

    public function view(User $user)
    {
        return view('dashboard.view', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.edit', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'prefixname' => ['nullable', 'string', 'max:255'],
                'firstname' => ['required', 'string', 'max:255'],
                'middlename' => ['nullable', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'suffixname' => ['nullable', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);

            $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

            User::create([
                'prefixname' => $request->input('prefixname'),
                'firstname' => $request->input('firstname'),
                'middlename' => $request->input('middlename'),
                'lastname' => $request->input('lastname'),
                'suffixname' => $request->input('suffixname'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'photo' => $photoPath,
            ]);

            return redirect()->route('dashboard')->with('success', 'User Added Successfully.');

        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to add user. Please try again.']);
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'prefixname' => ['nullable', 'string', 'max:255'],
                'firstname' => ['required', 'string', 'max:255'],
                'middlename' => ['nullable', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'suffixname' => ['nullable', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
                'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'password' => ['nullable', 'string', 'min:8'],
                'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);

            $photoPath = $user->photo;
            if ($request->hasFile('photo')) {
                if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                    Storage::disk('public')->delete($user->photo);
                }
                $photoPath = $request->file('photo')->store('photos', 'public');
            }

            $user->update([
                'prefixname' => $request->input('prefixname'),
                'firstname' => $request->input('firstname'),
                'middlename' => $request->input('middlename'),
                'lastname' => $request->input('lastname'),
                'suffixname' => $request->input('suffixname'),
                'username' => $request->input('username'),
                'email' => $request->input('email') ?: $user->email,
                'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
                'photo' => $photoPath,
            ]);

            return redirect()->route('dashboard')->with('success', 'User Updated Successfully.');

        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to update user. Please try again.']);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('dashboard')->with('success', 'User Soft Deleted Successfully.');
        } catch (\Exception $e) {
            Log::error('User soft delete failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to soft delete user. Please try again.']);
        }
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('dashboard.softdelete', compact('users'));
    }

    public function restore($id)
    {
        try {
            $user = User::withTrashed()->findOrFail($id);
            $user->restore();
            return redirect()->route('users.trashed')->with('success', 'User Restored Successfully.');
        } catch (\Exception $e) {
            Log::error('User restore failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to restore user. Please try again.']);
        }
    }

    public function delete($id)
    {
        try {
            $user = User::withTrashed()->findOrFail($id);
            $user->forceDelete();
            return redirect()->route('users.trashed')->with('success', 'User Permanently Deleted.');
        } catch (\Exception $e) {
            Log::error('User permanent delete failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to permanently delete user. Please try again.']);
        }
    }
}
