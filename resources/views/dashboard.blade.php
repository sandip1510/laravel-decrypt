<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h2>Encrypt/Decrypt Data</h2>
                    <form method="POST" action="{{ route('dashboard.encrypt-decrypt') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="data" class="form-label">Enter Data:</label>
                            <input type="text" class="form-control" id="data" name="data" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="action" class="form-label">Choose Action:</label>
                            <select class="form-select" id="action" name="action" required>
                                <option value="encrypt">Encrypt</option>
                                <option value="decrypt">Decrypt</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <hr>

                    @if(session('result'))
                        <div class="alert alert-info mt-3">
                            <strong>Result:</strong> {{ session('result') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
