<x-layout>
    <main id="edit">
        <div class="edit-container">
            <div class="title">
                <h1>Edit Company</h1>
            </div>
            <form method="POST" action="/admin/company/{{ $company->id }}" class="edit" enctype="multipart/form-data">
                @csrf 
                @method('PATCH')

                <div class="value-container">
                    <label class="value-container_label" for="Logo">Logo</label>
                    <input class="value-container_input" type="file" name="Logo" id="logo"  value="{{ old('Logo', $company->Logo) }}">
                    @if($company->Logo)
                        <div class="logo container">
                            <div class="logo-preview" style="background: url(/storage/{{$company->Logo}}); background-size: cover; background-position: center;"></div>
                        </div>
                    @endif
                    @error('Logo')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="value-container form-name">
                    <label class="value-container_label" for="Name">Name</label>
                    <input class="value-container_input" type="text" name="Name" id="name"  value="{{ old('Name', $company->Name) }}"required>
                    @error('Name')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="value-container form-email">
                    <label class="value-container_label" for="Email">Email</label>
                    <input class="value-container_input" type="text" name="Email" id="email" value="{{ old('Email', $company->Email) }}">
                    @error('Email')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="value-container form-website">
                    <label class="value-container_label" for="Website">Website</label>
                    <input class="value-container_input" type="text" name="Website" id="website" value="{{ old('Website', $company->Website) }}">
                    @error('Website')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="submit">
                    <button type="submit" class="submit-btn">Save</button>
                </div>
            </form>
        </div>
    </main>
</x-layout>