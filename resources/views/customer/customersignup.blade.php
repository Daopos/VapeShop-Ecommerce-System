<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customersignup.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
</head>
<style>
    /* Add your modal styles here */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal {
        background: #fff;
        padding: 70px 50px;
        border-radius: 20px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center
    }

    .modal div {
        display: flex;
        gap: 20px;
        margin-top: 50px
    }

    .modal div button {
        padding: 5px 20px;
        border-radius: 2px;
        border: none;
        background-color: inherit;
    }

    .modal div button:nth-of-type(1) {
        background-color:  #9B9FC4;
    }

</style>
<body>
    <div class="login-container">
        <div class="text-login">
            <h1>Hideout</h1>
            <h1>Vape shop.</h1>
        </div>

        <img src="{{  asset('assets/image/loginphoto.png') }}" alt="20em" width="300px">


    </div>
    <div class="pic-container">
        <div class="forms">
            <form method="POST" action="">
                @csrf
                <h1>CREAT ACCOUNT</h1>
                <div class="input-container">
                    <div class="two-input">
                        <label for="fname">First name</label>
                        <input name="fname" type="text" placeholder="Enter your first name">
                    </div>
                    <div class="two-input">
                        <label for="lname">Last name</label>
                        <input name="lname" type="text" placeholder="Enter your last name">
                    </div>
                </div>
                <div class="input-container">
                     <div class="two-input">
                        <label for="phone">phone number</label>
                        <input name="phone" type="tel" placeholder="Enter your contact number">
                    </div>
                    <div class="two-input">
                        <label for="address">Address</label>
                        <input name="address" type="text" placeholder="Enter your address">
                    </div>
                </div>
                <div class="input-container">
                    <div class="two-input">
                        <label for="email">Email address</label>
                        <input name="email" type="email" placeholder="Enter your email">
                    </div>

                    <div class="two-input">
                        <label for="password">Password</label>
                        <input name="password" type="password" placeholder="Enter desired password">
                    </div>
                </div>
                <div class="two-input">
                    <label for="password">Confirm password</label>
                    <input name="confirm" type="password" placeholder="Enter confirm password">
                </div>
                <div class="center-btn">
                    <input type="submit" value="Sign up">
                </div>
            </form>
            <div class="or">
                <h5>or</h5>
            </div>
            <div>
                <h5>Already have an account? <span><a href="{{ route('customerlogin') }}">Login</a></span></h5>
            </div>
        </div>
    </div>


    <div class="overlay" id="ageVerification">
        <div class="modal">
            <h2>Age Verification</h2>
            <p>Are you 18 years or older?</p>
            <div>
                <button onclick="verifyAge()">Yes</button>
                <button onclick="redirectToLogin()">No</button>
            </div>
        </div>
    </div>
    <script>
        // Display the age verification modal
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("ageVerification").style.display = "flex";
        });

        // Function to verify age and hide the modal
        function verifyAge() {
            // Add your age verification logic here
            // For simplicity, let's assume the user is always 18 or older
            document.getElementById("ageVerification").style.display = "none";
        }

        // Function to redirect to login page if age verification fails
        function redirectToLogin() {
            // Redirect to customer login route
            window.location.href = "{{ route('customerlogin') }}";
        }
    </script>
</body>
</html>
