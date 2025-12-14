<style>
    label.error {
        color: #dc2626; /* Tailwind red-600 */
        font-size: 0.875rem; /* text-sm */
        margin-top: 0.25rem; /* mt-1 */
        display: block;
    }
</style>



<!DOCTYPE html>
<html lang="en">


<x-head/>

<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">

    <section class="bg-blue-600 flex flex-wrap min-h-[100vh]">

        <!-- LEFT SIDE -->
        <div class="lg:w-1/2 w-full flex items-center justify-center flex-col py-10">
            <img src="{{ asset('assets/images/chit-logo.png') }}" 
                alt=""
                class="w-[260px] h-[200px] object-contain">

            <p class="mt-4 text-white font-bold text-2xl tracking-wide">
                ARAM ENTERPRISES
            </p>
        </div>

        <!-- RIGHT SIDE WITH CARD -->
        <div class="flex items-center justify-center p-6">
            <div class="bg-white rounded-2xl shadow-lg p-10 w-full md:max-w-sm lg:max-w-md">

                <h4 class="mb-3 text-xl font-semibold">Sign In to your Account</h4>
                <p class="mb-8 text-gray-500 text-lg">
                    Welcome back! Please enter your details
                </p>

                @if ($errors->has('errors'))
                    <p style="color: red; font-size: 14px; margin-bottom: 16px; font-weight: 500;">
                        {{ $errors->first('errors') }}
                    </p>
                @endif

                <form action="{{ route('login.check') }}" id="login_form" method="post">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-4">
                        <div class="icon-field relative">
                            <span class="absolute start-4 top-1/2 -translate-y-1/2 text-xl">
                                <iconify-icon icon="mage:email"></iconify-icon>
                            </span>

                            <input type="email"
                                class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 rounded-xl w-full"
                                placeholder="Email" name="username">
                        </div>
                        <div class="email-error mt-1"></div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-5">
                        <div class="icon-field relative flex items-center">

                            <span class="absolute start-4 top-1/2 -translate-y-1/2 text-xl">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>

                            <input type="password"
                                class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 rounded-xl w-full"
                                id="your-password" placeholder="Password" name="password">

                            <span class="toggle-password cursor-pointer absolute end-4 top-1/2 -translate-y-1/2 me-4 text-secondary-light"
                                data-toggle="#your-password"></span>
                        </div>

                        <div class="password-error mt-1"></div>
                    </div>

                    <button type="submit" class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl mt-8">
                        Sign In
                    </button>

                </form>

            </div>
        </div>

    </section>

    @php
        $script = '<script>
            // ================== Password Show Hide Js Start ==========
            function initializePasswordToggle(toggleSelector) {
                $(toggleSelector).on("click", function() {
                    $(this).toggleClass("ri-eye-off-line");
                    var input = $($(this).attr("data-toggle"));
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });
            }
            // Call the function
            initializePasswordToggle(".toggle-password");
            // ========================= Password Show Hide Js End ===========================
        </script>';
    @endphp
                    
    <x-script />
    
</body>

</html>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

        $("#login_form").validate({
            rules: {
                username: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                username: {
                    required: "Email is required",
                    email: "Please enter a valid email"
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 6 characters"
                }
            },

            errorClass: "error",

            errorPlacement: function(error, element) {

                if (element.attr("name") === "username") {
                    error.appendTo(".email-error");
                }

                else if (element.attr("name") === "password") {
                    error.appendTo(".password-error");
                }

                else {
                    error.insertAfter(element);
                }
            },

            highlight: function(element) {
                $(element).addClass("border-red-600");
            },

            unhighlight: function(element) {
                $(element).removeClass("border-red-600");
            }
        });

        // Password Show/Hide
        $(".toggle-password").on("click", function() {
            let input = $($(this).data("toggle"));
            input.attr("type", input.attr("type") === "password" ? "text" : "password");
            $(this).toggleClass("ri-eye-off-line");
        });

    });
</script>






