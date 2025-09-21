<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <style>
        * {
  box-sizing: border-box;
}
body {
  margin:0;
  height: 100vh;
  width: 100vw;
  overflow: hidden;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  color:#555;
  background: #ecf0f3;
}
.login-div {
  width:430px;
  height: 700px;
  padding: 60px 35px 35px 35px;
  border-radius: 40px;
  background: #ecf0f3;
  box-shadow: 13px 13px 20px #cbced1,
              -13px -13px 20px #ffffff;
}
.logo {
  background:url("https://source.unsplash.com/100x100/?nature,water");
  width:100px;
  height: 100px;
  border-radius: 50%;
  margin:0 auto;
  box-shadow: 
  /* logo shadow */
  0px 0px 2px #5f5f5f,
  /* offset */
  0px 0px 0px 5px #ecf0f3,
  /*bottom right */
  8px 8px 15px #a7aaaf,
  /* top left */
  -8px -8px 15px #ffffff
  ;
}
.title {
  text-align: center;
  font-size: 28px;
  padding-top: 24px;
  letter-spacing: 0.5px;
}
.sub-title {
  text-align: center;
  font-size: 15px;
  padding-top: 7px;
  letter-spacing: 3px;
}
.fields {
  width: 100%;
  padding: 75px 5px 5px 5px;
}
.fields input {
  border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;
}
.username, .password {
  margin-bottom: 30px;
  border-radius: 25px;
  box-shadow: inset 8px 8px 8px #cbced1,
              inset -8px -8px 8px #ffffff;
}
.fields svg {
  height: 22px;
  margin:0 10px -3px 25px;
}
.signin-button {
  outline: none;
  border:none;
  cursor: pointer;
  width:100%;
  height: 60px;
  border-radius: 30px;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Lato', sans-serif;
  color:#fff;
  text-align: center;
  background: #24cfaa;
  box-shadow: 3px 3px 8px #b1b1b1,
              -3px -3px 8px #ffffff;
  transition: 0.5s;
}
.signin-button:hover {
  background:#2fdbb6;
}
.signin-button:active {
  background:#1da88a;
}
.link {
  padding-top: 20px;
  text-align: center;
}
.link a {
  text-decoration: none;
  color:#aaa;
  font-size: 15px;
}
    </style>
  </head>
  <body>
    <div class="login-div">
      <div class="logo"></div>
      <div class="title">Login</div>
   
      <div class="fields">
        <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="username"><svg fill="#999" viewBox="0 0 1024 1024"><path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path></svg><input type="text" class="user-input"  name="email" placeholder="username" /></div>
        <div class="password"><svg fill="#999" viewBox="0 0 1024 1024"><path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path></svg><input type="password" class="pass-input" name="password" placeholder="password" /></div>
        <button type="submit" class="signin-button">Login</button>
        </form>
      </div>
      <div class="link">
        <p>Inventory Management</p>
      </div>
    </div>
  </body>
</html>