@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="p-0 col-lg-4 col-md-8 col-10 box-shadow-2">
                            <div class="px-1 py-1 m-0 card border-grey border-lighten-3">
                                <div class="border-0 card-header">
                                    <div class="text-center card-title">
                                        <h3 class="mt-2 brand-text">POS FRUIT</h3>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="mx-2 my-1 text-center card-subtitle line-on-side text-muted font-small-3">
                                        <span>Silahkan Login terlebih dahulu !</span>
                                    </p>
                                    <div class="card-body">

                                        @if ($errors->has('username'))
                                            <p class="mb-2 text-sm text-danger">{{ $errors->first('username') }}</p>
                                        @endif
                                        {{-- Form Login --}}
                                        <form method="POST" action="{{ route('login') }}" class="form-horizontal">

                                            {{-- token here --}}
                                            @csrf

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="username" name="username"
                                                    placeholder="Your Username" value="{{ old('username') }}" required
                                                    autofocus autocomplete="off">
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                                {{-- @if ($errors->has('username'))
                                                    <p class="text-sm text-danger">{{ $errors->first('username') }}</p>
                                                @endif --}}
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                {{-- @if ($errors->has('password'))
                                                    <p class="text-sm text-danger">{{ $errors->first('password') }}</p>
                                                @endif --}}
                                            </fieldset>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i
                                                    class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
