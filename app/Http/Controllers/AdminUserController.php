<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminUserController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $users = $this->userService->all();
        return response()->view('pages.admin.user', [
            'title' => 'User Management',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('pages.admin.user-create', [
            'title' => 'User Management | Create User',
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->userService->create($validated);

        if (!$result) return redirect()->back()->withErrors(['error' => 'An error occurred when creating user.'])->withInput();

        return redirect(route('admin.user.index'))
            ->with('success', 'User successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $user = $this->userService->findById($id);

        return response()->view('pages.admin.user-edit', [
            'title' => 'User Management | Edit User',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->userService->update($id, $validated);

        if (!$result) return redirect()->back()
            ->withErrors(['error' => 'An error occurred when updating user.'])->withInput();

        return redirect(route('admin.user.index'))
            ->with('success', 'User role successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->userService->delete($id);

        return redirect(route('admin.user.index'))
            ->with('success', 'User successfully deleted.');
    }
}
