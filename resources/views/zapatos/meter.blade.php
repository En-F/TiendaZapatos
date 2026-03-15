<x-app-layout>
    <div class="w-full max-w-sm mx-auto">
        <form action="{{ route('carritos.store') }}" method="POST"
            class="card bg-base-200 p-6 shadow">
            @csrf
            <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
            <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
            <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
        </form>
    </div>
</x-app-layout>
