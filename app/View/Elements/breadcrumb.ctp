<header id="page-header">
    <h1><?php echo $this->request->params['controller']; ?> Manage</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo BASE_URL; ?>Dashboard">Home</a>
        </li>
        <?php
        if ($this->request->params['controller'] && $this->request->params['action'] == 'add' || $this->request->params['action'] == 'edit') {
            ?>
            <li class="<?php if ($this->request->params['controller']) {
            echo 'active';
        } ?>">
                <a href="<?php echo BASE_URL . $this->request->params['controller']; ?><?php echo $this->request->params['controller']; ?>">Home</a>
            </li>
            <li class="<?php if ($this->request->params['controller']) {
            echo 'active';
        } ?>">
            <?php echo $this->request->params['controller'] . ' ' . $this->request->params['action']; ?>
            </li>
                <?php
            } else {
                ?>
            <li class="<?php if ($this->request->params['controller']) {
            echo 'active';
        } ?>">
    <?php echo $this->request->params['controller']; ?>
            </li>
    <?php
}
?>
    </ol>
</header>