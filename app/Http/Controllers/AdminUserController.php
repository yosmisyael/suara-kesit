<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {

    }

    public function create(): Response
    {
        return response()->view('pages.admin.user-create', [
            'title' => 'User | Add',
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRegisterRequest $request): RedirectResponse
    {
        $userDTO = new UserDTO($request->validated());

        $result = $this->userService->create($userDTO);

        if (!$result) return redirect()->back()->withErrors(['error' => 'An error occurred when registering user.'])->withInput();

        return redirect(route('admin.user.create'))
            ->with('success', 'User successfully created.');
    }

    public function show(string $id): Response
    {
        $user = $this->userService->findById($id);

        return response()->view('pages.admin.user', [
            'title' => 'User | User Detail',
            'user' => $user,
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->userService->delete($id);

        return redirect()->back()
            ->with('success', 'User successfully deleted.');
    }
}
