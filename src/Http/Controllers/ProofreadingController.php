<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use YezzMedia\Content\Actions\StoreSubmissionAction;
use YezzMedia\Content\Models\FormDefinition;
use YezzMedia\Content\Pipelines\SpamProtectionPipeline;

class ProofreadingController
{
    public function show(): View
    {
        $project = view()->shared('project');

        $form = FormDefinition::query()
            ->where('project_id', $project->id)
            ->where('name', 'Proofreading Contact')
            ->first();

        return view('frontend-jbc::proofreading.show', [
            'contactForm' => $form,
            'hpField' => $form ? 'hp_'.md5((string) $form->id.'_'.$form->name) : null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $project = view()->shared('project');

        $form = FormDefinition::query()
            ->where('project_id', $project->id)
            ->where('name', 'Proofreading Contact')
            ->firstOrFail();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email:filter', 'max:200'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $spamResult = app(SpamProtectionPipeline::class)->check(
            $request->all(),
            $form,
            $request->ip() ?? '0.0.0.0',
        );

        app(StoreSubmissionAction::class)->execute(
            $form,
            $validated,
            $request->ip() ?? '0.0.0.0',
            $request->userAgent(),
            $spamResult->isSpam,
        );

        return redirect()->route('frontend.proofreading')->with('form_success', true);
    }
}
