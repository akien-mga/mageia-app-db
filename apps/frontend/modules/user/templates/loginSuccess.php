<div id="login_form">
  <?php echo $form->renderFormTag(url_for('@login')) ?>
    <h2>Username</h2>
    <?php echo $form['login'] ?><br />
    <h2>Password</h2>
    <?php echo $form['password'] ?><br />
  <?php echo tag('input', array('type' => 'submit')) ?>
  <?php echo '</form>' ?>
</div>