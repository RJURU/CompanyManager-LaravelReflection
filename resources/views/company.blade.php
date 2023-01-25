<x-layout>
    <x-user-box></x-user-box>
    <header>
        <h2 class="back_btn"><a href="/">Home</a></h2>
        <h1 class="title company_name">{{ $company->Name; }}</h1>
    </header>
    <main id="company">
        <div class="company-details">
            <p class="company-details_contact"><a href="mailto:{!! $company->Email !!}">{!! $company->Email; !!}</a></p>
            <p class="company-details_contact"><a href="https://{!! $company->Website; !!}" target="_blank">{!! $company->Website; !!}</a></p>
        </div>
        @auth
            <div class="employees-form_container container">
                <form method="POST" action="/companies/{{ $company->Slug }}/employees" class="employees-create">
                    @csrf 
                    <div class="employees-create_value form-fname">
                        <label class="employees-create_value_label" for="FirstName">First Name</label>
                        <input class="employees-create_value_input" type="text" name="FirstName" id="fname"  value="{{ old('FirstName') }}" required>
                        @error('FirstName')
                            <p class="employees-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="employees-create_value form-lname">
                        <label class="employees-create_value_label" for="LastName">Last Name</label>
                        <input class="employees-create_value_input" type="text" name="LastName" id="lname"  value="{{ old('LastName') }}" required>
                        @error('LastName')
                            <p class="employees-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="employees-create_value form-email">
                        <label class="employees-create_value_label" for="Email">Email</label>
                        <input class="employees-create_value_input" type="text" name="Email" id="email" value="{{ old('Email') }}">
                        @error('Email')
                            <p class="employees-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="employees-create_value form-phonenumber">
                        <label class="employees-create_value_label" for="PhoneNumber">Number</label>
                        <input class="employees-create_value_input" type="int" name="PhoneNumber" id="number" value="{{ old('PhoneNumber') }}">
                        @error('PhoneNumber')
                            <p class="employees-create_value_error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="submit">
                        <button type="submit" class="submit-btn">Create</button>
                    </div>
                </form>
            </div>
        @endauth
        <div class="employees container">
            @foreach ($company->employees as $employee)
                <div class="employee">
                    <div class="top">
                        <h2 class="name">{{ $employee->FirstName }} {{ $employee->LastName }}</h2>
                    </div>
                    <div class="bottom">
                        <p class="email">{{ $employee->Email }}</p>
                        <p class="number">{{ $employee->PhoneNumber }}</p>
                    </div>
                    @auth
                        <div class="employee-editor">
                            <ul>
                                <li><a href="/admin/employee/{{ $employee->id }}/edit" class="employee-editor-options_option edit">Edit</a></li>
                                <li><form method="POST" action="/admin/employee/{{ $employee->id }}">@csrf @method('DELETE') <button class="employee-editor-options_option delete">Delete</button></form></li>
                            </ul>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
