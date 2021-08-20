<?php
require_once __DIR__ . "/../../data_base.php";
session_start();


class CheckDetails{

    public $session;
    public $userID;
    public $name;
    public $password;
    public $email;

    public function checkSession(){
        if(isset($_SESSION['session'])){
            $this->session = $_SESSION['session'];
            $this->getUserDetails();
            return true;
        }
        return false;
    }

    private function getUserDetails(){
        $getUserDetails = Database::query("SELECT * FROM `users` WHERE sessionKey = '$this->session'");
        $this->userID = $getUserDetails[0]['Id'];
        $this->name = $getUserDetails[0]['name'];
        $this->password = $getUserDetails[0]['password'];
        $this->email = $getUserDetails[0]['mail'];
    }

    private function connect(){

        ?>
        <script>

            const name = `<?php echo $this->name?>`;
            const currentPassword = `<?php echo $this->password?>`;
            const email = `<?php echo $this->email?>`;
            const session = `<?php echo $this->session?>`;

            document.querySelector('.account_status').innerHTML = `<p>hello: ${name}</p>
            <a href="PHP/moduls/user-module/endPoints/log_out.php" class="logOut_button">Log Out</a>
            <a href="#" class="update_button">Update details</a>`;
    
            const updateButton = document.querySelector('.update_button');
            updateButton.addEventListener('click', () => {
                foundation.classList.add('show');
                update_card(name,currentPassword,email,session);
            });

        </script>
    <?php
    }

    private function notConnect(){
        ?>
        <script>

            document.querySelector('.account_status').innerHTML = 
            `<a href="#" class="login_button">Log In</a>
            <a href="#" class="register_button">Register</a>`;
            const login_btn = document.querySelector('.login_button');
            const signup_btn = document.querySelector('.register_button');
    
    
            /*window.addEventListener('load', () => {
                const time = setTimeout(() => {
                    foundation.classList.add('show');
                    logIn_card();
                }, 5000)
                    
                login_btn.addEventListener('click', () => {if(time){clearTimeout(time);}})
                signup_btn.addEventListener('click', () => {if(time){clearTimeout(time);}})
            })*/
    
            login_btn.addEventListener('click', () => {
                foundation.classList.add('show');
                logIn_card();          
            })
    
    
            signup_btn.addEventListener('click', () => {
                foundation.classList.add('show');
                signUp_card();
            })

        </script>
        <?php
    }

    public function CheckIfUserConnect(){

        if($this->checkSession()){
            $this->connect();
            return;
        }

        $this->notConnect();
    
    }

    public function CheckIfAsNewUpdates(){
        ?><script>
            const newUpdate = document.querySelector('.newUpdate');
    
            <?php
            if($this->session != ""){    
                $newUpdates = Database::query("SELECT * FROM `sending` WHERE user_id = '$this->userID'");
                $newUpdatesCount = 0;
                foreach($newUpdates as $update) {
                    $newUpdatesCount += $update['newUpdates'];
                }?>
                if(`<?php echo $newUpdatesCount?>` != 0){
                    newUpdate.style.display = "block";
                    newUpdate.textContent = `<?php echo $newUpdatesCount?>`;
                }<?php
            }
            ?>
        </script><?php
    }
}


?>