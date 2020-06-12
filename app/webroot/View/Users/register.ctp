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
                                <?php echo __('register_explanation'); ?>					
                        </div>
                                <fieldset>

                                    <?php
                                     //  echo $this->Form->create('User', array('action' => 'userarea'));
                                     echo $this->Session->flash('auth'); 
                                      

                                    echo $this->Form->create();

                                     //   echo $this->Form->input('password');

                                      ?>
                                    
                                    
                                    
                                    
                                    <?php echo $this->Form->create('User'); ?>
                                    <table id="register_table">
                                            <tr>
                                                    <td align="right" valign="top">
                                                            <?php echo __('name'); ?>:
                                                    </td>
                                                    <td>
                                                              <div class="input-prepend">
                                                                 <?php echo $this->Form->input('name', array( 'label' => false)); ?>
                                                           </div>
                                                            <div class="clearfix"></div>
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td align="right" valign="top">
                                                            <?php echo __('surname'); ?>:
                                                    </td>
                                                    <td>
                                                                     <div class="input-prepend">
                                                                            <?php echo $this->Form->input('surname', array( 'label' => false)); ?>
                                                                      </div>
                                                                    <div class="clearfix"></div>
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td align="right" valign="top">
                                                            <?php  echo __('email'); ?>:
                                                    </td>
                                                    <td>
                                                                
                                                                             <div class="input-prepend" title="Email">
                                                                                    <?php  echo $this->Form->input('email', array( 'label' => false)); ?>
                                                                            </div>

                                                                    <div class="clearfix"></div>
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td align="right" valign="top">
                                                            <?php echo __('password'); ?>:
                                                    </td>
                                                    <td>
                                                            <div class="input-prepend">
                                                                 <?php echo $this->Form->input('password', array( 'label' => false)); ?>
                                                           </div>
                                                                    <div class="clearfix"></div>
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td align="right" valign="top">
                                                            <?php  echo __('re_password', array( 'label' => false)); ?>:
                                                    </td>
                                                    <td>
                                                           <div class="input-prepend">
                                                                 <?php echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => false)); ?>
                                                           </div>
                                                                    <div class="clearfix"></div>
                                                    </td>
                                                   
                                            </tr>
                                           <?php 
                                                $confirm_code = md5(uniqid(rand()));
                                             echo $this->Form->hidden('confirmation_code', array('value' => $confirm_code));

                                           ?>
                                    </table>
                                
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
                                                            </p>
                                                             <?php
                                                                            echo $this->Html->link( __('go_back'),
                                                                                array('controller' => 'users', 'action' => 'index' )
                                                                                    
                                                                            );
                                                                        ?>
                                                            
                                                            
							
                                </fieldset>


                                <p><?php //echo error_for('empty_field'); ?> </p>
                        </form>
                </div>
    </div><!--/span-->
</div><!--/row-->


















