<?php

namespace App\Http\Controllers;

use App\Services\AuthorApplicationService;
use App\Services\TokenService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminAuthorController extends Controller
{
    public function __construct(protected TokenService $tokenService, protected AuthorApplicationService $authorApplicationService)
    {
    }

    public function index(): Response
    {
        return response()->view('pages.admin.user-application', [
            'title' => 'Applications | Applications List',
            'applications' => $this->authorApplicationService->all()
        ]);
    }

    public function listTokens(): Response
    {
        return response()->view('pages.admin.user-application-token', [
            'title' => 'Applications | Token List',
            'tokens' => $this->tokenService->all()
        ]);
    }

    public function issueToken(): Response|RedirectResponse
    {
        $token = $this->tokenService->create();

        if (!$token)
            return redirect(route('admin.application.token'))
                ->withErrors(['error' => 'An error occurred when generating token.']);

        return response()->view('pages.admin.user-application-token-create', [
            'title' => 'Applications | Generate Token',
            'token' => $token
        ]);
    }

    public function show(string $id): Response
    {
        return response()->view('pages.admin.user-application-review', [
            'title' => 'Applications | Review',
            'application' => $this->authorApplicationService->getById($id)
        ]);

    }

    public function handleVerification(string $id): RedirectResponse
    {
        try {
            $application = $this->authorApplicationService->verify($id);

            if (!$application)
                return redirect(route('admin.application.review', ['id' => $id]))
                    ->withErrors(['error' => 'An error occurred when verifying application.']);
            return redirect(route('admin.application.review', ['id' => $id]))
                ->with('success', 'Application approved, user role changed to author successfully.');
        } catch (Exception $e) {
            return redirect(route('admin.application.review', ['id' => $id]))
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
