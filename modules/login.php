<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>/</li>
                        <li>sign</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<form method="post">
    <?php login($conn)?>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="#">
                            <p>
                                <label>Username or email <span>*</span></label>
                                <input type="text" name="user_name" id="user_name" required onclick="CheckEmail(this);" onclick="CheckEmail(this);">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" id="password" required oninvalid="CheckPassword(this);" oninput="CheckPassword(this);">
                            </p>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit" name="login" id="login">login</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->
                <?php register($conn);?>
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form method="post">
                            <p>
                                <label>User Name <span>*</span></label>
                                <input type="text" name="user_name" id="user_name">
                            </p>
                            <p>
                            <p>
                                <label>Email address <span>*</span></label>
                                <input type="text" name="email" id="email">
                            </p>
                            <p>
                                <label>Phone <span>*</span></label>
                                <input type="text" name="mobile" id="mobile">
                            </p>
                            <p>
                                <label> Passwords <span>*</span></label>
                                <input type="password" name="password" id="password">
                            </p>
                            <p>
                                <label>Re Passwords <span>*</span></label>
                                <input type="password" name="repassword" id="repassword">
                            </p>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Nam</option>
                                <option value="">Nữ</option>
                            </select>
                            <div class="login_submit">
                                <button type="submit" name="register" id="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
</form>
<!-- customer login end -->