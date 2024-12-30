<form action="validation.php" method="post">
    <label>Login:</label>
    <input type="text" name="login">
    <label>Password:</label>
    <input type="password" name="password">
    <button type="submit">Submit</button>

    <!-- if there is an error -->
     <br />
    <?php 
        if(isset($_GET['error'])){
            if($_GET['error'] === 1){
                echo "Error 1 : you must enter your password and username";
            } elseif ($_GET['error'] == 2) {
                echo "Erreur 2 : Erreur de login/mot de passe.";
            }
        }

        if (isset($_GET['error']) && $_GET['error'] == 3) {
            echo "Vous avez été déconnecté du service.";
        }
    ?>
</form>
