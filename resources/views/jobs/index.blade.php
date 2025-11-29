<x-app-layout>

    <div class="p-6 max-w-7xl mx-auto">
        <!-- Top Header Bar -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-semibold text-gray-900 mb-1">Projects</h1>
                <p class="text-gray-600">Manage your freelance projects efficiently</p>
            </div>
            <button onclick="toggleAddJobModal()"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Project
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Total Projects</span>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ count($jobs) }}</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">In Progress</span>
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ $jobs->where('status', 'in_progress')->count() }}</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Completed</span>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ $jobs->where('status', 'done')->count() }}</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Pending</span>
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900">{{ $jobs->where('status', 'pending')->count() }}</p>
            </div>
        </div>

        <!-- Projects Grid -->
        @if (count($jobs) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($jobs as $job)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                        <!-- Card Header -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex items-start justify-between mb-3">
                                <h3
                                    class="font-semibold text-lg text-gray-900 group-hover:text-blue-600 transition line-clamp-1">
                                    {{ $job->job_name }}
                                </h3>
                                <div class="flex items-center gap-2">
                                    <!-- Status Badge -->
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'in_progress' => 'bg-blue-100 text-blue-800',
                                            'done' => 'bg-green-100 text-green-800',
                                            'revision' => 'bg-orange-100 text-orange-800',
                                            'cancelled' => 'bg-red-100 text-red-800',
                                        ];
                                    @endphp
                                    <span
                                        class="px-3 py-1 text-xs font-medium rounded-full {{ $statusColors[$job->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                                    </span>

                                    <!-- More Menu -->
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click="open = !open"
                                            class="p-1 hover:bg-gray-100 rounded-lg transition">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false"
                                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                <span class="flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Edit
                                                </span>
                                            </a>
                                            <form method="POST" action="/jobs/{{ $job->id }}"
                                                onsubmit="return confirm('Delete this project?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                    <span class="flex items-center gap-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Delete
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Client & Deadline -->
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ $job->client_name }}
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Tasks List -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-sm font-semibold text-gray-900">Tasks</h4>
                                <span class="text-xs text-gray-500">
                                    {{ $job->tasks->where('is_done', true)->count() }}/{{ $job->tasks->count() }}
                                    completed
                                </span>
                            </div>

                            <div class="space-y-3 max-h-48 overflow-y-auto">
                                @forelse ($job->tasks as $task)
                                    <div class="flex items-start gap-3 group/task">
                                        <form method="POST" action="/task/{{ $task->id }}"
                                            class="flex-shrink-0">
                                            @csrf @method('PATCH')
                                            <button
                                                class="mt-0.5 w-5 h-5 border-2 rounded transition-all duration-200
                                                {{ $task->is_done ? 'bg-blue-600 border-blue-600' : 'border-gray-300 hover:border-blue-500 bg-white' }}">
                                                @if ($task->is_done)
                                                    <svg class="w-full h-full text-white p-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                        <span
                                            class="text-sm {{ $task->is_done ? 'line-through text-gray-400' : 'text-gray-700' }} transition flex-1">
                                            {{ $task->task }}
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-400 text-center py-4">No tasks yet</p>
                                @endforelse
                            </div>

                            <!-- Progress Bar -->
                            @if ($job->tasks->count() > 0)
                                @php
                                    $progress =
                                        ($job->tasks->where('is_done', true)->count() / $job->tasks->count()) * 100;
                                @endphp
                                <div class="mt-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full transition-all duration-300"
                                            style="width: {{ $progress }}%"></div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                            <form method="POST" action="/job/{{ $job->id }}/status"
                                class="flex items-center gap-2">
                                @csrf @method('PATCH')
                                <label class="text-sm text-gray-600 font-medium">Status:</label>
                                <select name="status" onchange="this.form.submit()"
                                    class="flex-1 text-sm border border-gray-300 px-3 py-1.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-white">
                                    @foreach (['pending' => 'Pending', 'in_progress' => 'In Progress', 'done' => 'Done', 'revision' => 'Revision', 'cancelled' => 'Cancelled'] as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ $value == $job->status ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No projects yet</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first freelance project</p>
                <button onclick="toggleAddJobModal()"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:shadow-lg transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    Create Project
                </button>
            </div>
        @endif
    </div>

    <!-- Add Job Modal -->
    <div id="addJobModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-6">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900">Create New Project</h2>
                <button onclick="toggleAddJobModal()" class="p-2 hover:bg-gray-100 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form method="POST" action="/jobs" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Project Name</label>
                        <input name="job_name" required placeholder="e.g. E-commerce Website"
                            class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Client Name</label>
                        <input name="client_name" required placeholder="e.g. Acme Corp"
                            class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                        <input type="date" name="deadline" required
                            class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status"
                            class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none bg-white">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="done">Done</option>
                            <option value="revision">Revision</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tasks</label>
                    <div id="tasks" class="space-y-3">
                        <input name="tasks[]" placeholder="Task 1: Create wireframe"
                            class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                    </div>
                    <button type="button" onclick="addTask()"
                        class="mt-3 text-sm font-medium text-blue-600 hover:text-blue-700 transition flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Add Task
                    </button>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="toggleAddJobModal()"
                        class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition font-medium shadow-md hover:shadow-lg">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let taskCount = 1;

        function addTask() {
            taskCount++;
            document.getElementById('tasks').insertAdjacentHTML('beforeend',
                `<input name="tasks[]" placeholder="Task ${taskCount}" class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">`
            );
        }

        function toggleAddJobModal() {
            const modal = document.getElementById('addJobModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('addJobModal');
                if (!modal.classList.contains('hidden')) {
                    toggleAddJobModal();
                }
            }
        });
    </script>

</x-app-layout>
