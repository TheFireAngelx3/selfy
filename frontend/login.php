<div class="login">
    <h3 class="mb-4"> Bitte melde dich an.</h3>
    <?php get('error'); ?>
    <form action="" method="post" name="login">
        <div class="formrow">
            <label for="username">Benutzername</label>
            <input type="text" name="username" value="" autofocus placeholder="maxmustermann" />
        </div>
        <div class="formrow">
            <label for="password">Passwort</label>
            <input type="password" name="password" value="" placeholder="****"/>
        </div>
        <div class="cb"></div>
        <div class="formrow text-right">
            <button type="submit" class="button">Anmelden</button>
        </div>
    </form>
</div>
