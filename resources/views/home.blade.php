<x-layout>
    <x-slot:heading>Home Page</x-slot:heading>
    <h1>Hello from Home Page</h1>

    @foreach ($jobs as $job)
        <li> <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.</li>
    @endforeach
</x-layout>
