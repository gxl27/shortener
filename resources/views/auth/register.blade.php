<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 mb-12">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1 primary-color">Register</h2>
        <p class="mb-4 primary-colo">Creeaza un cont acum!</p>
      </header>
  
      <form method="POST" action="/auth" >
        @csrf
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2"> Name </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />
  
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">Email</label>
          <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
  
          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="password" class="inline-block text-lg mb-2">
            Password
          </label>
          <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
            value="{{old('password')}}" />
  
          @error('password')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="password2" class="inline-block text-lg mb-2">
            Confirm Password
          </label>
          <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
            value="{{old('password_confirmation')}}" />
  
          @error('password_confirmation')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="py-6 w-full flex justify-center">
          <button class="primary-color-bg text-white rounded py-2 px-4 w-full">
            Creeaza
          </button>
        </div>
  
        <div class="mt-8 text-center">
          <p>
            Ai deja cont?
            <a href="/login"  class="text-blue-500">Login</a>
          </p>
        </div>
      </form>
    </x-card>
  </x-layout>