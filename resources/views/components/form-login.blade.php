<form>
    @csrf
    <div class="mb-6">
        <x-label for="email" value="Email" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
    </div>
    <div class="mb-6">
        <x-label for="password" value="Password" />
        <x-input id="password" class="block mt-1 w-full" type="email" name="password" :value="old('password')" required autofocus />
    </div>
</form>
