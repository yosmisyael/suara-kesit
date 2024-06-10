<?php

namespace App\Http\Controllers;

use App\Services\ApplicationService;
use App\Services\TokenService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminApplicationController extends Controller
{
    public function __construct(protected TokenService $tokenService, protected ApplicationService $authorApplicationService)
    {
    }

    public function index(): Response
    {
        return response()->view('pages.admin.applications', [
            'title' => 'Applications | Application List',
            'applications' => $this->authorApplicationService->all()
        ]);
    }

    public function edit(string $id): Response
    {
        return response()->view('pages.admin.application', [
            'title' => 'Applications | Application Review',
            'application' => $this->authorApplicationService->getById($id)
        ]);

    }

    public function verify(string $id): RedirectResponse
    {
        try {

            $application = $this->authorApplicationService->verify($id);

            if (!$application)
                return redirect(route('admin.application.edit', ['id' => $id]))
                    ->withErrors(['error' => 'An error occurred when verifying application.']);

            return redirect(route('admin.application.edit', ['id' => $id]))
                ->with('success', 'Application approved, user role changed to author successfully.');

        } catch (Exception $e) {

            return redirect(route('admin.application.edit', ['id' => $id]))
                ->withErrors(['error' => $e->getMessage()]);

        }
    }
}
