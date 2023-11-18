<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email street.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('superadmin.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <x-input-label for="firstName" :value="__('First Name')" />
                <x-text-input id="firstName" name="firstName" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('firstName', $user->firstName)" required autofocus autocomplete="First Name" />
                <x-input-error class="mt-2" :messages="$errors->get('firstName')" />
            </div>
            <div>
                <x-input-label for="middleName" :value="__('Middle Name')" />
                <x-text-input id="middleName" name="middleName" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('middleName', $user->middleName)" required autofocus autocomplete="Middle Name" />
                <x-input-error class="mt-2" :messages="$errors->get('middleName')" />
            </div>
            <div>
                <x-input-label for="lastName" :value="__('Last Name')" />
                <x-text-input id="lastName" name="lastName" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('lastName', $user->lastName)" required autofocus autocomplete="lastName" />
                <x-input-error class="mt-2" :messages="$errors->get('lastName')" />
            </div>
            <div>
                <x-input-label for="studentNumber" :value="__('Account Number')" />
                <x-text-input id="studentNumber" name="studentNumber" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('studentNumber', $user->studentNumber)" required autofocus autocomplete="Accoount Number" />
                <x-input-error class="mt-2" :messages="$errors->get('studentNumber')" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email street is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email street.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            <div>
                <x-input-label for="role" :value="__('Role')" />
                <x-text-input id="role" name="role" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('student_role', $user->role)" required autofocus autocomplete="roal" readonly/>
            </div>
            <div>
                <label for="gender" class="text-gray-700">Gender</label>
                <select type="text" id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div>
                <label for="status" class="text-gray-700">Civil Status</label>
                <select type="text" id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Single" {{ old('status', $user->status) == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ old('status', $user->status) == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Widow" {{ old('status', $user->status) == 'Widow' ? 'selected' : '' }}>Widow</option>
                </select>
            </div>
            <div>
                <x-input-label for="citizenship" :value="__('Citizenship')" />
                <x-text-input id="citizenship" name="citizenship" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('citizenship', $user->citizenship)" required autofocus autocomplete="citizenship" />
                <x-input-error class="mt-2" :messages="$errors->get('citizenship')" />
            </div>
            <div>
                <x-input-label for="religion" :value="__('Religion')" />
                <x-text-input id="religion" name="religion" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('religion', $user->religion)" required autofocus autocomplete="Religion" />
                <x-input-error class="mt-2" :messages="$errors->get('religion')" />
            </div>
            <div>
                <x-input-label for="dateOfBirth" :value="__('Birthday')" />
                <x-text-input id="dateOfBirth" name="dateOfBirth" type="date" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('dateOfBirth', $user->dateOfBirth)" required autofocus autocomplete="dateOfBirth" />
                <x-input-error class="mt-2" :messages="$errors->get('dateOfBirth')" />
            </div>
            <div>
                <x-input-label for="mobilePhone" :value="__('Contact Number')" />
                <x-text-input id="mobilePhone" name="mobilePhone" type="number" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('mobilePhone', $user->mobilePhone)" required autofocus autocomplete="Contact Number" />
                <x-input-error class="mt-2" :messages="$errors->get('mobilePhone')" />
            </div>
            <div>
                <x-input-label for="street" :value="__('Street')" />
                <x-text-input id="street" name="street" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('street', $user->street)" required autofocus autocomplete="street" />
                <x-input-error class="mt-2" :messages="$errors->get('street')" />
            </div>
            <div>
                <x-input-label for="barangay" :value="__('barangay')" />
                <x-text-input id="barangay" name="barangay" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('barangay', $user->barangay)" required autofocus autocomplete="barangay" />
                <x-input-error class="mt-2" :messages="$errors->get('barangay')" />
            </div>
            <div>
                <x-input-label for="municipality" :value="__('Municipality')" />
                <x-text-input id="municipality" name="municipality" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('municipality', $user->municipality)" required autofocus autocomplete="municipality" />
                <x-input-error class="mt-2" :messages="$errors->get('municipality')" />
            </div>
            <div>
                <x-input-label for="province" :value="__('Province')" />
                <x-text-input id="province" name="province" type="text" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('province', $user->province)" required autofocus autocomplete="province" />
                <x-input-error class="mt-2" :messages="$errors->get('province')" />
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
