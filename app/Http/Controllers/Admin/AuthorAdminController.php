<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthorAdminController extends Controller
{
    /**
     * Display a listing of authors.
     */
    public function index()
    {
        $authors = User::where('role', 'admin')
            ->orWhere('role', 'author')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created author in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,author',
            'bio' => 'nullable|string|max:1000',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'bio' => $request->bio,
        ]);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified author.
     */
    public function show(User $author)
    {
        // Get the author's posts
        $posts = $author->posts()->with('category')->latest()->paginate(10);

        return view('admin.authors.show', compact('author', 'posts'));
    }

    /**
     * Show the form for editing the specified author.
     */
    public function edit(User $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified author in storage.
     */
    public function update(Request $request, User $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($author->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,author',
            'bio' => 'nullable|string|max:1000',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'bio' => $request->bio,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $author->update($updateData);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified author from storage.
     */
    public function destroy(User $author)
    {
        // Check if author has posts
        if ($author->posts()->count() > 0) {
            return redirect()->route('admin.authors.index')
                ->with('error', 'Cannot delete author with existing posts. Please reassign or delete posts first.');
        }

        $author->delete();

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}
