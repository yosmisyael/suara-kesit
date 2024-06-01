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

    public function index(): Response
    {
        $users = $this->userService->getByRole('member');
        return response()->view('pages.admin.user', [
            'title' => 'User | Overview',
            'users' => $users,
        ]);
    }

    public function showMember(): Response
    {
        $users = $this->userService->getByRole('member');
        return response()->view('pages.admin.user-member', [
            'title' => 'User | Member List',
            'users' => $users,
        ]);
    }

    public function showAuthor(): Response
    {
        $users = $this->userService->getByRole('author');
        return response()->view('pages.admin.user-author', [
            'title' => 'User | Author List',
            'users' => $users,
        ]);
    }

    public function create(): Response
    {
        return response()->view('pages.admin.user-create', [
            'title' => 'User | Add User',
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->userService->create($validated);

        if (!$result) return redirect()->back()->withErrors(['error' => 'An error occurred when registering user.'])->withInput();

        return redirect(route('admin.user.index'))
            ->with('success', 'User successfully created.');
    }

    public function edit(string $id): Response
    {
        $user = $this->userService->findById($id);

        return response()->view('pages.admin.user-edit', [
            'title' => 'User | Edit',
            'user' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->userService->update($id, $validated);

        if (!$result) return redirect()->back()
            ->withErrors(['error' => 'An error occurred when updating user.'])->withInput();

        return redirect()->back()
            ->with('success', 'User role successfully updated.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->userService->delete($id);

        return redirect()->back()
            ->with('success', 'User successfully deleted.');
    }
}
