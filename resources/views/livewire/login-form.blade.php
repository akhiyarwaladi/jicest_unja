<div>
    <form wire:submit.prevent="store" class="flex flex-col gap-5">
        @if (session()->has('loginError'))
            <div class="mb-2">
                <div class="w-full bg-rose-100 text-rose-800 rounded-md p-2" role="alert">
                    {{ session('loginError') }}
                </div>
            </div>
        @endif
        <div class="flex flex-col">
            <label class="font-[300] text-base" for="email">Email address</label>
            <input type="email" class="form-control p-2 outline-none outline-offset-0 border-2 focus:border-sky-500 focus:outline-[3px] focus:outline-sky-300 rounded-md transition-all @error('email') is-invalid focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror" id="email"
                aria-describedby="emailHelp" placeholder="Enter email" name="email" wire:model.debounce.500ms='email'>
            @error('email')
                <span class="invalid-feedback font-normal text-sm text-rose-700" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex flex-col">
            <label class="font-[300] text-base" for="password">Password</label>
            <input id="password" type="password" class="form-control p-2 outline-none outline-offset-0  border-2 focus:border-sky-500 focus:outline-[3px]  focus:outline-sky-300 rounded-md transition-all @error('password') is-invalid focus:outline-rose-300 focus:border-rose-600 border-rose-600 @enderror"
                name="password" wire:model.debounce.500ms='password' autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback font-normal text-sm text-rose-700" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 border-none text-white font-semibold p-2 outline-none outline-offset-0 focus:border-emerald-500 focus:outline-4 focus:outline-emerald-300 rounded-md transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">Login</button>
    </form>
</div>
