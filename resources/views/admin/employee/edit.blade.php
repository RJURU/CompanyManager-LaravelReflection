<x-layout>
    <main id="edit">
        <div class="edit-container">
            <div class="title">
                <h1>Edit Employee</h1>
            </div>
            <form method="POST" action="/admin/employee/{{ $employee->id }}" class="edit" enctype="multipart/form-data">
                @csrf 
                @method('PATCH')

                <div class="value-container form-name">
                    <label class="value-container_label" for="FirstName">First Name</label>
                    <input class="value-container_input" type="text" name="FirstName" id="fname"  value="{{ old('FirstName', $employee->FirstName) }}" required>
                    @error('FirstName')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="value-container form-name">
                    <label class="value-container_label" for="LastName">Last Name</label>
                    <input class="value-container_input" type="text" name="LastName" id="lname"  value="{{ old('LastName', $employee->LastName) }}" required>
                    @error('LastName')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="value-container form-email">
                    <label class="value-container_label" for="Email">Email</label>
                    <input class="value-container_input" type="text" name="Email" id="email" value="{{ old('Email', $employee->Email) }}">
                    @error('Email')
                        <p class="value-container_error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="value-container form-website">
                    <label class="value-container_label" for="PhoneNumber">Number</label>
                    <input class="value-container_input" type="int" name="PhoneNumber" id="number" value="{{ old('PhoneNumber', $employee->PhoneNumber) }}">
                    @error('PhoneNumber')
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