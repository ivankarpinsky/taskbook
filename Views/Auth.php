<div class="auth-form-wrapper">
    <form class="auth-form" id="auth" action="/auth/login" method="post">
        <div class="error-message"><?= $error ? 'wrong data' : '' ?></div>
        <label><span>Login:</span> <input name="login" required></label>
        <label><span>Password:</span> <input name="password" type="password" required></label>
        <button type="submit" class="submit-button">log in</button>
    </form>
</div>