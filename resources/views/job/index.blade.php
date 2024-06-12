<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
              <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
              </div>
              <div>
            <div class="mb-1 font-semibold">Salary</div>
                <div class="flex space-x-2">
                    <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                    <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                </div>
            </div>
            <div>
                <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience"
                    :options="\App\Models\Career::$experience" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category"
                    :options="\App\Models\Career::$category" />
                </div>
            </div>
            <button class="w-20 h-8 rounded-md bg-blue-400 hover:bg-slate-500 hover:text-white">Filter</button>
        </form>
      </div>
    </x-card>
    @foreach ($jobs as $job)
    <x-job-card class="mb-4" :$job>
        <div>
          <x-link-button :href="route('jobs.show', $job)">
            Show
          </x-link-button>
        </div>
    </x-job-card>
    @endforeach
</x-layout>
