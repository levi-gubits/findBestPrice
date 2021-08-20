<?php include_once "PHP/moduls/user-module/checkIfUserConnect.php";
include_once "‏‏allPages.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>best price</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/head_and_foot_style.css?New2">
    <link rel="stylesheet" href="CSS/price-alert.css?new1">
    <link rel="stylesheet" href="CSS/login_card.css?new">
    <link rel="icon" href="images/title-icon.jpg" type="image/x-icon">
    <script src="JS/login_signup_card.js?new1" defer></script>

</head>

<body>
<header>
        <div class="title">
            <a href="?page=home-page"><h1>Best Price</h1></a>
            <div class="account_status">
            <?php
            //Checks if the user has sessionKey
            $checkDetails = new CheckDetails;
            $checkDetails->CheckIfUserConnect()
             ?></div>
            <button class="nav-bar">
                <img src="data:image/svg+xml;base64,PHN2ZyBpZD0ibGlnaHQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDI0IDI0IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxwYXRoIGQ9Im0xMiAyNGMtNi42MTcgMC0xMi01LjM4My0xMi0xMnM1LjM4My0xMiAxMi0xMiAxMiA1LjM4MyAxMiAxMi01LjM4MyAxMi0xMiAxMnptMC0yM2MtNi4wNjUgMC0xMSA0LjkzNS0xMSAxMXM0LjkzNSAxMSAxMSAxMSAxMS00LjkzNSAxMS0xMS00LjkzNS0xMS0xMS0xMXoiLz48L2c+PGc+PHBhdGggZD0ibTE2LjUgOGgtOWMtLjI3NiAwLS41LS4yMjQtLjUtLjVzLjIyNC0uNS41LS41aDljLjI3NiAwIC41LjIyNC41LjVzLS4yMjQuNS0uNS41eiIvPjwvZz48Zz48cGF0aCBkPSJtMTYuNSAxMi41aC05Yy0uMjc2IDAtLjUtLjIyNC0uNS0uNXMuMjI0LS41LjUtLjVoOWMuMjc2IDAgLjUuMjI0LjUuNXMtLjIyNC41LS41LjV6Ii8+PC9nPjxnPjxwYXRoIGQ9Im0xNi41IDE3aC05Yy0uMjc2IDAtLjUtLjIyNC0uNS0uNXMuMjI0LS41LjUtLjVoOWMuMjc2IDAgLjUuMjI0LjUuNXMtLjIyNC41LS41LjV6Ii8+PC9nPjwvc3ZnPg=="
                />
            </button>
        </div>
        <nav>
            <div class="menu">
                <ul>
                <li class="page active"><a href="?page=home-page">Home</a></li>
                    <li class="page"><a href="?page=products" class="category_link">Category</a>
                        <div class="submenu_1">
                            <ul><?php listOfCategory(); ?></ul>
                        </div>
                    </li>
                    <li class="page" style="display: flex"><span class="newUpdate"></span><?php $checkDetails->CheckIfAsNewUpdates() ?><a href="?page=priceUpdate">Price update</a></li>
                    <li class="page"><a href="?page=contant">Contact</a></li>
                    <li class="page"><a href="?page=helpCenter">Help Center</a></li>
                </ul>
            </div>
        <div id="id01" class="foundation">
            <div class="card">
                <span class="close_card" title="Close Modal">&times;</span>
                <div class="card_content">
                </div>
            </div>
        </div>
        </nav>
</header>
<script>
    const navBtn = document.querySelector('.nav-bar');
    const nav = document.querySelector('nav');

    navBtn.addEventListener('click', () => {
        nav.classList.toggle('display');
        if(nav.classList[0] == undefined){
            newUpdate.style.position = "relative";
        }else{newUpdate.style.position = "absolute";}
    })


    function activePage(i){
        const pageList = document.querySelectorAll('.page');
        pageList.forEach(page => {
            page.classList.remove('active');
        });
        pageList[i].classList.add('active');
    }
</script>
<main>
    <?php
    //Switching between components by path
    if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'home-page':
                homePage();?>
                <script>activePage(0)</script><?php
                break;
            
            case 'products':
                category();?>
                <script>activePage(1)</script><?php
                break;
    
            case 'itemPage':
                itemPage();?>
                <script>activePage(1)</script><?php
                break;
                
            case 'priceUpdate':
                priceUpdate();?>
                <script>activePage(2)</script><?php
                break;
    
            case 'contant':
                contant();?>
                <script>activePage(3)</script><?php
                break;   
    
            case 'helpCenter':
                helpCenter();?>
                <script>activePage(4)</script><?php
                break; 
    
            default:
                homePage();?>
                <script>activePage(0)</script><?php
                break;
        }
    }else{
        homePage();?>
        <script>activePage(0)</script><?php
    }?>
</main>
<footer>
        <div class="help_control" style="margin-top: 0;">
            <div class="help_control_info">
                <h2>Need Help? Check Out Our Help Center</h2>
                <p>I'm a paragraph. Click here to add your own text and edit me. <br>Let your users get to know you.</p><br>
                <div class="help_center_link">
                    <a href="?page=helpCenter">Go to Help Center</a>
                </div>
            </div>
            <img src="images/kai-song-zmfEk8QBykQ-unsplash.jpg" alt="">
        </div>
        <div class="links_and_information">
            <section>
                <div class="container">
                    <div class="links">
                        <h4>Category</h4>
                        <?php listOfLinks(); ?>
                    </div>
                    <div class="links">
                        <h4>Links</h4>
                        <a href="#">about</a>
                        <a href="#">privacy policy</a>
                        <a href="?page=helpCenter">Help Center</a>
                        <a href="#">setting</a>
                    </div>
                    <div class="links">
                        <h4>Contact</h4>
                        <a href="?page=contant">Contact</a>
                    </div>
                    <div class="links">
                        <h4>Follow us</h4>
                        <a href="#">faceboock</a>
                        <a href="#">twitter</a>
                        <div class="logo">
                            <a href="#"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjEuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgMTY3LjY1NyAxNjcuNjU3IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNjcuNjU3IDE2Ny42NTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiMwMTAwMDI7IiBkPSJNODMuODI5LDAuMzQ5QzM3LjUzMiwwLjM0OSwwLDM3Ljg4MSwwLDg0LjE3OGMwLDQxLjUyMywzMC4yMjIsNzUuOTExLDY5Ljg0OCw4Mi41N3YtNjUuMDgxSDQ5LjYyNg0KCQl2LTIzLjQyaDIwLjIyMlY2MC45NzhjMC0yMC4wMzcsMTIuMjM4LTMwLjk1NiwzMC4xMTUtMzAuOTU2YzguNTYyLDAsMTUuOTIsMC42MzgsMTguMDU2LDAuOTE5djIwLjk0NGwtMTIuMzk5LDAuMDA2DQoJCWMtOS43MiwwLTExLjU5NCw0LjYxOC0xMS41OTQsMTEuMzk3djE0Ljk0N2gyMy4xOTNsLTMuMDI1LDIzLjQySDk0LjAyNnY2NS42NTNjNDEuNDc2LTUuMDQ4LDczLjYzMS00MC4zMTIsNzMuNjMxLTgzLjE1NA0KCQlDMTY3LjY1NywzNy44ODEsMTMwLjEyNSwwLjM0OSw4My44MjksMC4zNDl6Ii8+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg=="
                                /></a>
                            <a href="#"><img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMnB0IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMnB0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0yNTYgMGMtMTQxLjM2MzI4MSAwLTI1NiAxMTQuNjM2NzE5LTI1NiAyNTZzMTE0LjYzNjcxOSAyNTYgMjU2IDI1NiAyNTYtMTE0LjYzNjcxOSAyNTYtMjU2LTExNC42MzY3MTktMjU2LTI1Ni0yNTZ6bTExNi44ODY3MTkgMTk5LjYwMTU2MmMuMTEzMjgxIDIuNTE5NTMyLjE2Nzk2OSA1LjA1MDc4Mi4xNjc5NjkgNy41OTM3NSAwIDc3LjY0NDUzMi01OS4xMDE1NjMgMTY3LjE3OTY4OC0xNjcuMTgzNTk0IDE2Ny4xODM1OTRoLjAwMzkwNi0uMDAzOTA2Yy0zMy4xODM1OTQgMC02NC4wNjI1LTkuNzI2NTYyLTkwLjA2NjQwNi0yNi4zOTQ1MzEgNC41OTc2NTYuNTQyOTY5IDkuMjc3MzQzLjgxMjUgMTQuMDE1NjI0LjgxMjUgMjcuNTMxMjUgMCA1Mi44NjcxODgtOS4zOTA2MjUgNzIuOTgwNDY5LTI1LjE1MjM0NC0yNS43MjI2NTYtLjQ3NjU2Mi00Ny40MTAxNTYtMTcuNDY0ODQzLTU0Ljg5NDUzMS00MC44MTI1IDMuNTgyMDMxLjY4NzUgNy4yNjU2MjUgMS4wNjI1IDExLjA0Mjk2OSAxLjA2MjUgNS4zNjMyODEgMCAxMC41NTg1OTMtLjcyMjY1NiAxNS40OTYwOTMtMi4wNzAzMTItMjYuODg2NzE4LTUuMzgyODEzLTQ3LjE0MDYyNC0yOS4xNDQ1MzEtNDcuMTQwNjI0LTU3LjU5NzY1NyAwLS4yNjU2MjQgMC0uNTAzOTA2LjAwNzgxMi0uNzUgNy45MTc5NjkgNC40MDIzNDQgMTYuOTcyNjU2IDcuMDUwNzgyIDI2LjYxMzI4MSA3LjM0NzY1Ny0xNS43NzczNDMtMTAuNTI3MzQ0LTI2LjE0ODQzNy0yOC41MjM0MzgtMjYuMTQ4NDM3LTQ4LjkxMDE1NyAwLTEwLjc2NTYyNCAyLjkxMDE1Ni0yMC44NTE1NjIgNy45NTcwMzEtMjkuNTM1MTU2IDI4Ljk3NjU2MyAzNS41NTQ2ODggNzIuMjgxMjUgNTguOTM3NSAxMjEuMTE3MTg3IDYxLjM5NDUzMi0xLjAwNzgxMi00LjMwNDY4OC0xLjUyNzM0My04Ljc4OTA2My0xLjUyNzM0My0xMy4zOTg0MzggMC0zMi40Mzc1IDI2LjMxNjQwNi01OC43NTM5MDYgNTguNzY1NjI1LTU4Ljc1MzkwNiAxNi45MDIzNDQgMCAzMi4xNjc5NjggNy4xNDQ1MzEgNDIuODkwNjI1IDE4LjU2NjQwNiAxMy4zODY3MTktMi42NDA2MjUgMjUuOTU3MDMxLTcuNTMxMjUgMzcuMzEyNS0xNC4yNjE3MTktNC4zOTQ1MzEgMTMuNzE0ODQ0LTEzLjcwNzAzMSAyNS4yMjI2NTctMjUuODM5ODQ0IDMyLjUgMTEuODg2NzE5LTEuNDIxODc1IDIzLjIxNDg0NC00LjU3NDIxOSAzMy43NDIxODctOS4yNTM5MDYtNy44NjMyODEgMTEuNzg1MTU2LTE3LjgzNTkzNyAyMi4xMzY3MTktMjkuMzA4NTkzIDMwLjQyOTY4N3ptMCAwIi8+PC9zdmc+"
                                /></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</footer>


</body>

</html>