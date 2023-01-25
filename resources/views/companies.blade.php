<x-layout>
    <x-user-box></x-user-box>
    <header>
        <h1 class="title">Companies</h1>
    </header>
    <main id="companies">
        @auth
            <div class="companies-form_container container">
                <form method="POST" action="/" class="companies-create" enctype="multipart/form-data">
                    @csrf 
                    <div class="companies-create_value form-logo">
                        <label class="companies-create_value_label" for="Logo">Logo</label>
                        <input class="companies-create_value_input" type="file" name="Logo" id="logo"  value="{{ old('Logo') }}">
                        @error('Logo')
                            <p class="companies-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="companies-create_value form-name">
                        <label class="companies-create_value_label" for="Name">Name</label>
                        <input class="companies-create_value_input" type="text" name="Name" id="name"  value="{{ old('Name') }}"required>
                        @error('Name')
                            <p class="companies-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="companies-create_value form-email">
                        <label class="companies-create_value_label" for="Email">Email</label>
                        <input class="companies-create_value_input" type="text" name="Email" id="email" value="{{ old('Email') }}">
                        @error('Email')
                            <p class="companies-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="companies-create_value form-website">
                        <label class="companies-create_value_label" for="Website">Website</label>
                        <input class="companies-create_value_input" type="text" name="Website" id="website" value="{{ old('Website') }}">
                        @error('Website')
                            <p class="companies-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="submit">
                        <button type="submit" class="submit-btn">Create</button>
                    </div>
                </form>
            </div>
        @endauth
        <div class="companies container">
            @foreach ($companies as $company)
                <div class="company">
                    <div class="company_logo">
                        @if(!$company->Logo == null)
                            <div class="logo" style="background: url(/storage/{{$company->Logo}}); background-size: cover; background-position: center;"></div>
                        @else 
                            <img class="logo" src="/Default Images/Company Logo.png">
                        @endif
                    </div>
                    <h1 class="company_name">
                        <a href="/companies/<?= $company->Slug; ?>">
                            {{$company->Name;}}
                        </a>
                    </h1>
                    <div class="company-details">
                        <p class="company-details_email"><a href="mailto:{!! $company->Email !!}">{{$company->Email;}}</a></p>
                        <p class="company-details_website"><a href="https://{!! $company->Website !!}" target="_blank">{{$company->Website}}</a></p>
                    </div>
                    @auth
                        <div class="company_editor">
                            <ul class="company_editor-options">
                                <li><a href="/admin/company/{{ $company->id }}/edit" class="company_editor-options_option edit">Edit</a></li>
                                <li><form method="POST" action="/admin/company/{{ $company->id }}">@csrf @method('DELETE') <button class="company_editor-options_option delete">Delete</button></form></li>
                            </ul>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
        <nav class="nav-links container">
            {{ $companies->links('cpag.custom') }}
        </nav>
    </main>
</x-layout>