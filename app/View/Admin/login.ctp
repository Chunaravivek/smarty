<?php
if (isset($this->request->query['returnURL'])) {
    $returnURL = 'login?returnURL=' . $this->request->query['returnURL'];
} else {
    $returnURL = '';
}
?>

<div class="login-box">

    <!-- login form -->
    <?= $this->Form->create('Admin', array('url' => array('controller' => 'Admin', 'action' => 'login'.isset($returnURL) ? $returnURL: ''), 'class' => 'sky-form boxed', 'enctype' => 'multipart/form-data')); ?>
    
        <header><i class="fa fa-users"></i> Admin Login</header>
        <h4><?php echo $this->Session->flash(); ?></h4>
        <fieldset>	

            <section>
                <label class="label">Email</label>
                <label class="input" for="email">
                    <i class="icon-append fa fa-envelope"></i>
                    <input type="text" class="form-control" id="email" placeholder="Your Email" name="data[Admin][email]" required="" aria-invalid="false">
                    <span class="tooltip tooltip-top-right">Email Address</span>
                </label>
            </section>

            <section>
                <label class="label">Password</label>
                <label class="input">
                    <i class="icon-append fa fa-lock"></i>
                    <input type="password" class="form-control" id="user-password" placeholder="Enter Password" name="data[Admin][password]" required="">
                    <b class="tooltip tooltip-top-right">Type your Password</b>
                </label>
            </section>

        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary pull-right">Login</button>
        </footer>
    </form>
    <!-- /login form -->
</div>