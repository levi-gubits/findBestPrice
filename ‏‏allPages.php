<?php
require_once "PHP/data_base.php";
//List of component
function homePage(){
    ?>
    <link rel="stylesheet" href="CSS/home-page.css?New1">
    <script src="JS/homePage.js?new1" defer></script>
    <div class="first_container">
            <div class="title_info">
                <h1>Here you do not have<br>to compromise on price</h1>
                <p>Your favorite products at prices that are convenient for you</p>
            </div>
            <div class="search_product">
                <button class="search-btn login_button"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyLjAwNSA1MTIuMDA1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIuMDA1IDUxMi4wMDU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNNTA1Ljc0OSw0NzUuNTg3bC0xNDUuNi0xNDUuNmMyOC4yMDMtMzQuODM3LDQ1LjE4NC03OS4xMDQsNDUuMTg0LTEyNy4zMTdjMC0xMTEuNzQ0LTkwLjkyMy0yMDIuNjY3LTIwMi42NjctMjAyLjY2Nw0KCQkJUzAsOTAuOTI1LDAsMjAyLjY2OXM5MC45MjMsMjAyLjY2NywyMDIuNjY3LDIwMi42NjdjNDguMjEzLDAsOTIuNDgtMTYuOTgxLDEyNy4zMTctNDUuMTg0bDE0NS42LDE0NS42DQoJCQljNC4xNiw0LjE2LDkuNjIxLDYuMjUxLDE1LjA4Myw2LjI1MXMxMC45MjMtMi4wOTEsMTUuMDgzLTYuMjUxQzUxNC4wOTEsNDk3LjQxMSw1MTQuMDkxLDQ4My45MjgsNTA1Ljc0OSw0NzUuNTg3eg0KCQkJIE0yMDIuNjY3LDM2Mi42NjljLTg4LjIzNSwwLTE2MC03MS43NjUtMTYwLTE2MHM3MS43NjUtMTYwLDE2MC0xNjBzMTYwLDcxLjc2NSwxNjAsMTYwUzI5MC45MDEsMzYyLjY2OSwyMDIuNjY3LDM2Mi42Njl6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" /></button>
                <input type="text" name="search" id="search" placeholder="What are you looking for?">
                <div class="searching-results"><ul></ul></div>
            </div>
    </div>
    <article>
            <div class="title_container">
                <div class="article_main_title">
                    <h3>About Best Price</h3>
                    <p>Tired of paying a fortune every time you buy a new product?
                        <br>best price this is the place for you, Here you buy at the price you want!
                        <br>And all this in three simple steps.</p>
                </div>
                <img src="images/docusign-xo3fdXgTJP8-unsplash.jpg" alt="image">
            </div>
            <div class="instruction">
                <div class="container">
                    <div class="explanation">
                        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0zMTAsMTkwYy01LjUyLDAtMTAsNC40OC0xMCwxMHM0LjQ4LDEwLDEwLDEwYzUuNTIsMCwxMC00LjQ4LDEwLTEwUzMxNS41MiwxOTAsMzEwLDE5MHoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTUwMC4yODEsNDQzLjcxOWwtMTMzLjQ4LTEzMy40OEMzODguNTQ2LDI3Ny40ODUsNDAwLDIzOS41NTUsNDAwLDIwMEM0MDAsODkuNzIsMzEwLjI4LDAsMjAwLDBTMCw4OS43MiwwLDIwMA0KCQkJczg5LjcyLDIwMCwyMDAsMjAwYzM5LjU1NiwwLDc3LjQ4Ni0xMS40NTUsMTEwLjIzOS0zMy4xOThsMzYuODk1LDM2Ljg5NWMwLjAwNSwwLjAwNSwwLjAxLDAuMDEsMC4wMTYsMC4wMTZsOTYuNTY4LDk2LjU2OA0KCQkJQzQ1MS4yNzYsNTA3LjgzOCw0NjEuMzE5LDUxMiw0NzIsNTEyYzEwLjY4MSwwLDIwLjcyNC00LjE2MiwyOC4yNzgtMTEuNzE2QzUwNy44MzcsNDkyLjczMSw1MTIsNDgyLjY4Nyw1MTIsNDcyDQoJCQlTNTA3LjgzNyw0NTEuMjY5LDUwMC4yODEsNDQzLjcxOXogTTMwNS41MzYsMzQ1LjcyN2MwLDAuMDAxLTAuMDAxLDAuMDAxLTAuMDAyLDAuMDAyQzI3NC42NjcsMzY4LjE0OSwyMzguMTc1LDM4MCwyMDAsMzgwDQoJCQljLTk5LjI1MiwwLTE4MC04MC43NDgtMTgwLTE4MFMxMDAuNzQ4LDIwLDIwMCwyMHMxODAsODAuNzQ4LDE4MCwxODBjMCwzOC4xNzUtMTEuODUxLDc0LjY2Ny0zNC4yNzIsMTA1LjUzNQ0KCQkJQzMzNC41MTEsMzIwLjk4OCwzMjAuOTg5LDMzNC41MTEsMzA1LjUzNiwzNDUuNzI3eiBNMzI2LjUxNiwzNTQuNzkzYzEwLjM1LTguNDY3LDE5LjgxMS0xNy45MjgsMjguMjc3LTI4LjI3N2wyOC4zNzEsMjguMzcxDQoJCQljLTguNjI4LDEwLjE4My0xOC4wOTQsMTkuNjUtMjguMjc3LDI4LjI3N0wzMjYuNTE2LDM1NC43OTN6IE00ODYuMTM5LDQ4Ni4xMzljLTMuNzgsMy43OC04LjgwMSw1Ljg2MS0xNC4xMzksNS44NjENCgkJCXMtMTAuMzU5LTIuMDgxLTE0LjEzOS01Ljg2MWwtODguNzk1LTg4Ljc5NWMxMC4xMjctOC42OTEsMTkuNTg3LTE4LjE1LDI4LjI3Ny0yOC4yNzdsODguNzk4LDg4Ljc5OA0KCQkJQzQ4OS45MTksNDYxLjYzOSw0OTIsNDY2LjY1OCw0OTIsNDcyQzQ5Miw0NzcuMzQyLDQ4OS45MTksNDgyLjM2MSw0ODYuMTM5LDQ4Ni4xMzl6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yMDAsNDBjLTg4LjIyNSwwLTE2MCw3MS43NzUtMTYwLDE2MHM3MS43NzUsMTYwLDE2MCwxNjBzMTYwLTcxLjc3NSwxNjAtMTYwUzI4OC4yMjUsNDAsMjAwLDQweiBNMjAwLDM0MA0KCQkJYy03Ny4xOTYsMC0xNDAtNjIuODA0LTE0MC0xNDBTMTIyLjgwNCw2MCwyMDAsNjBzMTQwLDYyLjgwNCwxNDAsMTQwUzI3Ny4xOTYsMzQwLDIwMCwzNDB6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0zMTIuMDY1LDE1Ny4wNzNjLTguNjExLTIyLjQxMi0yMy42MDQtNDEuNTc0LTQzLjM2LTU1LjQxM0MyNDguNDc5LDg3LjQ5LDIyNC43MjEsODAsMjAwLDgwYy01LjUyMiwwLTEwLDQuNDc4LTEwLDEwDQoJCQljMCw1LjUyMiw0LjQ3OCwxMCwxMCwxMGM0MS4wOTksMCw3OC42MzEsMjUuODE4LDkzLjM5Niw2NC4yNDdjMS41MjgsMy45NzYsNS4zMTcsNi40MTYsOS4zMzcsNi40MTYNCgkJCWMxLjE5MiwwLDIuNDA1LTAuMjE1LDMuNTg0LTAuNjY4QzMxMS40NzIsMTY4LjAxNCwzMTQuMDQ2LDE2Mi4yMjksMzEyLjA2NSwxNTcuMDczeiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K"
                        />
                        <p>Enter the product name in the search bar</p>
                    </div>
                </div>
                <div class="container">
                    <div class="explanation">
                        <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGc+PHBhdGggZD0ibTQ4OC41MDUgNzguMzcxLTg5LjEwMi0zNy4xMjFjLTkuNzc0LTQuMDcxLTIwLjk4NC00LjA3LTMwLjc1Ny4wMDFsLTQyLjc4IDE3LjgxOWMtMy44MjQgMS41OTQtNS42MzMgNS45ODQtNC4wNCA5LjgwOHM1Ljk4MyA1LjYzNCA5LjgwOCA0LjA0bDQyLjc4LTE3LjgyYzYuMTA1LTIuNTQ0IDEzLjExMi0yLjU0NSAxOS4yMjItLjAwMWw4OS4wOTcgMzcuMTE5YzguNjY2IDMuNjE1IDE0LjI2NyAxMS43NDQgMTQuMjY3IDIwLjcwN3YzMjAuNzVjMCAxMi40NzMtMTAuNzEzIDIyLjYyLTIzLjg4IDIyLjYyaC0xMi4xNmMtNC4xNDMgMC03LjUgMy4zNTctNy41IDcuNXMzLjM1NyA3LjUgNy41IDcuNWgxMi4xNmMyMS40MzggMCAzOC44OC0xNi44NzYgMzguODgtMzcuNjJ2LTMyMC43NWMwLTE1LjAzNi05LjIyMi0yOC41OTgtMjMuNDk1LTM0LjU1MnoiLz48cGF0aCBkPSJtNDI4LjI3IDQ1Ni4yOTRoLTEyNi4wMmM1LjE4OS01Ljg5OCA4LjAzLTEzLjM4MSA4LjAzLTIxLjMgMC03LjkwMy0yLjg2MS0xNS4xNDYtNy41OTUtMjAuNzYyIDIuOTg1LTEuNTIzIDUuNzQ5LTMuNTE2IDguMTg5LTUuOTU1IDYuMDkyLTYuMDkzIDkuNDQ2LTE0LjE5NCA5LjQ0Ni0yMi44MTMgMC04LjIxNi0zLjA5Mi0xNS43Mi04LjE2Ny0yMS40MjIgMi41MTMtMS40MjMgNC44NTMtMy4xODcgNi45NDktNS4yODUgNi4wOTItNi4wOTEgOS40NDctMTQuMTkyIDkuNDQ3LTIyLjgxMyAwLTguMTkyLTMuMDczLTE1LjY3Ny04LjExOS0yMS4zNzQgMi41NTUtMS40MzQgNC45MzUtMy4yMiA3LjA2OS01LjM0OSA2LjA4OC02LjEwMiA5LjQ0LTE0LjIwMSA5LjQ0LTIyLjgwOCAwLTE3Ljc5NC0xNC40NzItMzIuMjctMzIuMjYxLTMyLjI3aC0zMy42M3YtMTQxLjIyYzAtOC45NjQgNS42MDEtMTcuMDkzIDE0LjI2My0yMC43MDZsMTMuNjQxLTUuNjhjMy44MjQtMS41OTIgNS42MzMtNS45ODIgNC4wNDEtOS44MDctMS41OTMtMy44MjQtNS45ODMtNS42MzYtOS44MDctNC4wNDFsLTEzLjY0NiA1LjY4MmMtMTQuMjcxIDUuOTUzLTIzLjQ5MiAxOS41MTYtMjMuNDkyIDM0LjU1MnYxNDEuMjIxaC0zMS4zMzdjMTAuNDM1LTMyLjk3NiA5LjU0Ny02Ny4zOTEtMi42MzEtMTA3LjMzNC0xLjg1LTYuMDQ5LTUuNTMtMTEuMjMtMTAuNjQ1LTE0Ljk4My01LjA4NS0zLjczLTExLjExMS01LjcwMy0xNy40MjgtNS43MDMtOC4xMzggMC0xNS43MDUgMy4yNS0yMS4zMDkgOS4xNTEtNS42MDEgNS45LTguNDUzIDEzLjYyNC04LjAzMSAyMS43NDggMi4zNDUgNDUuMDk3LTE4LjQ1NyA2MC42MTktNDcuMjQ4IDgyLjEwNC05LjQ3OSA3LjA3My0xOS44MzkgMTQuODA5LTMwLjAyMSAyNC4yOTZ2LTkuODNjMC00LjE0My0zLjM1Ny03LjUtNy41LTcuNWgtNzIuMzk4Yy00LjE0MyAwLTcuNSAzLjM1Ny03LjUgNy41djIxMi43MWMwIDQuMTQzIDMuMzU3IDcuNSA3LjUgNy41aDcyLjRjNC4xNDMgMCA3LjUtMy4zNTcgNy41LTcuNXYtMTguODY4YzE0LjI0NSAxLjM1NSAyNC42NDkgNC4xOTQgMzQuNzU3IDExLjk0MSA2LjYzNiA1LjA4NiAxNC44MTYgNy44ODcgMjMuMDMzIDcuODg3aDEzMi4yNzFjNS40MDQgMi42MzQgMTEuMzk1IDQuMDMgMTcuNDY4IDQuMDNoMTMzLjM0YzQuMTQzIDAgNy41LTMuMzU3IDcuNS03LjVzLTMuMzU3LTcuNDk5LTcuNDk5LTcuNDk5em0tMjk2Ljk4OC04LjgyNGMtMTQuMTQyLTEwLjgzNy0yOS4yNTYtMTMuODQ4LTQzLjg4Mi0xNS4xMTF2LTg3LjU3NWMwLTQuMTQzLTMuMzU3LTcuNS03LjUtNy41cy03LjUgMy4zNTctNy41IDcuNXYxMTQuMDJoLTU3LjR2LTE5Ny43MWg1Ny40djUxLjAxMWMwIDQuMTQzIDMuMzU3IDcuNSA3LjUgNy41czcuNS0zLjM1NyA3LjUtNy41di0yNy4zNzVjMTIuNTQ2LTEzLjg0NSAyNS45OC0yMy44NyAzOC45OTItMzMuNTggMjguODA5LTIxLjQ5NyA1Ni4wMTktNDEuODAzIDUzLjI1OC05NC45MDUtLjIwNy0zLjk3NSAxLjE4OC03Ljc1NCAzLjkzLTEwLjY0MSAyLjc0Mi0yLjg4OSA2LjQ0Ni00LjQ3OSAxMC40My00LjQ3OSAzLjEwMyAwIDYuMDYuOTY3IDguNTUzIDIuNzk3IDIuNDg5IDEuODI2IDQuMjc4IDQuMzQyIDUuMTc0IDcuMjcxIDEyLjQwMyA0MC42ODUgMTIuMjA5IDc0LjkxNS0uNjExIDEwNy43MjQtLjkwMiAyLjMwOC0uNjA1IDQuOTEyLjc5MiA2Ljk1OXMzLjcxNSAzLjI3MSA2LjE5MyAzLjI3MWg5MC41NjljOS41MTggMCAxNy4yNjEgNy43NDcgMTcuMjYxIDE3LjI3IDAgNC42MDUtMS43OTcgOC45NDItNS4wNDggMTIuMjAxLTMuMjcgMy4yNjItNy42MDYgNS4wNTktMTIuMjEzIDUuMDU5aC0zMC44MWMtNC4xNDMgMC03LjUgMy4zNTctNy41IDcuNXMzLjM1NyA3LjUgNy41IDcuNWgyMi40MmM5LjUxNyAwIDE3LjI2IDcuNzQ3IDE3LjI2IDE3LjI3MSAwIDQuNjEzLTEuNzk0IDguOTQ4LTUuMDU0IDEyLjIwNy0zLjI1OCAzLjI1OS03LjU5MyA1LjA1My0xMi4yMDYgNS4wNTNoLTIyLjQyYy00LjE0MyAwLTcuNSAzLjM1Ny03LjUgNy41czMuMzU3IDcuNSA3LjUgNy41aDE0LjE4OWM5LjUxOCAwIDE3LjI2MSA3Ljc0MyAxNy4yNjEgMTcuMjYgMCA0LjYxMi0xLjc5NSA4Ljk0OC01LjA1MyAxMi4yMDctMy4yNjYgMy4yNjYtNy42MDIgNS4wNjMtMTIuMjA4IDUuMDYzaC0xMC4wNC0xMi4zOGMtNC4xNDMgMC03LjUgMy4zNTctNy41IDcuNXMzLjM1NyA3LjUgNy41IDcuNWgxMi4zOGM5LjUxOCAwIDE3LjI2MSA3Ljc0MyAxNy4yNjEgMTcuMjYgMCA0LjYxMi0xLjc5NyA4Ljk1Mi01LjA0NyAxMi4yMS0zLjA0NiAzLjAzOS03Ljg1OCA0Ljk3OC0xMS40NTkgNS4wNDItLjI0OS4wMDQtMTMzLjU4NC4wMTgtMTMzLjU4NC4wMTgtNC45MzYtLjAwNS05Ljg3Ni0xLjcwNy0xMy45MDgtNC43OTh6Ii8+PHBhdGggZD0ibTQxMS4wOTIgMTE2LjI1NWMwLTE1Ljc2LTEyLjgyMi0yOC41ODItMjguNTgyLTI4LjU4MnMtMjguNTgyIDEyLjgyMi0yOC41ODIgMjguNTgyIDEyLjgyMiAyOC41ODIgMjguNTgyIDI4LjU4MiAyOC41ODItMTIuODIyIDI4LjU4Mi0yOC41ODJ6bS00Mi4xNjQgMGMwLTcuNDg5IDYuMDkzLTEzLjU4MiAxMy41ODItMTMuNTgyczEzLjU4MiA2LjA5MyAxMy41ODIgMTMuNTgyLTYuMDkzIDEzLjU4Mi0xMy41ODIgMTMuNTgyLTEzLjU4Mi02LjA5Mi0xMy41ODItMTMuNTgyeiIvPjxwYXRoIGQ9Im0zODcuMTk2IDM3Mi4xNjVoLTEzLjQ1MWMtNy4wODUgMC0xMi44NDktNS43NjUtMTIuODQ5LTEyLjg1IDAtNC4xNDMtMy4zNTctNy41LTcuNS03LjVzLTcuNSAzLjM1Ny03LjUgNy41YzAgMTUuMDk3IDEyLjA3NiAyNy40MTcgMjcuMDc0IDI3LjgzdjE2LjU5OGMwIDQuMTQzIDMuMzU3IDcuNSA3LjUgNy41czcuNS0zLjM1NyA3LjUtNy41di0xNi41OThjMTQuOTk5LS40MTMgMjcuMDc1LTEyLjczMyAyNy4wNzUtMjcuODN2LTEwLjM4M2MwLTkuNjMzLTYuMTU1LTE4LjEwNC0xNS4zMTctMjEuMDgybC0zMy44OC0xMS4wMDVjLTIuOTYyLS45NjMtNC45NTItMy43MDEtNC45NTItNi44MTV2LTE0Ljg2N2MwLTUuNzU0IDQuNjgxLTEwLjQzNiAxMC40MzUtMTAuNDM2aDE4LjI4YzUuNzU0IDAgMTAuNDM1IDQuNjgyIDEwLjQzNSAxMC40MzYgMCA0LjE0MyAzLjM1NyA3LjUgNy41IDcuNXM3LjUtMy4zNTcgNy41LTcuNWMwLTE0LjAyNS0xMS40MS0yNS40MzYtMjUuNDM1LTI1LjQzNmgtMS42NDF2LTE2LjU3OGMwLTQuMTQzLTMuMzU3LTcuNS03LjUtNy41cy03LjUgMy4zNTctNy41IDcuNXYxNi41NzhoLTEuNjRjLTE0LjAyNCAwLTI1LjQzNSAxMS40MS0yNS40MzUgMjUuNDM2djE0Ljg2N2MwIDkuNjMzIDYuMTU1IDE4LjEwNCAxNS4zMTcgMjEuMDgxbDMzLjg3OSAxMS4wMDVjMi45NjMuOTYzIDQuOTUzIDMuNzAyIDQuOTUzIDYuODE2djEwLjM4M2MuMDAyIDcuMDg1LTUuNzYzIDEyLjg1LTEyLjg0OCAxMi44NXoiLz48L2c+PC9zdmc+"
                        />
                        <p>Write down the price you want to pay for the product</p>
                    </div>
                </div>
                <div class="container">
                    <div class="explanation">
                        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yMjcuMTMzLDBjLTUuNTIzLDAtMTAsNC40NzctMTAsMTB2NjEuNjY3YzAsNS41MjIsNC40NzcsMTAsMTAsMTBzMTAtNC40NzcsMTAtMTBWMTBDMjM3LjEzMyw0LjQ3NywyMzIuNjU2LDAsMjI3LjEzMywweg0KCQkJIi8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0zNTguMzcyLDEzMS4yNjZoLTYxLjY2N2MtNS41MjMsMC0xMCw0LjQ3Ny0xMCwxMHM0LjQ3NywxMCwxMCwxMGg2MS42NjdjNS41MjMsMCwxMC00LjQ3NywxMC0xMA0KCQkJUzM2My44OTUsMTMxLjI2NiwzNTguMzcyLDEzMS4yNjZ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0xNTcuNTMzLDEzMS4yMzlIOTUuODY3Yy01LjUyMywwLTEwLDQuNDc3LTEwLDEwYzAsNS41MjMsNC40NzcsMTAsMTAsMTBoNjEuNjY3YzUuNTIyLDAsOS45OTktNC40NzcsOS45OTktMTANCgkJCUMxNjcuNTMzLDEzNS43MTYsMTYzLjA1NiwxMzEuMjM5LDE1Ny41MzMsMTMxLjIzOXoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTE3Ny42NjIsNzcuNjMzbC0yOS4xMTUtMjkuMTE1Yy0zLjkwNS0zLjkwNS0xMC4yMzctMy45MDUtMTQuMTQzLDBjLTMuOTA1LDMuOTA1LTMuOTA1LDEwLjIzNywwLDE0LjE0M2wyOS4xMTYsMjkuMTE1DQoJCQljMS45NTMsMS45NTMsNC41MTIsMi45MjksNy4wNzEsMi45MjlzNS4xMTktMC45NzYsNy4wNzEtMi45MjlDMTgxLjU2Nyw4Ny44NzEsMTgxLjU2Nyw4MS41MzksMTc3LjY2Miw3Ny42MzN6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0zMTkuODUzLDQ4LjUzN2MtMy45MDUtMy45MDUtMTAuMjM3LTMuOTA1LTE0LjE0MywwbC0yOS4xMTUsMjkuMTE1Yy0zLjkwNSwzLjkwNS0zLjkwNSwxMC4yMzcsMCwxNC4xNDMNCgkJCWMxLjk1MywxLjk1Myw0LjUxMywyLjkyOSw3LjA3MiwyLjkyOWMyLjU1OSwwLDUuMTE5LTAuOTc2LDcuMDcxLTIuOTI5bDI5LjExNS0yOS4xMTUNCgkJCUMzMjMuNzU4LDU4Ljc3NSwzMjMuNzU4LDUyLjQ0MywzMTkuODUzLDQ4LjUzN3oiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTM4OS4xMzMsMjI3LjcwNmMtNi43NTEsMC0xMy4wNzksMS44MjYtMTguNTM0LDQuOTk3Yy00LjU0Ni0xNS4yODgtMTguNzIxLTI2LjQ3My0zNS40NjYtMjYuNDczDQoJCQljLTEwLjY0MywwLTIwLjI0Myw0LjUyMy0yNywxMS43NGMtNi43NTYtNy4yMTctMTYuMzU4LTExLjc0LTI3LTExLjc0Yy02LjEyNywwLTExLjkwNSwxLjUwNi0xNyw0LjE1M3YtNjkuMTMxDQoJCQljMC0yMC40MDItMTYuNTk4LTM3LTM3LTM3Yy0yMC40MDIsMC0zNywxNi41OTgtMzcsMzd2NTIuNzI3YzAsNS41MjMsNC40NzcsMTAsMTAsMTBzMTAtNC40NzcsMTAtMTB2LTUyLjcyNw0KCQkJYzAtOS4zNzQsNy42MjYtMTcsMTctMTdjOS4zNzQsMCwxNyw3LjYyNiwxNywxN1YzMDguNjZjMCw1LjUyMyw0LjQ3NywxMCwxMCwxMHMxMC00LjQ3NywxMC0xMHYtNjUuNDNjMC05LjM3NCw3LjYyNi0xNywxNy0xNw0KCQkJYzkuMzc0LDAsMTcsNy42MjYsMTcsMTd2OS42NTF2NTUuNzc5YzAsNS41MjMsNC40NzcsMTAsMTAsMTBzMTAtNC40NzcsMTAtMTB2LTU1Ljc3OXYtOS42NTFjMC05LjM3NCw3LjYyNi0xNywxNy0xNw0KCQkJYzkuMzc0LDAsMTcsNy42MjYsMTcsMTd2MjEuNDc1VjI4MnYyNi42NjFjMCw1LjUyMyw0LjQ3NywxMCwxMCwxMHMxMC00LjQ3NywxMC0xMFYyODJ2LTE3LjI5NWMwLTkuMzc0LDcuNjI2LTE3LDE3LTE3DQoJCQljOS4zNzQsMCwxNyw3LjYyNiwxNywxN3YxMDQuNTc0YzAsNy40NDktMC42NzEsMTQuOTA3LTEuOTk2LDIyLjE2N2MtMC45OTEsNS40MzQsMi42MSwxMC42NDEsOC4wNDMsMTEuNjMyDQoJCQljMC42MDcsMC4xMSwxLjIxLDAuMTY0LDEuODA2LDAuMTY0YzQuNzM4LDAsOC45NDYtMy4zODEsOS44MjctOC4yMDhjMS41MzktOC40NDEsMi4zMi0xNy4xMDYsMi4zMi0yNS43NTZWMjY0LjcwNQ0KCQkJQzQyNi4xMzMsMjQ0LjMwNCw0MDkuNTM1LDIyNy43MDYsMzg5LjEzMywyMjcuNzA2eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNMzgxLjI0LDQ1OS41MjNjLTMuNzY3LTQuMDM4LTEwLjA5Ni00LjI1Ny0xNC4xMzMtMC40OUMzNDQuMzE5LDQ4MC4yOTIsMzE0LjU5NSw0OTIsMjgzLjQxMSw0OTINCgkJCWMtNDYuNzg1LDAtOTAuMTYyLTI3LjIyMi0xMTAuNTA4LTY5LjM1MkwxMjYuODQsMzI3LjI3Yy00LjE1NS04LjYwMi0wLjkyOC0xOS4wODIsNy4zNDUtMjMuODU5DQoJCQljOC41NTQtNC45MzcsMTkuNjkxLTIuMDk0LDI0LjgzMSw2LjMzOGwzMi41NzksNTMuNDU1YzIuMzMzLDMuODI3LDYuOTI3LDUuNjM1LDExLjI0Miw0LjQyNHM3LjI5Ny01LjE0Niw3LjI5Ny05LjYyOHYtOTgNCgkJCWMwLTUuNTIzLTQuNDc3LTEwLTEwLTEwYy01LjUyMywwLTEwLDQuNDc3LTEwLDEwdjYyLjM3N2wtMTQuMDQtMjMuMDM2Yy0xMC45MjYtMTcuOTI4LTMzLjcyOC0yMy43NDgtNTEuOTA5LTEzLjI1DQoJCQljLTE3LjI5NSw5Ljk4NS0yNC4wNCwzMS44OTQtMTUuMzU0LDQ5Ljg3N2w0Ni4wNjMsOTUuMzc4YzExLjY4NiwyNC4xOTcsMjkuODkzLDQ0LjUzNyw1Mi42NTMsNTguODINCgkJCUMyMzAuMzA3LDUwNC40NSwyNTYuNTQxLDUxMiwyODMuNDEyLDUxMmMzNi4yNjYsMCw3MC44MzQtMTMuNjE3LDk3LjMzOC0zOC4zNDNDMzg0Ljc4OCw0NjkuODg5LDM4NS4wMDgsNDYzLjU2MiwzODEuMjQsNDU5LjUyM3oiDQoJCQkvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNNDA3LjExMiw0MjUuNmMtMS44Ni0xLjg2LTQuNDQtMi45My03LjA3LTIuOTNzLTUuMjEsMS4wNy03LjA3LDIuOTNjLTEuODYsMS44Ni0yLjkzLDQuNDQtMi45Myw3LjA3DQoJCQljMCwyLjY0LDEuMDcsNS4yMSwyLjkzLDcuMDdjMS44NiwxLjg2LDQuNDQsMi45Myw3LjA3LDIuOTNzNS4yMS0xLjA3LDcuMDctMi45M2MxLjg2LTEuODYsMi45My00LjQzLDIuOTMtNy4wNw0KCQkJQzQxMC4wNDIsNDMwLjA0LDQwOC45NzIsNDI3LjQ2LDQwNy4xMTIsNDI1LjZ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yMDcuMjAyLDIyMC45M2MtMS44Ni0xLjg2LTQuNDQtMi45My03LjA3LTIuOTNzLTUuMjEsMS4wNy03LjA3LDIuOTNzLTIuOTMsNC40NC0yLjkzLDcuMDdzMS4wNyw1LjIxLDIuOTMsNy4wNw0KCQkJczQuNDQsMi45Myw3LjA3LDIuOTNzNS4yMS0xLjA3LDcuMDctMi45M3MyLjkzLTQuNDQsMi45My03LjA3UzIwOS4wNjIsMjIyLjc5LDIwNy4yMDIsMjIwLjkzeiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K"
                        />
                        <p>Click search product<br> and wait for the system search results</p>
                    </div>
                </div>
            </div>
    </article>
    <?php
}

function category(){
    ?>
    <link rel="stylesheet" href="CSS/products.css">
    <link rel="stylesheet" href="CSS/product_page_style.css">
    <script src="JS/filter.js" defer></script>
    <script src="JS/productsList.js?new1" defer></script>

        <?php include_once "PHP/classes/productsClass.php";
        include_once "PHP/classes/filterClass.php";
        $products = new Products;
        $filter = new Filter ?>
        <div class="category-title">
            <h1><?php $products->checkCategory(); ?></h1>
        </div>
        <div class="filter_and_list">
            <button class="show_filter">Filter <i class="fa fa-angle-down" style="font-size: 1.3em; float: right; padding-right: 15px;"></i></button>
            <aside>
                <div class="filter">
                    <div class="filter_title">
                        <h3>Filter by</h3>
                    </div>
                    <form action="http://findbestprice.net/" method="get">
                        <ul class="filter_list"><?php $filter->checkStatus() ?>
                        <input class="btn" type="submit" value="Filter results"></ul>
                    </form>
                </div>
            </aside>
            <div class="list_of_items">
                <div class="products">
                    <div class="main-container">
                        <div class="product-items" id="products">
                            <?php $products->getProducts(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="id01" class="modal">
            <div class="center">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <div class="favorite">
                    <h2>BEST PRICE:
                        <span>1875.00₪</span></h2>
                        <img src="images/logo/ebay-logo.png" width="80" alt="logo">
                </div>
                <div class="cart">
                    <a href="?page=itemPage&proid=1">CLICK FOR MORE RESULTS</a>
                </div>
            </div>
        </div>
        <script>
        const title = document.querySelector('.category-title h1');
        title.style.textTransform = "uppercase";
        </script>
    <?php
}

function itemPage(){
    ?>
    <link rel="stylesheet" href="CSS/circleBar.css">
    <link rel="stylesheet" href="CSS/item-page.css?new">
    <?php
        include_once "PHP/classes/itemPageClass.php";
        $checkDetails = new CheckDetails;
        $itemPageClass = new ItemPage;
        $itemPageClass->getProductDetails();
        $itemPageClass->getUserDetails();
    ?>
    <div class="no-gutters">
        <div class="content-watch">
            <img src="<?php echo $itemPageClass->image?>" class="img-fluid" id="preview" alt="">
        </div>
        <div class="parameter">
            <h1 class="display-2" style="text-transform: uppercase;"><?php echo $itemPageClass->proName?></h1>
            <hr>
            <div class="details">
                <h5><span>description: </span><?php echo $itemPageClass->description()?></h5>
            </div>
            <hr>
            <div class="best_price">
                <div class="cart" style="width:auto"><button class="search-now btn">Search for the best price</button></div>
            <div class="accordion list_of_price" style="display:none">
            </div>
            </div>

            <hr>
            <div class="favorite" style="flex-direction: column;">
                <h2>OR:
                <span>Write us the price you are interested in buying,<br>the system will alert you when the system finds a match</span></h2>
                <div class="button-and-input">
                    <button class="search-my-price btn">search for this price</button>
                    <input type="text" placeholder="my price..." class="my_price">
                </div>
            </div>
            <div id="id01" class="modal">
                <div class="center">
                <span class="close" title="Close Modal">&times;</span>
                    <h2><br></h2>
                    <button class="btn cencel">CENCEL</button>
            </div>
        </div>
    </div>
    <script>
        const userID = `<?php echo $itemPageClass->userID ?>`;
        const proID = `<?php echo $itemPageClass->proID ?>`;
        const proName = `<?php echo $itemPageClass->proName?>`;
    </script>
    <script src="JS/item-page.js?New3" defer></script>
    <?php
}

function priceUpdate(){
    ?>
    <link rel="stylesheet" href="CSS/product_page_style.css">
    <link rel="stylesheet" href="CSS/price-update.css">
    <script src="JS/price-update.js?new2" defer></script>
    <div class="main-title">
        <h1>Price update</h1>
    </div>
    <div class="products">
        <div class="product-items">
        <?php
        include_once "PHP/classes/priceUpdateClass.php";
        $priceUpdate = new PriceUpdate;
        $priceUpdate->getUserDetails();
        $priceUpdate->checkIfUserGetUpdateForProduct();
        ?>
        </div>
    </div>
        
    <div id="id01" class="modal">
        <div class="center">
            <span class="close" title="Close Modal">&times;</span>
            <div class="favorite">
                <h2>BEST PRICE:
                    <span>1875.00$</span></h2>
                    <img src="images/logo/ebay-logo.png" width="80" alt="logo">
            </div>
            <div class="cart">
                <a class="link-to-buy" href="?page=itemPage&proid=1">buy now</a>
                <a class="item-page" href="?page=itemPage&proid=1">CLICK FOR MORE RESULTS</a>
                <button class="btn">STOP SEARCHING</button>
            </div>
        </div>
    </div>

    <script>

        const priceUpdate = document.querySelectorAll('.btn-update');
        priceUpdate.forEach(button => {
            button.addEventListener('click', () => {
                priceForProduct(button.value);
            })
        });

        const userID = `<?php echo $priceUpdate->userID?>`;

        window.addEventListener('load', () => {
            const time = setTimeout(() => {
                `<?php $priceUpdate->resertCountOfUpdate() ?>`;
            newUpdate.style.display = "none";
            }, 5000)
        })
    </script>
    <?php
}

function contant(){
    ?>
    <link rel="stylesheet" href="CSS/contact.css">
    <div class="message-container">
        <div class="content">
            <div class="image-box">
                <img src="images/contact.png" alt="">
            </div>
            <form action="">
                <div class="topic">Send us a message</div>
                <div class="input-box">
                    <input class="title" type="text" required>
                    <label>Subject</label>
                </div>
                <div class="message-box">
                    <textarea></textarea>
                    <label>Enter your message</label>
                </div>
                <div class="input-box">
                    <input class="submit-btn" type="button" value="Send Message">
                </div>
                <div class="status" style = "border: 1px solid green; background:aliceblue; color: green;"><span class="updateStatus">the message was sent successfully</span></div>
            </form>
        </div>
    </div>

    <?php
    include_once "PHP/moduls/notifications-module/contactClass.php";
    $contactClass = new Contact;
    $contactClass->getUserDetails();
    ?>

    <script>

    const emailForMessage = `<?php echo $contactClass->email?>`;
    const userID = `<?php echo $contactClass->userID?>`;

    </script>
    <script src="JS/contact.js?New1"></script>
    <?php
}

function helpCenter(){
    ?>
    <link rel="stylesheet" href="CSS/help-center.css?new">
    <div class="main-title">
        <h1>Help center</h1>
    </div>
    <div class="info-container">
        <div class="accordion">
            <div class="contentBx">
                <div class="label">How to search for a product on our website?</div>
                <div class="content">
                    <p>Go to the <a href="?page=home-page" style="color: #40c9a2; text-decoration: none;">home page</a>, in the search bar enter the name of the product you are looking for,
                    click on the search button / click on the link that appears in the search results.
                    No results found Contact us with the product name and we will add it to the system.</p>
                </div>
            </div>
            <div class="contentBx">
                <div class="label">How to find the cheapest price for the product</div>
                <div class="content">
                    <p>Go to the product page, click on the button "SEARCH FOR THE BEST PRICE",
                    the search will run on the screen and after a few 
                    moments the search results will appear</p>
                </div>
            </div>
            <div class="contentBx">
                <div class="label">How to look for a product for the price that best suits you?</div>
                <div class="content">
                    <p>Go to the product page, write a recommended price for you, 
                    the system will confirm a search. After a few moments, 
                    a result will appear on the <a href="?page=priceUpdate" style="color: #40c9a2; text-decoration: none;">price update page</a></p>
                </div>
            </div>
            <div class="contentBx">
                <div class="label">How to be updated for product price?</div>
                <div class="content">
                    <p>Request a product search for the price you are interested in, 
                    the <a href="?page=priceUpdate" style="color: #40c9a2; text-decoration: none;">price update page</a> will occasionally display alerts for new product data, 
                    the system will notify you of the differences between the price you are 
                    looking for and the price found</p>
                </div>
            </div>
            <div class="contentBx">
                <div class="label">How to contact us?</div>
                <div class="content">
                    <p>Go to the <a href="?page=contant" style="color: #40c9a2; text-decoration: none;">contact page</a> for registered application and subject of application. Click the "Send Message" button The system will send a confirmation message automatically. The system will try to respond to a message within 24 hours</p>
                </div>
            </div>
        </div>
    </div>
    <script>
    const accordion = document.querySelectorAll('.contentBx');

    accordion.forEach(info => {
        info.addEventListener('click', () => {
            info.classList.toggle('active');
        })
    })
    </script>
    <?php
}

//links

function listOfCategory(){

    $listOfCategory =  Database::query("SELECT DISTINCT `category` FROM `products`");
    foreach($listOfCategory as $category){
        $categoryName = $category['category'];
        $fullList = '<li class="hover-me"><a href="?page=products&category='.$categoryName.'">'.$categoryName.'</a><i class="fa fa-angle-right"></i>
        <div class="submenu_2"><ul>';
        $getCompanys = Database::query("SELECT DISTINCT `company` FROM `products` WHERE category = '$categoryName'");
            foreach ($getCompanys as $company){
                $fullList .= '<li><a href="?page=products&category='.$categoryName.'&company[]='.$company['company'].'">'.$company['company'].'</a></li>';
            }
        $fullList .= '</ul></div></li>';
        echo $fullList;
    }

}

function listOfLinks(){

    $listOfCategory =  Database::query("SELECT DISTINCT `category` FROM `products` LIMIT 5");
    foreach($listOfCategory as $category){
        $categoryName = $category['category'];
        $linkList = '<a href="?page=products&category='.$categoryName.'">'.$categoryName.'</a>';
        echo $linkList;
    }

}

?>