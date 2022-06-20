<div>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
        aria-hidden="true" data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body login">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="login-box">
                        <div class="lb-header" wire:ignore>
                            <a href="#" class="active" wire:ignore id="login-box-link">Login</a>
                            <a href="#" id="signup-box-link" wire:ignore>Sign Up</a>
                        </div>
                        <div id="login-form" class="col-md-12">
                            <form wire:submit.prevent="login()" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" name="email" wire:model.defer="email" placeholder="Email"
                                        autocomplete="email" class="form-control" />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" wire:model.defer="password"
                                        placeholder="Password" autocomplete="password" class="form-control" />
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-bd-download main-btn">Log in</button>
                                </div>
                                <div class="form-group">
                                    <a href="#" class="forgot-password">Forgot password? {{ $course_id }}</a>
                                </div>
                            </form>
                        </div>
                        <div id="signup-form" style="display: none">
                            <form wire:submit.prevent="register()" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Full Name" wire:model.defer="name" name="name"
                                        autocomplete="name" class="form-control" />
                                </div>

                                <div class="form-group mb-3">
                                    <input type="email" placeholder="Email" wire:model.defer="email" name="email"
                                        autocomplete="email" class="form-control" />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" wire:model.defer="password"
                                        name="password" autocomplete="password" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-success main-btn">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .loginModal {
        background-color: rgb(7, 41, 77, 0.8);
        color: white;
        font-family: 'poppin'
    }

    .loginModal h5 {
        color: white;
        font-family: 'poppin'
    }

    .login {
        background-color: aliceblue;

    }


    .lb-header {
        position: relative;
        color: #00415d;
        margin: 5px 5px 10px 5px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
        text-align: center;
        height: 28px;
    }

    .lb-header a {
        margin: 0 25px;
        padding: 0 20px;
        text-decoration: none;
        color: #666;
        font-weight: bold;
        font-size: 15px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }

    .lb-header .active {
        color: #029f5b;
        font-size: 18px;
    }

    .social-login {
        position: relative;
        float: left;
        width: 100%;
        height: auto;
        padding: 10px 0 15px 0;
        border-bottom: 1px solid #eee;
    }

    .social-login a {
        position: relative;
        float: left;
        width: calc(40% - 8px);
        text-decoration: none;
        color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 12px;
        border-radius: 2px;
        font-size: 12px;
        text-transform: uppercase;
        margin: 0 3%;
        text-align: center;
    }

    .social-login a i {
        position: relative;
        float: left;
        width: 20px;
        top: 2px;
    }

    .social-login a:first-child {
        background-color: #49639F;
    }

    .social-login a:last-child {
        background-color: #DF4A32;
    }

    .email-login,
    .email-signup {
        position: relative;
        float: left;
        width: 100%;
        height: auto;
        margin-top: 20px;
        text-align: center;
    }
</style>

@push('script')
    <script>
        // $('.entrolledBtn').click(function(e) {
        //     @this.enrollNow(e.target.value)
        //     let elementName = $(this).attr('name');
        //     @this.set(elementName, e.target.value);
        // });

        // document.addEventListener('livewire:load', function(event) {
        //     window.livewire.hook('afterDomUpdate', () => {
        //         // @this.enrollNow()
        //     });
        // });



        $(".signup-form").hide();
        $("#signup-box-link").click(function() {
            $("#login-form").hide();
            $("#signup-form").show();
            $("#login-form").fadeOut(100);
            $("#signup-form").delay(100).fadeIn(100);
            $("#login-box-link").removeClass("active");
            $("#signup-box-link").addClass("active");
        });
        $("#login-box-link").click(function() {
            $("#login-form").show();
            $("#signup-form").hide();
            $("#signup-form").fadeOut(100);
            $("#login-form").delay(100).fadeIn(100);
            $("#login-box-link").addClass("active");
            $("#signup-box-link").removeClass("active");
        });
    </script>
@endpush
