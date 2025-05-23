@extends('partials.layout')
@section('content')

<h1 class="text-2xl font-bold mb-6">Profile</h1>

<div class="space-y-10">
  

    <div class="card bg-base-200 shadow">
        <div class="card-body">
            <h2 class="card-title text-lg">Profile Information</h2>
            <p>Update your account profile information and email adress.</p>
            
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="input input-bordered w-full @error('name') input-error @enderror" />
                    @error('name') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        class="input input-bordered w-full @error('email') input-error @enderror" />
                    @error('email') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-neutral">SAVE</button>
            </form>
        </div>
    </div>

    
    <div class="card bg-base-200 shadow">
        <div class="card-body">
            <h2 class="card-title text-lg">Update Password</h2>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">

                <p>Ensure your account is using a long, random password to stay secure</p>

                @csrf
                @method('PUT')

                <div>
                    <label class="label">
                        <span class="label-text">Current Password</span>
                    </label>
                    <input type="password" name="current_password"
                        class="input input-bordered w-full @error('current_password') input-error @enderror" />
                    @error('current_password') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="label">
                        <span class="label-text">New Password</span>
                    </label>
                    <input type="password" name="password"
                        class="input input-bordered w-full @error('password') input-error @enderror" />
                    @error('password') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="label">
                        <span class="label-text">Confirm New Password</span>
                    </label>
                    <input type="password" name="password_confirmation" class="input input-bordered w-full" />
                </div>

                <button type="submit" class="btn btn-neutral">SAVE</button>
            </form>
        </div>
    </div>

    
    <div class="card bg-base-200 shadow">
        <div class="card-body">
            <h2 class="card-title text-lg">Delete Account</h2>
            
               <p>Once your account is deleted, all of its resources and data will be permanently deleted.</p> 
               <p>Before deleting your account, please download any data or information that you wish to retain.</p> 
        
            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
                @csrf
                @method('DELETE')

               <button type="submit" class="btn bg-red-500 text-white border-none px-6"> DELETE ACCOUNT</button>

            </form>
        </div>
    </div>

</div>
@endsection
