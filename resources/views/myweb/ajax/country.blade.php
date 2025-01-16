@extends('myweb.layouts.welcome')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold text-center mb-4">Countries</h1>
        <p class="text-center mb-8">Manage your countries here.</p>

        <div class="flex justify-end mb-4">
            <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Country</button>
        </div>

        <table id="countriesTable" class="table table-striped table-bordered w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div id="addCountryModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4">Add New Country</h2>
            <form id="addCountryForm">
                <div class="mb-4">
                    <label for="countryName" class="block text-sm font-medium text-gray-700">Country Name</label>
                    <input type="text" id="countryName" name="name" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="countryCode" class="block text-sm font-medium text-gray-700">Country Code</label>
                    <input type="number" id="countryCode" name="code" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModal"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">Add
                        Country</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('addCountryModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('addCountryModal').classList.add('hidden');
        });

        document.getElementById('addCountryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('countryName').value;
            const code = document.getElementById('countryCode').value;

            $.ajax({
                url: '{{ route('countries.store') }}',
                method: 'POST',
                data: {
                    name: name,
                    code: code,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    document.getElementById('addCountryModal').classList.add('hidden');
                    document.getElementById('addCountryForm').reset();
                    $('#countriesTable').DataTable().ajax.reload();

                },
                error: function(xhr) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success === false) {
                        alert(response.message || "An error occurred.");
                    } else {
                        alert("An unknown error occurred.");
                    }
                }
            });
        });
    </script>
@endsection
