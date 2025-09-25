<div>
    <form wire:submit.prevent="save" class="flex flex-col gap-5">
        <div class="flex flex-col gap-2">
            <label for="full_name1">Full Name</label>
            <input type="text" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('full_name1') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                wire:model.debounce.500ms="full_name1" id="full_name1" name="full_name1"
                placeholder="Full Name (without academic title) Ex: Muhammad Ridho">
            @error('full_name1')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <small id="fullName" class="form-text text-muted my-2"></small>
            <input type="text" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('full_name2') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                wire:model.debounce.500ms="full_name2" id="full_name2" name="full_name2"
                placeholder="Full Name (with academic title) Ex: Dr. Muhammad Ridho, M.Sc">
            @error('full_name2')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="gender" class="d-block">Gender</label>
            <div class="flex flex-row gap-2">
                <label class="form-text text-muted d-inline">
                    <input type="radio" name="options" wire:model.debounce.500ms='gender' id="gender"
                        autocomplete="off" value="male" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 transition-all rounded-full"> Male
                </label>
                <label class="form-text text-muted d-inline">
                    <input type="radio" name="options" wire:model.debounce.500ms='gender' id="gender"
                        autocomplete="off" value="female" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 transition-all rounded-full">
                    Female
                </label>
                @error('gender')
                    <span class="font-normal text-sm text-rose-700 d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="participant">
                Participant
            </label>
            <select class="p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all   @error('participant_type') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="participant_type"
                name="participant_type" wire:model.debounce.500ms='participant_type'>
                <option value="">Choose One</option>
                <option value="presenter_reguler">Presenter Reguler</option>
                <option value="presenter_student">Presenter Student</option>
                <option value="participant_reguler">Participant Reguler</option>
                <option value="participant_student">Participant Student</option>
            </select>
            @error('participant_type')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="participant">
                Attendance
            </label>
            <select class="p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all  @error('attendance') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="attendance" name="attendance"
                wire:model.debounce.500ms='attendance'>
                <option value="">Choose One</option>
                <option value="online">Online</option>
                <option value="offline">Offline</option>
            </select>
            @error('attendance')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="institution">Institution</label>
            <textarea class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('institution') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="institution" rows="3"
                placeholder="Institution Name" name="institution" wire:model.debounce.500ms='institution'></textarea>
            @error('institution')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="address">Address</label>
            <textarea class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('address') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="address" rows="3"
                placeholder="Full Address" name="address" wire:model.debounce.500ms='address'></textarea>
            @error('address')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('address') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="phone"
                placeholder="Phone Number" name="phone" wire:model.debounce.500ms='phone'>
            @error('phone')
                <span class="font-normal text-sm text-rose-700">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="email">Email address</label>
            <input type="email" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('email') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="email"
                aria-describedby="emailHelp" placeholder="Enter email" name="email"
                wire:model.debounce.500ms='email'>
            @error('email')
                <span class="font-normal text-sm text-rose-700" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                anyone
                else.</small>
        </div>
        <div class="flex flex-col gap-2">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('password') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                name="password" wire:model.debounce.500ms='password' placeholder="Password" autocomplete="current-password">
            @error('password')
                <span class="font-normal text-sm text-rose-700" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="password">Confirm Password</label>
            <input id="password" type="password"
                class="form-control p-2 outline-none outline-offset-0 border border-gray-400 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('confirmPassword') focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" name="confirmPassword"
                wire:model.debounce.500ms='confirmPassword' autocomplete="current-password" placeholder="Confirm Password">
            @error('confirmPassword')
                <span class="font-normal text-sm text-rose-700" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 border-none text-white font-semibold p-2 outline-none outline-offset-0 focus:border-emerald-500 focus:outline-4 focus:outline-emerald-300 rounded-md transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl" wire:target="save" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="save">Register</span>
            <span wire:loading wire:target="save">Registering..</span>
        </button>
    </form>
</div>
