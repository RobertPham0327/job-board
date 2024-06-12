<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job >
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
        <table>
            <tr>
                <th>Được tạo vào</th>
            </tr>
            <tr>
                <td>{{ \Carbon\Carbon::parse($job->created_at)->format('m/d/Y') }}</td>
            </tr>
        </table>

    </x-job-card>
</x-layout>
