@extends('auth.layout.app')

@section('title', 'Register')

@section('main_content')

<body>
    <div id="container" class="container">
        <div class="row">

            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                </div>
            </div>

            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-in">

                        <form action="{{ route('register_submit') }}" method="POST">
                            @csrf

                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button>
                                Sign up
                            </button>
                            <p>
                                <span>
                                    Already have an account?
                                </span>
                                {{-- <b onclick="toggle()" class="pointer">
                                    Sign up here
                                </b> --}}
                                <a href="{{ route('login') }}">Sign in here</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <div class="row content-row">
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Registration
                    </h2>
                    <p>
                        Don't have a school account yet? Register to access the school's website.
                    </p>
                </div>
            </div>
            <div class="col align-items-center flex-col">

            </div>
        </div>
    </div>
</body>

@endsection
