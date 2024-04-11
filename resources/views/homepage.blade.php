<x-layout>


    @auth()

            <div class="container py-md-5 container--narrow">
                <h2 class="text-center mb-4">The Latest From Those You Follow</h2>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
                        <strong>Example Post #1</strong>
                        <span class="text-muted small">by kittydoe on 1/3/2019</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" />
                        <strong>Example Post #2</strong>
                        <span class="text-muted small">by barksalot on 1/3/2019</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
                        <strong>Example Post #3</strong>
                        <span class="text-muted small">by kittydoe on 1/3/2019</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" />
                        <strong>Example Post #4</strong>
                        <span class="text-muted small">by barksalot on 1/3/2019</span>
                    </a>
                </div>
            </div>

    @else
            <div class="container py-md-5">
                <div class="row align-items-center">
                    <div class="col-lg-7 py-3 py-md-5">
                        <h1 class="display-3">Remember Animals?{{$name}}</h1>
                        <p class="lead text-muted">Are you sick of short tweets and impersonal &ldquo;shared&rdquo; posts
                            that are reminiscent of the late 90&rsquo;s email forwards? We believe getting back to actually
                            writing is the key to enjoying the internet again.</p>
                        <ul>
                            @foreach( $animals as $animal)
                                <li>{{$animal}}</li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
                        <form action="/register" method="POST" id="registration-form">
                            @csrf
                            <div class="form-group">
                                <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
                                <input name="username" id="username-register" class="form-control" type="text"
                                       placeholder="Pick a username" value="{{old('username')}}" autocomplete="off"/>
                                @error('username')
                                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                                <input name="email" id="email-register" class="form-control" type="text"
                                       placeholder="you@example.com" value="{{old('email')}} " autocomplete="off"/>
                                @error('email')
                                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                                @enderror </div>

                            <div class="form-group">
                                <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                                <input name="password" id="password-register" class="form-control" type="password"
                                       placeholder="Create a password"/>
                                @error('password')
                                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm
                                        Password</small></label>
                                <input name="password_confirmation" id="password-register-confirm" class="form-control"
                                       type="password" placeholder="Confirm password"/>
                                @error('password_confirmation')
                                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                                @enderror
                            </div>

                            <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for OurApp
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    @endauth
</x-layout>
