<div class="container-fluid">
    <div class="row-fluid">

        <div class="row-fluid">
                <div  class="span12 center login-header">

                        <h2><?php echo __('welcome'); ?></h2>
                <div>


                    <?php echo $this->Html->link('EN', array('language'=>'eng')); ?>
                    <?php echo $this->Html->link('LT', array('language'=>'lit')); ?>
                </div>
                </div><!--/span-->

        </div><!--/row-->

        <div class="row-fluid" >
                <div id="main_start" class="well span5 center login-box">
                <div id="login_main">
                        <div class="alert alert-info">
                                <?php echo __('login_explanation'); ?>					
                        </div>
                                <fieldset>

                                    <?php
                                     //  echo $this->Form->create('User', array('action' => 'userarea'));
                                     echo $this->Session->flash('auth'); 
                                    echo $this->Form->create();

                                     //   echo $this->Form->input('password');

                                      ?>

                                        <?php //echo $this->Form->create('Post'); ?>
                                        <div class="input-prepend" title="Email" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><?php  echo $this->Form->input('email', array('autofocus' => '', 'label' => false)); ?>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="input-prepend" title="Password" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-lock"></i></span><?php echo $this->Form->input('password', array( 'label' => false)); ?>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="input-prepend">


                                        <?php echo $this->Form->checkbox('remember_me', array('hiddenField' => false, 'default' => '1')); ?>
                                          <?php echo  __('rememberme'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><?php echo __('login'); ?> </button>
                                </fieldset>


                                <?php
                                    echo $this->Html->link( __('forgot_password'),
                                        array('controller' => 'users', 'action' => 'forgot')
                                    );
                                ?>
                                <?php
                                    echo $this->Html->link( __('sign_up'),
                                        array('controller' => 'users', 'action' => 'register')
                                    );
                                ?>
                              

                                <p><?php //echo error_for('empty_field'); ?> </p>
                        </form>
                </div>
    </div><!--/span-->
</div><!--/row-->

