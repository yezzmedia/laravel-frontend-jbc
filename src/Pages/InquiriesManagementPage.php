<?php

declare(strict_types=1);

namespace YezzMedia\FrontendJbc\Pages;

use Livewire\Attributes\Url;
use YezzMedia\Content\Models\FormDefinition;
use YezzMedia\Content\Models\FormSubmission;
use YezzMedia\Dashboard\Pages\DashboardPage;

class InquiriesManagementPage extends DashboardPage
{
    protected string $view = 'frontend-jbc::inquiries.list';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $slug = 'frontend-jbc/inquiries';

    #[Url(as: 'project')]
    public ?int $projectId = null;

    public bool $showSpam = false;

    /** @var ?array<string, mixed> */
    public ?array $selectedSubmission = null;

    /** @var array<int, array<string, mixed>> */
    public array $submissions = [];

    public int $legitCount = 0;

    public int $spamCount = 0;

    public function mount(): void
    {
        $this->loadSubmissions();
        $this->loadCounts();
    }

    public function toggleSpam(): void
    {
        $this->showSpam = ! $this->showSpam;
        $this->selectedSubmission = null;
        $this->loadSubmissions();
    }

    public function select(int $id): void
    {
        $submission = FormSubmission::query()->find($id);

        if ($submission !== null) {
            $data = $submission->data;
            $data['_read'] = true;
            $submission->data = $data;
            $submission->save();

            $this->selectedSubmission = [
                'id' => $submission->id,
                'name' => $submission->data['name'] ?? 'N/A',
                'email' => $submission->data['email'] ?? 'N/A',
                'message' => $submission->data['message'] ?? '',
                'is_spam' => $submission->is_spam,
                'created_at' => $submission->created_at?->format('d.m.Y H:i'),
            ];

            $this->loadSubmissions();
        }
    }

    public function deleteSubmission(int $id): void
    {
        $submission = FormSubmission::query()->find($id);

        if ($submission !== null) {
            $submission->delete();
            $this->selectedSubmission = null;
            $this->loadSubmissions();
            $this->loadCounts();
        }
    }

    public function markNotSpam(int $id): void
    {
        $submission = FormSubmission::query()->find($id);

        if ($submission !== null) {
            $submission->is_spam = false;
            $submission->save();
            $this->selectedSubmission = null;
            $this->loadSubmissions();
            $this->loadCounts();
        }
    }

    public function clearSelection(): void
    {
        $this->selectedSubmission = null;
    }

    public static function canAccess(): bool
    {
        return auth(config('dashboard.panel.guard', 'web'))->check();
    }

    public function getTitle(): string
    {
        return 'Proofreading Inquiries';
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [...parent::getViewData(), 'submissions' => $this->submissions];
    }

    private function loadSubmissions(): void
    {
        if ($this->projectId === null) {
            $this->submissions = [];

            return;
        }

        $form = FormDefinition::query()
            ->where('project_id', $this->projectId)
            ->where('name', 'Proofreading Contact')
            ->first();

        if ($form === null) {
            $this->submissions = [];

            return;
        }

        $query = FormSubmission::query()
            ->where('form_definition_id', $form->id)
            ->where('is_spam', $this->showSpam)
            ->latest();

        $this->submissions = $query->get()
            ->map(fn (FormSubmission $s) => [
                'id' => $s->id,
                'name' => $s->data['name'] ?? 'N/A',
                'email' => $s->data['email'] ?? 'N/A',
                'message' => $s->data['message'] ?? '',
                'message_preview' => mb_strimwidth($s->data['message'] ?? '', 0, 120, '...'),
                'is_spam' => $s->is_spam,
                'is_read' => $s->data['_read'] ?? false,
                'created_at' => $s->created_at?->format('d.m.Y H:i'),
            ])
            ->toArray();
    }

    private function loadCounts(): void
    {
        if ($this->projectId === null) {
            return;
        }

        $form = FormDefinition::query()
            ->where('project_id', $this->projectId)
            ->where('name', 'Proofreading Contact')
            ->first();

        if ($form === null) {
            return;
        }

        $this->legitCount = FormSubmission::query()
            ->where('form_definition_id', $form->id)
            ->where('is_spam', false)
            ->count();

        $this->spamCount = FormSubmission::query()
            ->where('form_definition_id', $form->id)
            ->where('is_spam', true)
            ->count();
    }
}
