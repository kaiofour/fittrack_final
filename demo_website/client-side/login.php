<!DOCTYPE html>

<html>
    <head>
        <style>
        <?php  include("../src/login.css") ?>
        </style>
    </head>
    <body>
        <nav>
            <a><img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t1.15752-9/449641745_996984771737200_5695789707439500493_n.png?_nc_cat=105&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEnGxH0DaxguJ8DTP0wsrmqfTUDNMEc3qh9NQM0wRzeqLH0H0YEzw7s9ooMvzGPZSVBpSWNok6tiSRk4Vb_P1_X&_nc_ohc=d4jEmCnoNAsQ7kNvgH4QqS3&_nc_ht=scontent.fcgy2-4.fna&oh=03_Q7cD1QHUxQPycvHklCg5O5MTU3wkJ6nmbw8dHq65VMnD8wA-YQ&oe=66B0A8C9" alt="logo"></a>
        </nav>
        <div class="form-wrapper">
            <h2>Log In</h2>
            <form action="../backend/verify_user.php" method= "post">
                <div class="form-control">
                    <input type="text" name ="username" required>
                    <label>Username</label>
                </div>
                <div class="form-control">
                    <input type="password" name ="password" required>
                    <labeL>Password</labeL>
                </div>
                <button type="submit">Log In</button>

                <div class="form-help">
                    <div class="remember-me">
                        <br>
                    </div>
                </div>
            </form>
            <p>New to FitTrack? <a href="carl_user.php">Sign up now</a></p>
        </div>
    </body>

</html>
