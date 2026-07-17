<div class="space-y-6">
    <x-user-projects::page-header
        :title="'Proofreading Inquiries'"
        subtitle="View and manage proofreading contact form submissions."
        color="amber"
    >
        <x-slot:icon>
            <x-user-projects::icon name="clipboard-document-list" class="h-5 w-5" />
        </x-slot:icon>
        @if ($projectId)
            <x-slot:actions>
                <div class="flex gap-1 rounded-lg border border-gray-200 bg-white p-1 dark:border-gray-700 dark:bg-gray-800">
                    <button wire:click="$set('showSpam', false)"
                        class="rounded-md px-3 py-1.5 text-xs font-medium transition {{ !$showSpam ? 'bg-amber-500 text-white dark:bg-amber-600' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' }}">
                        Legit ({{ $legitCount }})
                    </button>
                    <button wire:click="$set('showSpam', true)"
                        class="rounded-md px-3 py-1.5 text-xs font-medium transition {{ $showSpam ? 'bg-amber-500 text-white dark:bg-amber-600' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' }}">
                        Spam ({{ $spamCount }})
                    </button>
                </div>
            </x-slot:actions>
        @endif
    </x-user-projects::page-header>

    @if (! $projectId)
        <div class="border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
            <div class="p-4 sm:p-6">
                <x-user-projects::empty-state
                    title="No project selected"
                    description="Select a project from the sidebar to view proofreading inquiries."
                    icon="clipboard-document-list"
                />
            </div>
        </div>
    @elseif (count($submissions) === 0)
        <div class="border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
            <div class="p-4 sm:p-6">
                <x-user-projects::empty-state
                    :title="$showSpam ? 'No spam submissions' : 'No inquiries received yet'"
                    :description="$showSpam ? 'Spam submissions will appear here.' : 'Submitted inquiries will appear here.'"
                    icon="clipboard-document-list"
                />
            </div>
        </div>
    @else
        <div class="border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
            <div class="px-4 pt-4 sm:px-6 sm:pt-6">
                <x-user-projects::section-header :title="$showSpam ? 'Spam Submissions' : 'Legit Submissions'" color="amber" />
            </div>
            <div class="p-4 pt-0 sm:p-6 sm:pt-0">
                <div class="-mx-4 -mb-4 overflow-hidden sm:-mx-6 sm:-mb-6">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-800">
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 sm:px-6">Name</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 sm:px-6">Email</th>
                                <th scope="col" class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:table-cell sm:px-6">Message</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 sm:px-6">Date</th>
                                <th scope="col" class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 sm:px-6"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($submissions as $s)
                                <tr class="cursor-pointer transition hover:bg-gray-50 dark:hover:bg-gray-800/50 {{ ($s['is_read'] ?? false) ? '' : '' }}" wire:click="select({{ $s['id'] }})">
                                    <td class="px-4 py-4 text-sm font-medium sm:px-6 {{ ($s['is_read'] ?? false) ? 'text-gray-900 dark:text-gray-100' : 'text-amber-600 dark:text-amber-400' }}">
                                        @if (!($s['is_read'] ?? false))
                                            <span class="mr-1.5 inline-block h-2 w-2 rounded-full bg-amber-500"></span>
                                        @endif
                                        {{ $s['name'] }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 sm:px-6 dark:text-gray-400">{{ $s['email'] }}</td>
                                    <td class="hidden truncate px-4 py-4 text-sm text-gray-500 md:table-cell sm:px-6 dark:text-gray-400">{{ $s['message_preview'] }}</td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500 sm:px-6 dark:text-gray-400">{{ $s['created_at'] }}</td>
                                    <td class="whitespace-nowrap px-4 py-4 text-right text-sm sm:px-6">
                                        @if ($showSpam)
                                            <div class="flex items-center justify-end gap-2">
                                                <button wire:click.stop="markNotSpam({{ $s['id'] }})"
                                                    class="inline-flex items-center gap-1 rounded border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-medium text-amber-700 transition hover:bg-amber-100 dark:border-amber-800 dark:bg-amber-900/30 dark:text-amber-400 dark:hover:bg-amber-900/50">
                                                    Not Spam
                                                </button>
                                                <button wire:click.stop="deleteSubmission({{ $s['id'] }})"
                                                    onclick="return confirm('Delete this submission?') || event.stopPropagation()"
                                                    class="inline-flex items-center gap-1 rounded border border-rose-200 px-2 py-1 text-xs font-medium text-rose-600 transition hover:bg-rose-50 dark:border-rose-800 dark:text-rose-400 dark:hover:bg-rose-900/30">
                                                    <x-user-projects::icon name="x" class="h-3 w-3" />
                                                </button>
                                            </div>
                                        @else
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="mailto:{{ $s['email'] }}?subject=Re:%20Proofreading%20Inquiry"
                                                    class="inline-flex items-center gap-1 text-xs font-medium text-gray-400 transition hover:text-amber-600 dark:text-gray-500 dark:hover:text-amber-400"
                                                    onclick="event.stopPropagation()">
                                                    <x-user-projects::icon name="mail" class="h-3.5 w-3.5" />
                                                    Reply
                                                </a>
                                                <button wire:click.stop="deleteSubmission({{ $s['id'] }})"
                                                    onclick="return confirm('Delete this submission?') || event.stopPropagation()"
                                                    class="inline-flex items-center gap-1 rounded border border-rose-200 px-2 py-1 text-xs font-medium text-rose-600 transition hover:bg-rose-50 dark:border-rose-800 dark:text-rose-400 dark:hover:bg-rose-900/30">
                                                    <x-user-projects::icon name="x" class="h-3 w-3" />
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="mt-4 text-xs text-gray-400 dark:text-gray-500">{{ count($submissions) }} {{ $showSpam ? 'spam' : '' }} submissions.</p>
            </div>
        </div>

        @if ($selectedSubmission)
            <div class="border border-amber-200 bg-white shadow-sm dark:border-amber-900/50 dark:bg-gray-900">
                <div class="border-b border-gray-200 p-4 dark:border-gray-700 sm:p-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $selectedSubmission['name'] }}</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $selectedSubmission['email'] }}</p>
                            <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-500">{{ $selectedSubmission['created_at'] }}</p>
                        </div>
                        <div class="flex gap-2">
                            @if (! ($selectedSubmission['is_spam'] ?? false))
                                <a href="mailto:{{ $selectedSubmission['email'] }}?subject=Re:%20Proofreading%20Inquiry"
                                    class="inline-flex items-center gap-1.5 rounded bg-amber-500 px-3 py-2 text-xs font-medium text-white transition hover:bg-amber-600 dark:bg-amber-600 dark:hover:bg-amber-500">
                                    <x-user-projects::icon name="mail" class="h-4 w-4" />
                                    Reply via Email
                                </a>
                            @else
                                <button wire:click="markNotSpam({{ $selectedSubmission['id'] }})"
                                    class="inline-flex items-center gap-1.5 rounded border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-medium text-amber-700 transition hover:bg-amber-100 dark:border-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                    Mark as Not Spam
                                </button>
                            @endif
                            <button wire:click="clearSelection"
                                class="rounded px-3 py-2 text-xs font-medium text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                Close
                            </button>
                            <button wire:click="deleteSubmission({{ $selectedSubmission['id'] }})"
                                onclick="return confirm('Permanently delete this submission?')"
                                class="inline-flex items-center gap-1 rounded border border-rose-200 px-3 py-2 text-xs font-medium text-rose-600 transition hover:bg-rose-50 dark:border-rose-800 dark:text-rose-400 dark:hover:bg-rose-900/30">
                                <x-user-projects::icon name="trash" class="h-3.5 w-3.5" />
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4 text-sm leading-relaxed text-gray-700 sm:p-6 dark:text-gray-300">
                    {!! nl2br(e($selectedSubmission['message'])) !!}
                </div>
            </div>
        @endif
    @endif
</div>
