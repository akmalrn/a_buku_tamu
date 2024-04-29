<!-- resources/views/auth/login.blade.php -->
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('/gambar/login_user.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width:100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: black;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: gray;
        }
        .home{
            position: fixed;
            top: 2%;
            left: 1%;
            color: white;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .arrowleft{
        border: solid white;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 3px;
        transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
        } 
        #notif {
  position: fixed;
  left: 50%;
        transform: translateX(-50%);
  color: #fff;
  padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
  display: none; /* default: hide */
  text-align: center;
  background-color: white;
}
p{color: black; }
#overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
      display: none;
    }
        </style>
        <script>
       document.addEventListener('DOMContentLoaded', function () {
    var notification = document.getElementById('notif');
    var okButton = document.getElementById('okButton');
    var overlay = document.getElementById('overlay');

    // Show the overlay and the notification
    overlay.style.display = 'block';
    notification.style.display = 'block';

    // Hide the overlay and the notification when the OK button is clicked
    okButton.addEventListener('click', function () {
      overlay.style.display = 'none';
      notification.style.display = 'none';
    });
  });
        </script>
        <div id="overlay"></div>
     <div id="notif">
        <p>
  Silahkan Login Terlebih Dahulu
        </p>
 
  <button id="okButton" >OK</button>
</div>

        <div  class="home" >
        <a href="{{ route('welcome') }}"><i class="arrowleft"></i></a>
        </div>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

@if(session('error'))
    <div>{{ session('error') }}</div>
@endif
