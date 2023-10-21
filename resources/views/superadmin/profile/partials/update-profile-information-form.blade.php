<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('first_name', $user->first_name)" required autofocus autocomplete="First Name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>
            <div>
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('middle_name', $user->middle_name)" required autofocus autocomplete="Middle Name" />
                <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
            </div>
            <div>
                <x-input-label for="surname" :value="__('Surame')" />
                <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('surname', $user->surname)" required autofocus autocomplete="Surname" />
                <x-input-error class="mt-2" :messages="$errors->get('surname')" />
            </div>
            <div>
                <x-input-label for="student_number" :value="__('Account Number')" />
                <x-text-input id="student_number" name="student_number" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('student_number', $user->student_number)" required autofocus autocomplete="Accoount Number" />
                <x-input-error class="mt-2" :messages="$errors->get('student_number')" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            <div>
                <label for="role" class="text-gray-700">Role</label>
                <select type="text" id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>superadmin</option>
                      <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>admin</option>
                      <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>student</option>
                </select>
            </div>
            <div>
                <label for="sex" class="text-gray-700">Sex</label>
                <select type="text" id="sex" name="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Male" {{ old('sex', $user->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('sex', $user->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Others" {{ old('sex', $user->sex) == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>
            <div>
                <label for="civil_status" class="text-gray-700">Civil Status</label>
                <select type="text" id="civil_status" name="civil_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Single" {{ old('civil_status', $user->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ old('civil_status', $user->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Widow" {{ old('civil_status', $user->civil_status) == 'Widow' ? 'selected' : '' }}>Widow</option>
                </select>
            </div>
            <div>
                <x-input-label for="nationality" :value="__('Nationality')" />
                <x-text-input id="nationality" name="nationality" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('nationality', $user->nationality)" required autofocus autocomplete="Nationality" />
                <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
            </div>
            <div>
                <x-input-label for="religion" :value="__('Religion')" />
                <x-text-input id="religion" name="religion" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('religion', $user->religion)" required autofocus autocomplete="Religion" />
                <x-input-error class="mt-2" :messages="$errors->get('religion')" />
            </div>
            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" name="age" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('age', $user->age)" required autofocus autocomplete="Age" />
                <x-input-error class="mt-2" :messages="$errors->get('age')" />
            </div>
            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('birthday', $user->birthday)" required autofocus autocomplete="Birthday" />
                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
            </div>
            <div>
                <x-input-label for="birth_place" :value="__('Birth Place')" />
                <x-text-input id="birth_place" name="birth_place" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('birth_place', $user->birth_place)" required autofocus autocomplete="Birth Place" />
                <x-input-error class="mt-2" :messages="$errors->get('birth_place')" />
            </div>
            <div>
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" name="contact_number" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('contact_number', $user->contact_number)" required autofocus autocomplete="Contact Number" />
                <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
            </div>
            <div>
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('address', $user->address)" required autofocus autocomplete="Address" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
            <div>
                <x-input-label for="postal_code" :value="__('Postal Code')" />
                <x-text-input id="postal_code" name="postal_code" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('postal_code', $user->postal_code)" required autofocus autocomplete="Postal Code" />
                <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
            </div>
            <div>
                <x-input-label for="elementary_school" :value="__('Elementary School')" />
                <x-text-input id="elementary_school" name="elementary_school" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('elementary_school', $user->elementary_school)" required autofocus autocomplete="Elementary School" />
                <x-input-error class="mt-2" :messages="$errors->get('elementary_school')" />
            </div>
            <div>
                <x-input-label for="juniorhigh_school" :value="__('Junior High School')" />
                <x-text-input id="juniorhigh_school" name="juniorhigh_school" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('juniorhigh_school', $user->juniorhigh_school)" required autofocus autocomplete="Junior High School" />
                <x-input-error class="mt-2" :messages="$errors->get('juniorhigh_school')" />
            </div>
            <div>
                <x-input-label for="juniorhigh_school" :value="__('Junior High School')" />
                <x-text-input id="juniorhigh_school" name="juniorhigh_school" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('juniorhigh_school', $user->juniorhigh_school)" required autofocus autocomplete="Junior High School" />
                <x-input-error class="mt-2" :messages="$errors->get('juniorhigh_school')" />
            </div>
            <div>
                <x-input-label for="seniorhigh_school" :value="__('Senior High School')" />
                <x-text-input id="seniorhigh_school" name="seniorhigh_school" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('seniorhigh_school', $user->seniorhigh_school)" required autofocus autocomplete="Senior High School" />
                <x-input-error class="mt-2" :messages="$errors->get('seniorhigh_school')" />
            </div>
            <div>
                <label for="program" class="text-gray-700">Program</label>
                <select type="text" id="program" name="program" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Bachelor of Science in Business Aadministration major in Business Management" {{ old('program', $user->program) == 'Bachelor of Science in Business Aadministration major in Business Management' ? 'selected' : '' }}>Bachelor of Science in Business Aadministration major in Business Management</option>
                    <option value="Bachelor of Science in Information Technology" {{ old('program', $user->program) == 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Elementary Education" {{ old('program', $user->program) == 'Bachelor of Elementary Education' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
                    <option value="Bachelor of Secondary Education major in English" {{ old('program', $user->program) == 'Bachelor of Secondary Education major in English' ? 'selected' : '' }}>Bachelor of Secondary Education major in English</option>
                    <option value="Bachelor of Secondary Education major in Mathematics" {{ old('program', $user->program) == 'Bachelor of Secondary Education major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education major in Mathematics</option>
                    <option value="Bachelor of Science in Hospitality Management" {{ old('program', $user->program) == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
                    <option value="Bachelor of Science in Tourism Management" {{ old('program', $user->program) == 'Bachelor of Science in Tourism Management' ? 'selected' : '' }}>Bachelor of Science in Tourism Management</option>
                    <option value="Bachelor of Science in Psychology" {{ old('program', $user->program) == 'Bachelor of Science in Psychology' ? 'selected' : '' }}>Bachelor of Science in Psychology</option>
                    <option value="None" {{ old('program', $user->program) == 'None' ? 'selected' : '' }}>None</option>
                </select>
            </div>
            <div>
                <label for="undergraduate_year" class="text-gray-700">Year</label>
                <select type="text" id="undergraduate_year" name="undergraduate_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="First Year" {{ old('undergraduate_year', $user->undergraduate_year) == 'First Year' ? 'selected' : '' }}>First Year</option>
                    <option value="Second Year" {{ old('undergraduate_year', $user->undergraduate_year) == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                    <option value="Third Year" {{ old('undergraduate_year', $user->undergraduate_year) == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                    <option value="Fourth Year" {{ old('undergraduate_year', $user->undergraduate_year) == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                    <option value="None" {{ old('undergraduate_year', $user->undergraduate_year) == 'None' ? 'selected' : '' }}>None</option>
                </select>
            </div>
            <div>
                <label for="student_classification" class="text-gray-700">Student Classification</label>
                <select type="text" id="student_classification" name="student_classification" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Continuing" {{ old('student_classification', $user->student_classification) == 'Continuing' ? 'selected' : '' }}>Continuing</option>
                    <option value="New" {{ old('student_classification', $user->student_classification) == 'New' ? 'selected' : '' }}>New</option>
                    <option value="Transferee" {{ old('student_classification', $user->student_classification) == 'Transferee' ? 'selected' : '' }}>Transferee</option>
                    <option value="Shiftee" {{ old('student_classification', $user->student_classification) == 'Shiftee' ? 'selected' : '' }}>Shiftee</option>
                    <option value="Returnee" {{ old('student_classification', $user->student_classification) == 'Returnee' ? 'selected' : '' }}>Returnee</option>
                    <option value="Cross Enrollee" {{ old('student_classification', $user->student_classification) == 'Cross Enrollee' ? 'selected' : '' }}>Cross Enrollee</option>
                    <option value="None" {{ old('student_classification', $user->student_classification) == 'None' ? 'selected' : '' }}>None</option>
                </select>
            </div>
            <div>
                <label for="registration_status" class="text-gray-700">Registration Status</label>
                <select type="text" id="registration_status" name="registration_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Regular" {{ old('registration_status', $user->registration_status) == 'Regular' ? 'selected' : '' }}>Regular</option>
                      <option value="Irregular" {{ old('registration_status', $user->registration_status) == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                      <option value="None" {{ old('registration_status', $user->registration_status) == 'None' ? 'selected' : '' }}>None</option>
                </select>
            </div>
            <div>
                <x-input-label for="guardian_name" :value="__('Guardian Name')" />
                <x-text-input id="guardian_name" name="guardian_name" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('guardian_name', $user->guardian_name)" required autofocus autocomplete="Guardian Name" />
                <x-input-error class="mt-2" :messages="$errors->get('guardian_name')" />
            </div>
            <div>
                <x-input-label for="guardian_number" :value="__('Guardian Number')" />
                <x-text-input id="guardian_number" name="guardian_number" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('guardian_number', $user->guardian_number)" required autofocus autocomplete="Guardian Number" />
                <x-input-error class="mt-2" :messages="$errors->get('guardian_number')" />
            </div>
            <div>
                <x-input-label for="guardian_occupation" :value="__('Guardian Occupation')" />
                <x-text-input id="guardian_occupation" name="guardian_occupation" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('guardian_occupation', $user->guardian_occupation)" required autofocus autocomplete="Guardian Occupation" />
                <x-input-error class="mt-2" :messages="$errors->get('guardian_occupation')" />
            </div>
            <div>
                <x-input-label for="guardian_address" :value="__('Guardian Address')" />
                <x-text-input id="guardian_address" name="guardian_address" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('guardian_address', $user->guardian_address)" required autofocus autocomplete="Guardian Address" />
                <x-input-error class="mt-2" :messages="$errors->get('guardian_address')" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
