<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center my-6">
        <h2 class="text-2xl font-bold uppercase mb-1 primary-color">Login</h2>
      </header>
  
      <form method="POST" action="/auth/authenticate">
        @csrf
  
        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">Email</label>
          <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
  
          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="password" class="inline-block text-lg mb-2">
            Parola
          </label>
          <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
            value="{{old('password')}}" />
  
          @error('password')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="py-6 w-full flex justify-center">
          <button class="primary-color-bg text-white rounded py-2 px-4 w-full">
            Login
          </button>
        </div>
  
        <div class="mb-4 text-center">
          <p>
            Nu ai un cont?
            <a href="/register" class="text-blue-500">Register</a>
          </p>
        </div>
      </form>
    </x-card>
  </x-layout>